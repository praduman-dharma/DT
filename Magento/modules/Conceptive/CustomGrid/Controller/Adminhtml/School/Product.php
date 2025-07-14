<?php

namespace Conceptive\CustomGrid\Controller\Adminhtml\School;

class Product extends \Magento\Catalog\Controller\Adminhtml\Product
{
    protected $resultLayoutFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Controller\Adminhtml\Product\Builder $productBuilder,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
    )
    {
        parent::__construct($context, $productBuilder);
        $this->resultLayoutFactory = $resultLayoutFactory;
    }

    public function execute()
    {
        $this->productBuilder->build($this->getRequest());
        $resultLayout = $this->resultLayoutFactory->create();
        $resultLayout->getLayout()->getBlock('school_edit_form_product')
            ->setProductsRelated($this->getRequest()->getPost('products_related', null));
            
        return $resultLayout;
    }
}
