<?php

namespace AB\Dharma\Controller\Result;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class productlist extends \Magento\Framework\App\Action\Action
{

    /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $resultJsonFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory
    ) {

        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $numone = $this->getRequest()->getParam('listId');
        $result = $this->resultJsonFactory->create();
        $resultPage = $this->resultPageFactory->create();


        $block = $resultPage->getLayout()
                ->createBlock('AB\Dharma\Block\ListProduct')
                ->setTemplate('AB_Dharma::resultproduct.phtml')
                ->setData('listId',$numone)
                ->toHtml();

        $result->setData(['output' => $block]);
        return $result;
    }
}
