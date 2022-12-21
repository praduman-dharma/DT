<?php

namespace DT\Slider\Block;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\View\Element\Template;

class ProductSlider extends Template
{
    /**
     * @var CategoryFactory
     */
    protected $_categoryFactory;

    /**
     * CategoryProducts constructor.
     * @param Template\Context $context
     * @param CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        $this->productRepository = $productRepository;
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    /**
     * @param $categoryId
     * @return \Magento\Catalog\Model\Category
     */
    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }

    /**
     * @param $categoryId
     * @return array
     */
    public function getCategoryProducts($categoryId)
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('*');
        // $products->setPageSize(3); // fetching only 10 products
        return $products;
    }

    public function getItemImage($productId)
    {
        try {
            $_product = $this->productRepository->getById($productId);
        } catch (NoSuchEntityException $e) {
            return 'product not found';
        }
        $image_url = $this->imageHelper->init($_product, 'product_base_image')->getUrl();
        return $image_url;
    }
}