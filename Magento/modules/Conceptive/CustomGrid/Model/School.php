<?php

namespace Conceptive\CustomGrid\Model;

use Magento\Framework\Model\AbstractModel;
use Conceptive\CustomGrid\Model\ResourceModel\School as ResourceModel;

class School extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
