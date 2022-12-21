<?php

namespace Emipro\Custom\Controller\Productinquiry;

use Emipro\Custom\Model\JobFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    public $submit;
    protected $_pageFactory;
    protected $_productinquiryFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        JobFactory $productinquiryFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_productinquiryFactory = $productinquiryFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        echo "<pre>";
        $data = $this->getRequest()->getPostValue();
        // print_r($data);
        // exit();
        try {
            $rowData = $this->_productinquiryFactory->create();
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__("Save Data"));
            echo "Data Save";
        } catch (\Exception $e) {
            $this->messageManager->addError(__('please try again. Form Not Submit'));
            echo "Data Not Save";
        }
        
        return $this->_pageFactory->create();
    } // main Executtion function

}
