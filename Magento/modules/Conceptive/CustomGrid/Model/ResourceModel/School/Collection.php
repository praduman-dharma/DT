<?php

namespace Conceptive\CustomGrid\Model\ResourceModel\School;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Conceptive\CustomGrid\Model\School as Model;
use Conceptive\CustomGrid\Model\ResourceModel\School as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
