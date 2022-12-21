<?php

namespace GT\Evob\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$displayText = $observer->getData('mp_text');
		echo $displayText->getText() . " - Event </br>";
		echo $displayText->getTexttwo() . " - Event </br>";
		$displayText->setText('Execute event successfully.');

		return $this;
	}
}