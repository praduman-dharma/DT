<?php
namespace Avologic\AdvanceSearch\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Avologic\AdvanceSearch\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Index extends \Magento\Framework\View\Element\Template
{        

    protected $productFactory;
    protected $_storeManager;
    protected $_currency;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Data $helper,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Directory\Model\Currency $currency,           
        array $data = []
    )
    {        
        $this->helper = $helper;
        $this->scopeConfig = $scopeConfig;
        $this->productFactory = $productFactory;
        $this->_storeManager = $storeManager;
        $this->_currency = $currency;      
        parent::__construct($context, $data);
    }
    
    /*
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }   
    /*
     * @return string
     */
    public function getDisplayText()
    {
        return $this->helper->getDisplayText();
    }     

    public function getDisplayAttributes()
    {
        return $this->helper->getDisplayAttributes();
    }
    
    public function getAttrOptIdByLabel($attrCode)
    {
        $product = $this->productFactory->create();
        $attribute = $product->getResource()->getAttribute($attrCode);
        if ($attribute->usesSource()) {
            $options = $attribute->getSource()->getAllOptions();
        }
         return $options;
    }

    public function getAttrLabel($attrCode)
    {
        $product = $this->productFactory->create();  
        $attr = $product->getResource()->getAttribute($attrCode);
        if ($attr->usesSource()) {
            $optionText = $attr->getFrontendLabel();
        }
        return $optionText;
    }

    public function getCurrentCurrencyCode()
    {
        return $this->_storeManager->getStore()->getCurrentCurrencyCode();
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