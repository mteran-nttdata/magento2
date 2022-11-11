<?php

namespace NTTData\Practice\Controller\Test;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\JsonFactory;



class Productlist extends Action
{
    protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{

		$objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
		$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
		$storeID= $storeManager->getStore()->getStoreId(); 

		if ($storeID == 3) {
			$date = date_default_timezone_set("America/Argentina/Buenos_Aires");
			$date = date("H:i:s");
			
		}else {
			$date = date_default_timezone_set("America/New_York");
			$date = date("H:i:s");
			
		}

		$pagefactory = $this->_pageFactory->create();
		$pagefactory->getConfig()->getTitle()->set(__("Now being %1, I'm learning translations", $date ));
		return $pagefactory;
	}
}
