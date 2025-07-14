<?php

namespace Conceptive\RequestQuote\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Save
 * Handles the saving of request quotes in the admin panel.
 */
class Save extends Action
{
    /**
     * @var RequestQuoteFactory
     */
    protected $requestQuoteFactory;

    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param RequestQuoteFactory $requestQuoteFactory
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context $context,
        RequestQuoteFactory $requestQuoteFactory,
        RedirectFactory $resultRedirectFactory
    ) {
        parent::__construct($context);
        $this->requestQuoteFactory = $requestQuoteFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    /**
     * Execute the save action.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            if (empty($data['id'])) {
                $data['id'] = null;
            }

            /** @var \Conceptive\RequestQuote\Model\RequestQuote $model */
            $model = $this->requestQuoteFactory->create();

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
                if (!$model->getId()) {
                    $this->messageManager->addErrorMessage(__('This quote no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            // Set the data in the model
            $model->setData($data);

            try {
                // Save the model
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the request quote.'));

                // Check if 'back' button was clicked
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }

                return $resultRedirect->setPath('*/*/');

            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Something went wrong while saving the quote.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
