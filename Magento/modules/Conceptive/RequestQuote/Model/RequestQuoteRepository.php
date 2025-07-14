<?php

namespace Conceptive\RequestQuote\Model;

use Conceptive\RequestQuote\Api\Data\RequestQuoteInterface;
use Conceptive\RequestQuote\Api\Data\RequestQuoteSearchResultsInterfaceFactory;
use Conceptive\RequestQuote\Api\RequestQuoteRepositoryInterface;
use Conceptive\RequestQuote\Model\ResourceModel\RequestQuote as ResourceModel;
use Conceptive\RequestQuote\Model\ResourceModel\RequestQuote\CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

/**
 * Class RequestQuoteRepository
 */
class RequestQuoteRepository implements RequestQuoteRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * @var RequestQuoteFactory
     */
    protected $requestQuoteFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var RequestQuoteSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * RequestQuoteRepository constructor.
     * 
     * @param ResourceModel $resourceModel
     * @param RequestQuoteFactory $requestQuoteFactory
     * @param CollectionFactory $collectionFactory
     * @param RequestQuoteSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceModel $resourceModel,
        RequestQuoteFactory $requestQuoteFactory,
        CollectionFactory $collectionFactory,
        RequestQuoteSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resourceModel = $resourceModel;
        $this->requestQuoteFactory = $requestQuoteFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save request quote
     *
     * @param RequestQuoteInterface $requestQuote
     * @return RequestQuoteInterface
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function save(RequestQuoteInterface $requestQuote)
    {
        $requestQuoteModel = $this->requestQuoteFactory->create();

        if ($requestQuote->getId()) {
            $this->resourceModel->load($requestQuoteModel, $requestQuote->getId());

            if (!$requestQuoteModel->getId()) {
                throw new NoSuchEntityException(__('RequestQuote with ID "%1" does not exist.', $requestQuote->getId()));
            }
        }

        // Map the data from the interface to the model
        $requestQuoteModel->setData([
            'product_id'   => $requestQuote->getProductId(),
            'customer_id'  => $requestQuote->getCustomerId(),
            'name'         => $requestQuote->getName(),
            'email'        => $requestQuote->getEmail(),
            'phone_number' => $requestQuote->getPhoneNumber(),
            'comments'     => $requestQuote->getComments(),
            'status'       => $requestQuote->getStatus(),
            'store_id'     => $requestQuote->getStoreId(),
        ]);

        // If it's an existing record, set the ID
        if ($requestQuote->getId() && !$requestQuoteModel->getId()) {
            $requestQuoteModel->setId($requestQuote->getId());
        }

        try {
            $this->resourceModel->save($requestQuoteModel);

            $this->resourceModel->load($requestQuoteModel, $requestQuoteModel->getId());
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $requestQuoteModel;
    }

    /**
     * Get request quote by ID
     *
     * @param int $id
     * @return RequestQuoteInterface
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $requestQuote = $this->requestQuoteFactory->create();
        $this->resourceModel->load($requestQuote, $id);
        if (!$requestQuote->getId()) {
            throw new NoSuchEntityException(__('The request quote with the "%1" ID doesn\'t exist.', $id));
        }

        return $requestQuote;
    }

    /**
     * Delete request quote
     *
     * @param RequestQuoteInterface $requestQuote
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RequestQuoteInterface $requestQuote)
    {
        try {
            $this->resourceModel->delete($requestQuote);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete request quote by ID
     *
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById($id)
    {
        $requestQuote = $this->getById($id);
        return $this->delete($requestQuote);
    }

    /**
     * Get list of request quotes
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Conceptive\RequestQuote\Api\Data\RequestQuoteSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        // Use collection processor to apply filters, sort orders, and paging
        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Conceptive\RequestQuote\Api\Data\RequestQuoteSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());

        $items = [];
        foreach ($collection as $requestQuoteModel) {
            $items[] = $requestQuoteModel;
        }

        $searchResults->setItems($items);
        return $searchResults;
    }

    // Additional methods for collection handling can be added if needed
}
