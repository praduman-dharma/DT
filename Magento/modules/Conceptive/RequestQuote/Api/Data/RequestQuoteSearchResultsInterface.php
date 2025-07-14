<?php

namespace Conceptive\RequestQuote\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RequestQuoteSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of RequestQuotes
     *
     * @return \Conceptive\RequestQuote\Api\Data\RequestQuoteInterface[]
     */
    public function getItems();

    /**
     * Set list of RequestQuotes
     *
     * @param \Conceptive\RequestQuote\Api\Data\RequestQuoteInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
