<?php

namespace Another\HelloWorld\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    protected $_encryptor;

    public function __construct(
        Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor,
    ) {
        $this->_storeManager = $storeManager;
        $this->_encryptor = $encryptor;
        parent::__construct($context);
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getNumoneData()
    {
        return $this->getNumone();
    }

    public function getNumtwoData()
    {
        return $this->getNumtwo();
    }

    /**
     * Encrypt password
     *
     * @param   string $password
     * @return  string
     */
    public function encryptPassword($password)
    {
        return $this->_encryptor->encrypt($password);
    }

    /**
     * Decrypt password
     *
     * @param   string $password
     * @return  string
     */
    
    public function decryptPassword($password)
    {
        // $test = "a883f155872a9ab503c3493330d69d0dda161775d17927fd89c7794b271fe64c:326OQxfRRkVHi03H:2";
        $test = $this->_encryptor->decrypt($password);
        // $test = $this->_encryptor->getHash($password,true);
        return $test;
    }
}
