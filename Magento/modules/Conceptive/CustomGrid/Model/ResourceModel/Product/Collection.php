<?php

namespace Conceptive\CustomGrid\Model\ResourceModel\Product;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Conceptive\CustomGrid\Model\Product as Model;
use Conceptive\CustomGrid\Model\ResourceModel\Product as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
