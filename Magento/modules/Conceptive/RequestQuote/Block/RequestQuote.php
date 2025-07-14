<?php

namespace Conceptive\RequestQuote\Block;

use Magento\Framework\View\Element\Template;
use Conceptive\RequestQuote\Helper\Data;
use Conceptive\RequestQuote\Model\ResourceModel\RequestQuote\CollectionFactory;

/**
 * Class RequestQuote
 * Block class for handling the Request Quote functionality on the frontend.
 */
class RequestQuote extends Template
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var CollectionFactory
     */
    protected $quoteCollectionFactory;

    /**
     * RequestQuote constructor.
     *
     * @param Template\Context $context
     * @param Data $helper
     * @param CollectionFactory $quoteCollectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $helper,
        CollectionFactory $quoteCollectionFactory,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->quoteCollectionFactory = $quoteCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Check if the request quote feature is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    /**
     * Get the button text for the request quote feature.
     *
     * @return string
     */
    public function getButtonText()
    {
        return $this->helper->getConfigValue('requestquote/general/button_text') ?? __('Get Quote');
    }

    /**
     * Check if the customer is logged in.
     *
     * @return bool
     */
    public function isCustomerLoggedIn()
    {
        return $this->helper->getCustomer();
    }

    /**
     * Get the request quote helper.
     *
     * @return Data
     */
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Get the list of quotes for the logged-in customer.
     *
     * @return \Conceptive\RequestQuote\Model\ResourceModel\RequestQuote\Collection
     */
    public function getQuotes()
    {
        $customer = $this->helper->getCustomer();
        $customerId = $customer ? $customer->getId() : '';

        $collection = $this->quoteCollectionFactory->create();
        $collection->addFieldToFilter('customer_id', $customerId);
        $collection->setOrder('created_at', 'desc');
        return $collection;
    }

    /**
     * Get the HTML for the pager.
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    /**
     * Get the URL to view the details of a specific quote.
     *
     * @param \Conceptive\RequestQuote\Model\RequestQuote $quote
     * @return string
     */
    public function getViewUrl($quote)
    {
        return $this->getUrl('requestquote/index/view', ['id' => $quote->getId()]);
    }

    /**
     * Get product information by product ID.
     *
     * @param int $productId
     * @return \Magento\Catalog\Model\Product|null
     */
    public function getProductById($productId)
    {
        return $this->helper->getProductById($productId);
    }

    /**
     * Prepare the layout for the request quote block.
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getNameInLayout() == 'customer.quotes.list' && $this->getQuotes()) {
            $pager = $this->getLayout()->createBlock(\Magento\Theme\Block\Html\Pager::class, 'customer.quotes.pager')
                ->setCollection($this->getQuotes());
            $this->setChild('pager', $pager);
        }
        return $this;
    }
}
