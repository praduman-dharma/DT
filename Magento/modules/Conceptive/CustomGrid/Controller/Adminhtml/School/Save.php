<?php

namespace Conceptive\CustomGrid\Controller\Adminhtml\School;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Conceptive\CustomGrid\Model\SchoolFactory;
use Conceptive\CustomGrid\Model\ProductFactory as SchoolProductFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    protected $schoolFactory;
    protected $schoolProductFactory;
    protected $filesystem;
    protected $fileUploaderFactory;


    public function __construct(
        Action\Context $context,
        SchoolFactory $schoolFactory,
        SchoolProductFactory $schoolProductFactory,
        Filesystem $filesystem,
        UploaderFactory $fileUploaderFactory
    ) {
        parent::__construct($context);
        $this->schoolFactory = $schoolFactory;
        $this->schoolProductFactory = $schoolProductFactory;
        $this->filesystem = $filesystem;
        $this->fileUploaderFactory = $fileUploaderFactory;
    }

    public function execute()
    {
        $data       = $this->getRequest()->getPostValue();
        $schoolData = isset($data['school']) ? $data['school'] : [];

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/');

        if (!$data) {
            $this->messageManager->addErrorMessage(__('Invalid data.'));
            return $resultRedirect;
        }

        try {
            $schoolId = isset($schoolData['entity_id']) ? (int) $schoolData['entity_id'] : null;
            $school = $this->schoolFactory->create();
            $schoolProduct = $this->schoolProductFactory->create();

            if ($schoolId) {
                $school->load($schoolId);
                if (!$school->getId()) {
                    throw new LocalizedException(__('The school does not exist.'));
                }
            }

            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                $uploader = $this->fileUploaderFactory->create(['fileId' => 'image']);
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png', 'svg']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setAllowCreateFolders(true);
                $uploader->setFilesDispersion(true);

                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if ($uploader->checkAllowedExtension($ext)) {
                    $path = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA)
                        ->getAbsolutePath('cc_school/');
                    $uploader->save($path);

                    $fileName = $uploader->getUploadedFileName();
                    if ($fileName) {
                        $schoolData['image'] = 'cc_school' . $fileName;
                    }
                } else {
                    $this->messageManager->addError(__('Disallowed file type.'));
                    return $resultRedirect->setPath('*/*/edit', ['id' => $school->getId()]);
                }
            } else {
                if (isset($data['image']['delete']) && $data['image']['delete'] == 1) {
                    $schoolData['image'] = '';
                } else {
                    unset($data['image']);
                }
            }

            $school->setData($schoolData);

            $school->save();

            // Handle associated products
            if (isset($data['products_related']) && is_array($data['products_related'])) {
                $schoolId = $school->getId();
                $productIds = implode(',', $data['products_related']);

                $schoolProduct->load($schoolId, 'school_id');
                if ($schoolProduct->getId()) {
                    $schoolProduct->setData('product_ids', $productIds);
                } else {
                    $schoolProduct = $this->schoolProductFactory->create();
                    $schoolProduct->setData('school_id', $schoolId);
                    $schoolProduct->setData('product_ids', $productIds);
                }

                // Save the school record with associated products
                $schoolProduct->save();
            }

            $this->messageManager->addSuccessMessage(__('The school has been saved successfully.'));

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $school->getId()]);
            }

            return $resultRedirect;

        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('An error occurred while saving the school.'));
        }

        return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
    }
}
