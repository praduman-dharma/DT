<?php

namespace Conceptive\CustomGrid\Block\Adminhtml\School\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('school_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('School Information'));
    }
}
