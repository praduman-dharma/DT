<?php

namespace Conceptive\RequestQuote\Block\Adminhtml\Quote\Edit;

/**
 * Class BackButton
 * Provides the configuration for the "Back" button in the request quote edit page.
 */
class BackButton extends GenericButton
{
    /**
     * Get configuration for the "Back" button.
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }

    /**
     * Get the URL for the "Back" action.
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}
