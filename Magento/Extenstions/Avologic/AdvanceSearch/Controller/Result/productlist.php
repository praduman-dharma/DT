<?php

namespace Avologic\AdvanceSearch\Controller\Result;

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
        $attributeId = $this->getRequest()->getParam('attributeId');
        $priceFrom = $this->getRequest()->getParam('pricefrom');
        $priceTo = $this->getRequest()->getParam('priceto');
        $result = $this->resultJsonFactory->create();
        $resultPage = $this->resultPageFactory->create();


        $block = $resultPage->getLayout()
                ->createBlock('Avologic\AdvanceSearch\Block\ListProduct')
                ->setTemplate('Avologic_AdvanceSearch::resultproduct.phtml')
                ->setData('listid',$numone)
                ->setData('attributeid',$attributeId)
                ->setData('pricefrom',$priceFrom)
                ->setData('priceto',$priceTo)
                ->toHtml();

        $result->setData(['output' => $block]);
        if (empty($numone) && empty($attributeId) && empty($priceFrom) && empty($priceTo)) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('checkout/cart/index');
            return $resultRedirect;
        } else {
            return $result;
        }
    }
}