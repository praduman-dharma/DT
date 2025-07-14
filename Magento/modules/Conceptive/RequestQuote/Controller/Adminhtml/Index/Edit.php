<?php

namespace Conceptive\RequestQuote\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;

/**
 * Class Edit
 * Controller for editing a request quote in the admin panel.
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     * Factory for creating result pages.
     */
    protected $resultPageFactory;

    /**
     * @var RequestQuoteFactory
     * Factory for creating request quote models.
     */
    protected $requestQuoteFactory;

    /**
     * @var Registry
     * Core registry for storing data.
     */
    protected $coreRegistry;

    /**
     * Constructor
     *
     * @param Action\Context $context Context of the admin action.
     * @param PageFactory $resultPageFactory Factory to create the result page.
     * @param RequestQuoteFactory $requestQuoteFactory Factory to create request quote models.
     * @param Registry $coreRegistry Core registry for storing the model.
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        RequestQuoteFactory $requestQuoteFactory,
        Registry $coreRegistry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->requestQuoteFactory = $requestQuoteFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Execute the edit action
     *
     * Loads the request quote based on the ID and prepares the result page.
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->requestQuoteFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This quote no longer exists.'));
                return $this->_redirect('*/*/');
            }
            $this->coreRegistry->register('request_quote', $model);
            $pageTitle = __('Edit Request Quote');
        } else {
            $pageTitle = __('New Request Quote');
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);

        return $resultPage;
    }
}
