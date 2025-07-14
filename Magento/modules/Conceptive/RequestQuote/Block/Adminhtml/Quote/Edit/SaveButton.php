<?php

namespace Conceptive\RequestQuote\Block\Adminhtml\Quote\Edit;

/**
 * Class SaveButton
 * Provides the configuration for the "Save Request Quote" button in the admin panel.
 */
class SaveButton extends GenericButton
{
    /**
     * Retrieve the button configuration for saving a request quote.
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Request Quote'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
