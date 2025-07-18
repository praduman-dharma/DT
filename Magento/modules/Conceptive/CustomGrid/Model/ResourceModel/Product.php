<?php

namespace Conceptive\CustomGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Product extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('school_products', 'entity_id');
    }
}
