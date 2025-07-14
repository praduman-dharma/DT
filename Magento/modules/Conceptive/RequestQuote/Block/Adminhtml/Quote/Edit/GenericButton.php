<?php

namespace Conceptive\RequestQuote\Block\Adminhtml\Quote\Edit;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class GenericButton
 * Abstract class to provide basic functionality for buttons in the admin request quote section.
 */
abstract class GenericButton implements ButtonProviderInterface
{
    /**
     * @var Context
     * The context object containing various Magento dependencies.
     */
    protected $context;

    /**
     * Constructor
     *
     * @param Context $context Context object for accessing framework features like URL and request handling.
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    /**
     * Retrieve the configuration for a button.
     *
     * @return string
     */
    abstract public function getButtonData();

    /**
     * Generate a URL based on the provided route and parameters.
     *
     * @param string $route Route path for the desired action.
     * @param array $params Additional parameters for the URL generation.
     * @return string
     */
    protected function getUrl($route, $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }

    /**
     * Get the current request object.
     *
     * @return \Magento\Framework\App\RequestInterface
     */
    protected function getRequest()
    {
        return $this->context->getRequest();
    }
}
