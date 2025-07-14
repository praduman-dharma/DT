<?php

namespace Conceptive\CustomGrid\Block\Adminhtml\School\Edit\Tab;

use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Conceptive\CustomGrid\Model\SchoolFactory;
use Conceptive\CustomGrid\Model\ResourceModel\Product\CollectionFactory as SchoolProductFactory;

class Product extends Extended implements TabInterface
{
    protected $productFactory;
    protected $schoolFactory;
    protected $schoolProductFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\Registry $coreRegistry,
        SchoolFactory $schoolFactory,
        SchoolProductFactory $schoolProductFactory,
        array $data = []
    ) {
        $this->productFactory = $productFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->schoolFactory = $schoolFactory;
        $this->schoolProductFactory = $schoolProductFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('product_section');
        $this->setDefaultSort('entity_id');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    public function getSchool()
    {
        $id = $this->getRequest()->getParam('id');
        return $this->schoolFactory->create()->load($id);
    }

    protected function _addColumnFilterToCollection($column)
    {
        if ($column->getId() == 'in_products') {
            $productIds = $this->_getSelectedProducts() ?? null;
            
            if ($column->getFilter()->getValue()) {
                $this->getCollection()->addFieldToFilter('entity_id', ['in' => $productIds]);
            } else {
                if ($productIds) {
                    $this->getCollection()->addFieldToFilter('entity_id', ['nin' => $productIds]);
                }
            }
        } else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }

    /**
     * @return Grid
     */
    protected function _prepareCollection()
    {
        $collection = $this->productFactory->create()
            ->getCollection()->addAttributeToSelect('name')
            ->addAttributeToSelect('sku');

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * @return Extended
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'in_products',
            [
                'type' => 'checkbox',
                'name' => 'in_products',
                'values' => $this->_getSelectedProducts(),
                'align' => 'center',
                'index' => 'entity_id',
                'header_css_class' => 'col-select',
                'column_css_class' => 'col-select'
            ]
        );

        $this->addColumn(
            'entity_id',
            [
                'header' => __('Product Id'),
                'sortable' => true,
                'index' => 'entity_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );
        $this->addColumn(
            'name',
            [
                'header' => __('Product Name'),
                'index' => 'name'
            ]
        );
        $this->addColumn(
            'sku',
            [
                'header' => __('Sku'),
                'index' => 'sku'
            ]
        );
        $this->addColumn(
            'position',
            [
                'header' => __('Position'),
                'name' => 'position',
                'type' => 'number',
                'validate_class' => 'validate-number',
                'index' => 'position',
                'sortable' => false,
                'filter' => false,
                'editable' => true,
                'edit_only' => false,
                'header_css_class' => 'col-position',
                'column_css_class' => 'col-position'
            ]
        );
        return parent::_prepareColumns();
    }

    /**
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('conceptive/school/productGrid', ['_current' => true]);
    }

    protected function _getSelectedProducts()
    {
        $products = $this->getProductsRelated();

        if (!$products && !is_array($products)) {
            $products = $this->getSelectedRelatedProducts();
        }

        return $products;
    }

    public function getSelectedRelatedProducts()
    {
        $products = [];
        $schoolProductsColl = $this->schoolProductFactory->create();
        $schoolProductsColl->addFieldToFilter('school_id', ['eq' => $this->getSchool()->getId()]);

        foreach ($schoolProductsColl as $schoolProducts) {
            $productIds = $schoolProducts->getProductIds();
            $products = $productIds ? explode(',', $productIds) : $products;
        }

        return $products;
    }

    public function getTabLabel()
    {
        return __('Products');
    }

    public function getTabTitle()
    {
        return __('Products');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
