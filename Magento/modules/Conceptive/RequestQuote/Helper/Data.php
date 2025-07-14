<?php

namespace Conceptive\RequestQuote\Helper;

use Magento\Framework\App\Area;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\MailException;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Model\Product\ImageFactory;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Customer\Model\SessionFactory;

/**
 * Class Data
 * Helper class for request quote functionality, providing configurations, customer sessions, and email handling.
 */
class Data extends AbstractHelper
{
    public const IS_ENABLED     = 'requestquote/general/enabled';
    public const SEND_EMAIL     = 'requestquote/general/send_email_to_admin';
    public const EMAIL_SENDER   = 'requestquote/general/email_sender';
    public const EMAIL_TEMPLATE = 'requestquote/general/email_template';

    /**
     * Inline translation for email handling
     *
     * @var StateInterface
     */
    private $inlineTranslation;

    /**
     * Email transport builder
     *
     * @var TransportBuilder
     */
    private $transportBuilder;

    /**
     * Filesystem interface
     *
     * @var \Magento\Framework\Filesystem
     */
    protected $filesystem;

    /**
     * Store manager interface
     *
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Product repository interface
     *
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * Product image factory
     *
     * @var ImageFactory
     */
    protected $imageFactory;

    /**
     * Image helper interface
     *
     * @var ImageHelper
     */
    protected $imageHelper;

    /**
     * Customer session factory
     *
     * @var SessionFactory
     */
    protected $customerSession;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Filesystem $filesystem
     * @param StoreManagerInterface $storeManager
     * @param TransportBuilder $transportBuilder
     * @param ProductRepository $productRepository
     * @param ImageFactory $imageFactory
     * @param ImageHelper $imageHelper
     * @param SessionFactory $customerSession
     * @param StateInterface $inlineTranslation
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Filesystem $filesystem,
        StoreManagerInterface $storeManager,
        TransportBuilder $transportBuilder,
        ProductRepository $productRepository,
        ImageFactory $imageFactory,
        ImageHelper $imageHelper,
        SessionFactory $customerSession,
        StateInterface $inlineTranslation
    ) {
        $this->filesystem = $filesystem;
        $this->_storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;
        $this->productRepository = $productRepository;
        $this->imageFactory = $imageFactory;
        $this->imageHelper = $imageHelper;
        $this->customerSession = $customerSession;
        $this->inlineTranslation = $inlineTranslation;
        parent::__construct($context);
    }

    /**
     * Check if the request quote functionality is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->getConfigValue(self::IS_ENABLED);
    }

    /**
     * Retrieve the configuration value by path and store ID.
     *
     * @param string $path
     * @param int|null $storeId
     * @return string|null
     */
    public function getConfigValue($path, $storeId = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Get product details by product ID.
     *
     * @param int $productId
     * @return \Magento\Catalog\Model\Product
     */
    public function getProductById($productId)
    {
        return $this->productRepository->getById($productId);
    }

    /**
     * Get the product image URL.
     *
     * @param \Magento\Catalog\Model\Product $product
     * @return string
     */
    public function getProductImageUrl($product)
    {
        return $this->imageHelper->init($product, 'product_base_image')->getUrl() ?? '';
    }

    /**
     * Get logged-in customer details.
     *
     * @return \Magento\Customer\Api\Data\CustomerInterface|null
     */
    public function getCustomer()
    {
        $customerSession = $this->customerSession->create();
        if ($customerSession->isLoggedIn()) {
            return $customerSession->getCustomer();
        }
        return null;
    }

    /**
     * Get the current store ID.
     *
     * @return int
     */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    /**
     * Send request quote email to admin.
     *
     * @param array $requestQuoteData
     * @param int|null $storeId
     * @return bool
     * @throws LocalizedException
     */
    public function sendRequestQuoteEmail($requestQuoteData, $storeId = null)
    {
        try {
            $sendEmailToAdmin = $this->getConfigValue(self::SEND_EMAIL, $storeId);

            if (!$sendEmailToAdmin) {
                return false;
            }

            $emailTemplateId = $this->getConfigValue(self::EMAIL_TEMPLATE, $storeId);
            $this->inlineTranslation->suspend();

            $adminName = $this->getConfigValue('trans_email/ident_general/name', $storeId);
            $adminEmail = $this->getConfigValue('trans_email/ident_general/email', $storeId);

            $templateVars = [
                'product_id'    => $requestQuoteData['product_id'],
                'product_name'  => $requestQuoteData['product_name'],
                'customer_name' => $requestQuoteData['customer_name'],
                'customer_email'=> $requestQuoteData['customer_email'],
                'phone_number'  => $requestQuoteData['phone_number'],
                'comments'      => $requestQuoteData['comments']
            ];

            $sender = $this->getConfigValue(self::EMAIL_SENDER, $storeId);

            $transport = $this->transportBuilder
                ->setTemplateIdentifier($emailTemplateId)
                ->setTemplateOptions([
                    'area' => Area::AREA_FRONTEND,
                    'store' => $this->getStoreId()
                ])
                ->setTemplateVars($templateVars)
                ->setFromByScope($sender)
                ->addTo($adminEmail, $adminName)
                ->getTransport();

            $transport->sendMessage();
            $this->inlineTranslation->resume();

            return true;
        } catch (MailException $e) {
            throw new LocalizedException(__('Unable to send email.'));
        }
    }
}
