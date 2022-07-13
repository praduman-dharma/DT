<?php
namespace Meetanshi\Extension\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{   
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		parent::__construct($context);
		$this->_pageFactory = $pageFactory;
	}

	public function execute()
	{
        // return $this->_pageFactory->create();
        $resultPage = $this->_pageFactory->create();
        return $resultPage;
    }
}