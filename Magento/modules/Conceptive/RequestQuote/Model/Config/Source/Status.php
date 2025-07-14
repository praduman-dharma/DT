<?php

namespace Conceptive\RequestQuote\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * Get status options as an array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'pending', 'label' => __('Pending')],
            ['value' => 'approved', 'label' => __('Approved')],
            ['value' => 'declined', 'label' => __('Declined')],
            ['value' => 'completed', 'label' => __('Completed')],
        ];
    }

    /**
     * Get status options as a key-value array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'pending' => __('Pending'),
            'approved' => __('Approved'),
            'declined' => __('Declined'),
            'completed' => __('Completed'),
        ];
    }
}
