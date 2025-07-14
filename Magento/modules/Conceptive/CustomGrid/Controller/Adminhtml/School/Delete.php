<?php

namespace Conceptive\CustomGrid\Controller\Adminhtml\School;

use Magento\Framework\App\Action\HttpPostActionInterface;

class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Conceptive_CustomGrid::school_delete';

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Conceptive\CustomGrid\Model\School::class);
                $productsModel = $this->_objectManager->create(\Conceptive\CustomGrid\Model\Product::class);

                $model->load($id);
                $productsModel->load($id, 'school_id');

                if ($productsModel->getId()) {
                    $productsModel->delete();
                }
                
                $model->delete();
                
                $this->messageManager->addSuccessMessage(__('The school information has been deleted.'));
              
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        
        $this->messageManager->addErrorMessage(__('We can\'t find a school information to delete.'));
        
        return $resultRedirect->setPath('*/*/');
    }
}
