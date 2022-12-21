<?php

namespace Avologic\AdvanceSearch\Model\ResourceModel;

class ViewPageAttributes
{

    protected $collectionFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {

        $collection = $this->collectionFactory->create();
        $collection->addFieldToSelect('*');
        $attributesArray = array();
        $input_type_arr = array('select', 'multiselect');

        foreach ($collection->getItems() as $attribute) {
            if (in_array($attribute->getFrontendInput(), $input_type_arr)) :
                $attributesArray[] = array('value' => $attribute->getAttributeCode(), 'label' => $attribute->getFrontendLabel());
            endif;
        }
        return $attributesArray;
    }
}
