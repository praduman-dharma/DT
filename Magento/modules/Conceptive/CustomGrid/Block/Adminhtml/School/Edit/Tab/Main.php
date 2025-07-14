<?php

namespace Conceptive\CustomGrid\Block\Adminhtml\School\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;

class Main extends Generic implements TabInterface
{
    protected $_wysiwygConfig;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    public function getTabLabel()
    {
        return __('General');
    }

    public function getTabTitle()
    {
        return __('General');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    protected function _prepareForm()
    {
        $form = $this->_formFactory->create();
        $fieldset = $form->addFieldset('main_section', ['legend' => __('Main Section')]);

        $school = $this->_coreRegistry->registry('cc_school');

        if ($school->getId()) {
            $fieldset->addField(
                'entity_id',
                'hidden',
                [
                    'name' => 'school[entity_id]',
                    'label' => __('ID'),
                    'title' => __('ID'),
                ]
            );
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'school[name]',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'image',
            'image',
            [
                'name' => 'image',
                'label' => __('Image'),
                'title' => __('Image'),
            ]
        );

        $fieldset->addField(
            'description',
            'editor',
            [
                'name' => 'school[description]',
                'label' => __('Description'),
                'title' => __('Description'),
                'style' => 'height:200px;',
                'required' => false,
                'config' => $this->_wysiwygConfig->getConfig()
            ]
        );

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'school[email]',
                'label' => __('Email'),
                'title' => __('Email'),
                'class' => 'validate-email',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'phone_number',
            'text',
            [
                'name' => 'school[phone_number]',
                'label' => __('Phone Number'),
                'title' => __('Phone Number'),
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'school[status]',
                'label' => __('Status'),
                'title' => __('Status'),
                'value' => 1,
                'values' => [
                    ['value' => 1, 'label' => __('Yes')],
                    ['value' => 0, 'label' => __('No')],
                ],
            ]
        );

        $form->setValues($school->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
