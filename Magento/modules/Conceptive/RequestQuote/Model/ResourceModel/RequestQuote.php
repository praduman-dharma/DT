<?php

namespace Conceptive\RequestQuote\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class RequestQuote
 * Resource model for the RequestQuote entity.
 * Handles the interaction between the RequestQuote model and the database.
 */
class RequestQuote extends AbstractDb
{
    /**
     * Initialize the RequestQuote resource model.
     *
     * This method sets the database table and the primary key field for the entity.
     * The table name is 'cc_request_quote' and the primary key is 'id'.
     */
    protected function _construct()
    {
        $this->_init('cc_request_quote', 'id');
    }
}
