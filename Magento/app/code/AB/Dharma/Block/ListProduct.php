<?php

namespace AB\Dharma\Block;

use Magento\Catalog\Model\CategoryFactory;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class ListProduct extends Template
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
        Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        $this->productRepository = $productRepository;
        $this->_categoryFactory = $categoryFactory;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * @param $categoryId
     * @return \Magento\Catalog\Model\Category
     */

    public function getCategoryName($name)
    {
        $title = $name;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $this->_categoryFactory->create()->getCollection()->addFieldToFilter('name', $title);
        return $collection;
    }

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
        $products->setPageSize(5); // fetching only 10 products
        // $products->addAttributeToSort('price', 'ASC');   
        // for sorting product according to price, In low to high
        $products->addAttributeToSort('price', 'desc');
        // for sorting product according to price, In high to low
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


    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }
    public $a;

    public function getListIdData()
    {
        if (isset($_REQUEST["listId"])) {
            $this->a = $_REQUEST["listId"];
        }
        return $this->a;
    }
}
