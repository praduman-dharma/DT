<?php
 
namespace Conceptive\CustomShipping\Model\Carrier;
 
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Psr\Log\LoggerInterface;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
 
class Custom extends AbstractCarrier implements CarrierInterface
{
    protected $_code = 'customshipping';
 
    protected $rateResultFactory;
 
    protected $rateMethodFactory;
 
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ErrorFactory $rateErrorFactory,
        LoggerInterface $logger,
        ResultFactory $rateResultFactory,
        MethodFactory $rateMethodFactory,
        array $data = []
    )
    {
        $this->rateResultFactory = $rateResultFactory;
        $this->rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }
 
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
 
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
 
        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->rateResultFactory->create();
 
        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->rateMethodFactory->create();
 
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));
 
        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('name'));
 
        /*you can fetch shipping price from different sources over some APIs, we used price from config.xml - xml node price*/
        $amount = $this->getConfigData('price');
        $shippingPrice = $this->getFinalPriceWithHandlingFee($amount);
        $method->setPrice($shippingPrice);
        $method->setCost($amount);
 
        $result->append($method);
 
        return $result;
    }
}