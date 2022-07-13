<?php

namespace GT\Evob\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza','texttwo' => 'Adobe'));
		$this->_eventManager->dispatch('gt_evob_display_text', ['mp_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}