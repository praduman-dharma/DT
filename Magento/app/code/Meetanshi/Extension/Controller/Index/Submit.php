<?php

namespace Meetanshi\Extension\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Meetanshi\Extension\Model\ExtensionFactory;
use Magento\Framework\Controller\ResultFactory;

class Submit extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $extensionFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        ExtensionFactory $extensionFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->extensionFactory = $extensionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->extensionFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultPage = $this->_pageFactory->create();
        return $resultPage;
    }
}
