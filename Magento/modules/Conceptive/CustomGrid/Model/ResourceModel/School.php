<?php

namespace Conceptive\CustomGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class School extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('school_information', 'entity_id');
    }
}
