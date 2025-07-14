<?php

namespace Conceptive\RequestQuote\Api;

use Conceptive\RequestQuote\Api\Data\RequestQuoteInterface;
use Conceptive\RequestQuote\Api\Data\RequestQuoteSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface RequestQuoteRepositoryInterface
{
    /**
     * Save RequestQuote data
     *
     * @param RequestQuoteInterface $requestQuote
     * @return RequestQuoteInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(RequestQuoteInterface $requestQuote);

    /**
     * Get RequestQuote by ID
     *
     * @param int $id
     * @return RequestQuoteInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * Delete RequestQuote
     *
     * @param RequestQuoteInterface $requestQuote
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(RequestQuoteInterface $requestQuote);

    /**
     * Delete RequestQuote by ID
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($id);

    /**
     * Get list of RequestQuotes
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return RequestQuoteSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
