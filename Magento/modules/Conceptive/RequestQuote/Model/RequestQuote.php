<?php

namespace Conceptive\RequestQuote\Model;

use Magento\Framework\Model\AbstractModel;
use Conceptive\RequestQuote\Api\Data\RequestQuoteInterface;

/**
 * Class RequestQuote
 * Represents the request quote model.
 */
class RequestQuote extends AbstractModel implements RequestQuoteInterface
{
    /**
     * Initialize RequestQuote resource model
     */
    protected function _construct()
    {
        $this->_init(\Conceptive\RequestQuote\Model\ResourceModel\RequestQuote::class);
    }

    /**
     * Get request quote ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * Set request quote ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    /**
     * Get product ID
     *
     * @return int|null
     */
    public function getProductId()
    {
        return $this->getData('product_id');
    }

    /**
     * Set product ID
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        return $this->setData('product_id', $productId);
    }

    /**
     * Get customer ID
     *
     * @return int|null
     */
    public function getCustomerId()
    {
        return $this->getData('customer_id');
    }

    /**
     * Set customer ID
     *
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        return $this->setData('customer_id', $customerId);
    }

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getData('email');
    }

    /**
     * Set email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        return $this->setData('email', $email);
    }

    /**
     * Get phone number
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->getData('phone_number');
    }

    /**
     * Set phone number
     *
     * @param string $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        return $this->setData('phone_number', $phoneNumber);
    }

    /**
     * Get comments
     *
     * @return string|null
     */
    public function getComments()
    {
        return $this->getData('comments');
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return $this
     */
    public function setComments($comments)
    {
        return $this->setData('comments', $comments);
    }

    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->getData('status');
    }

    /**
     * Set status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        return $this->setData('status', $status);
    }

    /**
     * Get created at timestamp
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    /**
     * Set created at timestamp
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData('created_at', $createdAt);
    }

    /**
     * Get updated at timestamp
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }

    /**
     * Set updated at timestamp
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData('updated_at', $updatedAt);
    }

    /**
     * Get store ID
     *
     * @return int|null
     */
    public function getStoreId()
    {
        return $this->getData('store_id');
    }

    /**
     * Set store ID
     *
     * @param int $storeId
     * @return $this
     */
    public function setStoreId($storeId)
    {
        return $this->setData('store_id', $storeId);
    }
}
