<?php

namespace Conceptive\RequestQuote\Block\Adminhtml\Quote\Edit;

/**
 * Class DeleteButton
 * Admin delete button block for the request quote edit page.
 */
class DeleteButton extends GenericButton
{
    /**
     * Get the configuration for the delete button.
     *
     * @return array
     */
    public function getButtonData()
    {
        $quoteId = $this->context->getRequest()->getParam('id');
        if (!$quoteId) {
            // If no quote ID is provided (e.g., on "Add New Quote" page), don't show the delete button.
            return [];
        }

        return [
            'label' => __('Delete'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this quote?')
                . '\', \'' . $this->getDeleteUrl() . '\')',
            'sort_order' => 20,
        ];
    }

    /**
     * Get the URL for the delete action.
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getRequest()->getParam('id')]);
    }
}
