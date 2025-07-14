<?php

namespace Conceptive\RequestQuote\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;
use Magento\Framework\Registry;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\Result\RedirectFactory;

/**
 * Class View
 * Controller for viewing a specific request quote.
 */
class View extends Action
{
    /**
     * @var RequestQuoteFactory
     */
    protected $quoteFactory;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactoryCustom;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param RequestQuoteFactory $quoteFactory
     * @param Registry $registry
     * @param Session $customerSession
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context $context,
        RequestQuoteFactory $quoteFactory,
        Registry $registry,
        Session $customerSession,
        RedirectFactory $resultRedirectFactory
    ) {
        $this->quoteFactory = $quoteFactory;
        $this->registry = $registry;
        $this->customerSession = $customerSession;
        $this->resultRedirectFactoryCustom = $resultRedirectFactory;
        parent::__construct($context);
    }

    /**
     * Execute method for View controller.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // Check if customer is logged in
        if (!$this->customerSession->isLoggedIn()) {
            $this->messageManager->addErrorMessage(__('Please log in to view your quotes.'));
            return $this->resultRedirectFactory->create()->setPath('customer/account/login');
        }

        // Get quote ID from request
        $quoteId = $this->getRequest()->getParam('id');
        if (!$quoteId) {
            $this->messageManager->addErrorMessage(__('No quote specified.'));
            return $this->resultRedirectFactory->create()->setPath('requestquote/index/index');
        }

        // Load the quote
        $quote = $this->quoteFactory->create()->load($quoteId);

        // Validate the quote exists and belongs to the logged-in customer
        if (!$quote->getId() || $quote->getCustomerId() != $this->customerSession->getCustomerId()) {
            $this->messageManager->addErrorMessage(__('This quote no longer exists.'));
            return $this->resultRedirectFactory->create()->setPath('requestquote/index/index');
        }

        // Register the current quote
        $this->registry->register('current_quote', $quote);

        // Create and return the result page
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        if ($navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation')) {
            $navigationBlock->setActive('requestquote/index/index');
        }

        $resultPage->getConfig()->getTitle()->set(__('Quote Details'));

        return $resultPage;
    }
}
