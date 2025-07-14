<?php

namespace Conceptive\RequestQuote\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;
use Conceptive\RequestQuote\Helper\Data;

/**
 * Class View
 * Block class for handling the view of a specific request quote.
 */
class View extends Template
{
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var RequestQuoteFactory
     */
    protected $quoteFactory;

    /**
     * @var Data
     */
    protected $helper;

    /**
     * View constructor.
     *
     * @param Template\Context $context
     * @param Registry $registry
     * @param RequestQuoteFactory $quoteFactory
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        RequestQuoteFactory $quoteFactory,
        Data $helper,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->quoteFactory = $quoteFactory;
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve the current request quote from the registry.
     *
     * @return \Conceptive\RequestQuote\Model\RequestQuote|null
     */
    public function getQuote()
    {
        return $this->registry->registry('current_quote');
    }

    /**
     * Retrieve the associated product for the current quote.
     *
     * @return \Magento\Catalog\Model\Product|null
     */
    public function getProduct()
    {
        $quote = $this->getQuote();
        if ($quote) {
            try {
                return $this->helper->getProductById($quote->getProductId());
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }

    /**
     * Get the back URL for navigating to the quotes index page.
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('requestquote/index/index');
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
}
