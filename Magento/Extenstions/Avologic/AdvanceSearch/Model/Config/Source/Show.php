<?php
/**
 * My own options
 *
 */
namespace Avologic\AdvanceSearch\Model\Config\Source;
class Show implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => __('Footer')],
            ['value' => '1', 'label' => __('Header')]
        ];
    }
}