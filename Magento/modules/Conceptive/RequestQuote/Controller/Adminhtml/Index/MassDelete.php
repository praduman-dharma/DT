<?php

namespace Conceptive\RequestQuote\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Conceptive\RequestQuote\Model\ResourceModel\RequestQuote\CollectionFactory;
use Conceptive\RequestQuote\Api\RequestQuoteRepositoryInterface;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class MassDelete
 * Handles mass deletion of request quotes in the admin panel.
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var RequestQuoteRepositoryInterface
     */
    protected $requestQuoteRepository;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param RequestQuoteRepositoryInterface $requestQuoteRepository
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        RequestQuoteRepositoryInterface $requestQuoteRepository
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->requestQuoteRepository = $requestQuoteRepository;
        parent::__construct($context);
    }

    /**
     * Execute the mass delete action.
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $deletedItems = 0;

        // Delete each item in the collection
        foreach ($collection as $item) {
            $this->requestQuoteRepository->deleteById($item->getId());
            $deletedItems++;
        }

        if ($deletedItems) {
            $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $deletedItems));
        }

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
