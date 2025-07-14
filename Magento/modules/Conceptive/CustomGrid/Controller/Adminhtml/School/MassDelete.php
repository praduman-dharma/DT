<?php

namespace Conceptive\CustomGrid\Controller\Adminhtml\School;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Conceptive\CustomGrid\Model\ResourceModel\School\CollectionFactory as SchoolProductFactory;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Conceptive_CustomGrid::school_delete';

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var SchoolProductFactory
     */
    protected $schoolProductFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param SchoolProductFactory $schoolProductFactory
     */
    public function __construct(Context $context, Filter $filter, SchoolProductFactory $schoolProductFactory)
    {
        $this->filter = $filter;
        $this->schoolProductFactory = $schoolProductFactory;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->schoolProductFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $school) {
            $productsModel = $this->_objectManager->create(\Conceptive\CustomGrid\Model\Product::class);
            $productsModel->load($school->getId(), 'school_id');

            if ($productsModel->getId()) {
                $productsModel->delete();
            }
            
            $school->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        
        return $resultRedirect->setPath('*/*/');
    }
}
