<?php

namespace Avologic\AdvanceSearch\Block;

use Magento\Catalog\Model\CategoryFactory;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class ListProduct extends Template
{

    /**
     * @var CategoryFactory
     */
    protected $_categoryFactory;

    protected $_productCollectionFactory;

    protected $productFactory;

    protected $_currency;

    /**
     * CategoryProducts constructor.
     * @param Template\Context $context
     * @param CategoryFactory $categoryFactory
     * @param array $data
     */

    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Block\Product\ListProduct $listProductBlock,
        \Magento\Directory\Model\Currency $currency,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->imageHelper = $imageHelper;
        $this->productRepository = $productRepository;
        $this->_categoryFactory = $categoryFactory;
        $this->productFactory = $productFactory;
        $this->listProductBlock = $listProductBlock;
        $this->_currency = $currency;
        parent::__construct($context, $data);
    }

    /**
     * @param $categoryId
     * @return \Magento\Catalog\Model\Category
     */

    public function getProductCollection($attributeId = null)
    {
        $attributeIdCode = $this->getAttributeIdData();
        if(!isset($attributeIdCode)){
            $attributeIdCode = 'colors';
        }
        $arr = explode(',', $attributeIdCode);

        $priceFrom = $this->getPriceFromData();
        $priceTo = $this->getPriceToData();

        if (empty($priceTo)) {
            $priceTo = null;
        }

        foreach ($arr as $item) {
            $collection = $this->_productCollectionFactory->create();
            // $collection->addAttributeToSelect('*');
            $collection->addAttributeToSelect('*')->addFieldToFilter('price', array('from' => $priceFrom, 'to' => $priceTo));
            $collection->addAttributeToFilter($item, $attributeId);
            $collection->addAttributeToSort('price', 'ASC');
            if (!empty($collection->getData())) {
                break;
            }
            // $collection->setPageSize(3); // fetching only 3 products
        }
        if (empty($collection->getData()) && empty($attributeId)) {
            if (!empty($priceFrom) || !empty($priceTo)) {
                if (empty($priceFrom)) {
                    $priceFrom = null;
                }
                foreach ($arr as $item) {
                    // print_r($collection->getData());
                    // echo $priceFrom;
                    $collection = $this->_productCollectionFactory->create();
                    $collection->addAttributeToSelect('*')->addFieldToFilter('price', array('from' => $priceFrom, 'to' => $priceTo));
                    $collection->addAttributeToSort('price', 'ASC');
                }
            }
        }
        return $collection;
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


    public function getListIdData()
    {
        return $this->getListid();
    }

    public function getAttributeIdData()
    {
        return $this->getAttributeid();
    }

    public function getPriceFromData()
    {
        return $this->getPricefrom();
    }

    public function getPriceToData()
    {
        return $this->getPriceto();
    }

    public function getAddToCartPostParams($product)
    {
        return $this->listProductBlock->getAddToCartPostParams($product);
    }

    public function getAttrLabel($item = null, $attributeId = null)
    {
        $optionId = $attributeId;
        $collection = $this->_productCollectionFactory->create();
        $attribute = $collection->getResource()->getAttribute($item);
        if ($attribute->usesSource()) {
            $optionText = $attribute->getSource()->getOptionText($optionId);
        }
        return $optionText;
    }

    public function getMainAttrLabel($attrCode)
    {
        $product = $this->productFactory->create();  
        $attr = $product->getResource()->getAttribute($attrCode);
        if ($attr->usesSource()) {
            $optionLabel = $attr->getFrontendLabel();
        }
        return $optionLabel;
    }

    /**
     * Get currency symbol for current locale and currency code
     *
     * @return string
     */    
    public function getCurrentCurrencySymbol()
    {
        return $this->_currency->getCurrencySymbol();
    }  
}
