<?php
namespace Meetanshi\Extension\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;

class Index extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $contact = $this->_objectManager->create('Meetanshi\Extension\Model\Extension');
        $contact->setName('Nitin');
        $contact->setEmail('nitin@gmail.com');
        $contact->setTelephone('9080706050');
        $contact->save();
        
        die('test');
    }
}