<?php
namespace Meetanshi\Extension\Block;

class Save extends \Magento\Framework\View\Element\Template
{
    public function getMessage()
    {
        $msg = "Form Submitted";
        return $msg;
    }
}