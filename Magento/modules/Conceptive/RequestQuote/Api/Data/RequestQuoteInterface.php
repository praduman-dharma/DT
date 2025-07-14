<?php

namespace Conceptive\RequestQuote\Api\Data;

interface RequestQuoteInterface
{
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Product ID
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set Product ID
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getCustomerId();

    /**
     * Set Customer ID
     *
     * @param int|null $customerId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get Phone Number
     *
     * @return string|null
     */
    public function getPhoneNumber();

    /**
     * Set Phone Number
     *
     * @param string|null $phoneNumber
     * @return $this
     */
    public function setPhoneNumber($phoneNumber);

    /**
     * Get Comments
     *
     * @return string
     */
    public function getComments();

    /**
     * Set Comments
     *
     * @param string $comments
     * @return $this
     */
    public function setComments($comments);

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set Status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set Created At
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Updated At
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set Updated At
     *
     * @param string|null $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get Store ID
     *
     * @return int|null
     */
    public function getStoreId();

    /**
     * Set Store ID
     *
     * @param int|null $storeId
     * @return $this
     */
    public function setStoreId($storeId);
}
