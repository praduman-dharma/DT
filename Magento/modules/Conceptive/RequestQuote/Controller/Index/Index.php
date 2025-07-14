<?php

namespace Conceptive\RequestQuote\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;

/**
 * Class Index
 * Controller to display a list of customer quotes.
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Session $customerSession
    ) {
        $this->pageFactory = $pageFactory;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    /**
     * Execute method for loading the quote list page.
     *
     * @return \Magento\Framework\Controller\Result\Redirect|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        // Redirect to login if the customer is not logged in
        if (!$this->customerSession->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }

        // Load the page displaying customer quotes
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('My Quotes'));

        return $resultPage;
    }
}
