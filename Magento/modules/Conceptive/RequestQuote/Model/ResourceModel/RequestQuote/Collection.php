<?php

namespace Conceptive\RequestQuote\Model\ResourceModel\RequestQuote;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Conceptive\RequestQuote\Model\RequestQuote as Model;
use Conceptive\RequestQuote\Model\ResourceModel\RequestQuote as ResourceModel;

/**
 * Class Collection
 * Represents a collection of RequestQuote entities.
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize the collection model and resource model.
     *
     * This method sets the associated model and resource model that the collection works with.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
