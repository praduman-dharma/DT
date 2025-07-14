<?php

namespace Conceptive\RequestQuote\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Conceptive\RequestQuote\Helper\Data;
use Psr\Log\LoggerInterface;
use Conceptive\RequestQuote\Model\RequestQuoteFactory;

/**
 * Class Add
 * Controller to handle "Add Request Quote" functionality.
 */
class Add implements HttpPostActionInterface
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var RequestQuoteFactory
     */
    protected $requestQuoteFactory;

    /**
     * Constructor.
     *
     * @param Context $context
     * @param Data $helper
     * @param PageFactory $pageFactory
     * @param JsonFactory $resultJsonFactory
     * @param RequestQuoteFactory $requestQuoteFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        Data $helper,
        PageFactory $pageFactory,
        JsonFactory $resultJsonFactory,
        RequestQuoteFactory $requestQuoteFactory,
        LoggerInterface $logger
    ) {
        $this->helper = $helper;
        $this->logger = $logger;
        $this->pageFactory = $pageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->requestQuoteFactory = $requestQuoteFactory;
        $this->request = $context->getRequest();
        $this->messageManager = $context->getMessageManager();
    }

    /**
     * Execute method for adding a request quote.
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        try {
            $postData = $this->request->getPostValue();
            $productId = $this->request->getParam('product_id');
            $product = $this->helper->getProductById($productId);
            $customer = $this->helper->getCustomer();

            $mobileNumber = $postData['phone_number'] ?? '';

            if ($customer) {
                $mobileNumber = $customer->getCustomAttribute('phone_number') ? $customer->getCustomAttribute('phone_number')->getValue() : $mobileNumber;
            }

            // Create and save the request quote
            $requestQuote = $this->requestQuoteFactory->create();
            $requestQuote->setData([
                'product_id'   => $productId,
                'customer_id'  => $customer ? $customer->getId() : null,
                'name'         => $customer ? $customer->getName() : $postData['name'],
                'email'        => $customer ? $customer->getEmail() : $postData['email'],
                'phone_number' => $mobileNumber,
                'comments'     => $postData['comments'] ?? '',
                'status'       => 'pending',
                'store_id'     => $this->helper->getStoreId()
            ]);
            $requestQuote->save();

            // Send Email Notification
            $emailData = [
                'product_id'     => $productId,
                'product_name'   => $product->getName(),
                'customer_name'  => $requestQuote->getName(),
                'customer_email' => $requestQuote->getEmail(),
                'phone_number'   => $mobileNumber,
                'comments'       => $requestQuote->getComments(),
            ];
            $this->helper->sendRequestQuoteEmail($emailData);

            $this->messageManager->addSuccessMessage(__('Request quote form submitted for %1', $product->getName()));

            // Prepare the success message HTML
            $htmlContent = $this->pageFactory->create()->getLayout()
                ->createBlock('Conceptive\RequestQuote\Block\RequestQuote')
                ->setData('product', $product)
                ->setTemplate('Conceptive_RequestQuote::popup/success.phtml')
                ->toHtml();

            $response = [
                'success' => true,
                'html' => $htmlContent
            ];
        } catch (\Exception $e) {
            $this->logger->critical($e);
            $response = [
                'success' => false,
                'message' => __('An error occurred while processing your request.')
            ];
        }

        return $result->setData($response);
    }
}
