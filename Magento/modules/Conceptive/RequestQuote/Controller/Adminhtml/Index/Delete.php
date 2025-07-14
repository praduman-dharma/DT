<?php

namespace Conceptive\RequestQuote\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;
use Magento\Framework\Controller\Result\RedirectFactory;

/**
 * Class Delete
 * Handles the deletion of a request quote in the admin panel.
 */
class Delete extends Action
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
     * Execute the delete action.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                /** @var \Conceptive\RequestQuote\Model\RequestQuote $quote */
                $quote = $this->requestQuoteFactory->create()->load($id);
                $quote->delete();
                $this->messageManager->addSuccessMessage(__('The quote has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}
