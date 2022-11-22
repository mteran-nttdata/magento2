<?php

namespace NTTData\Practice\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\StoreManagerInterface;


class Productlist extends Action
{
    protected $_pageFactory;
	protected $storeManager;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		StoreManagerInterface $storeManager)
	{
		$this->_pageFactory = $pageFactory; 
		$this->storeManager = $storeManager;
		return parent::__construct($context);
	}

	public function execute()
	{
		
		$storeID= $this->storeManager->getStore()->getId(); 
		
		date_default_timezone_set("America/New_York");
		if ($storeID == 3) {
			date_default_timezone_set("America/Argentina/Buenos_Aires");
		}


		$date = date("H:i:s");
		$pagefactory = $this->_pageFactory->create();
		$pagefactory->getConfig()->getTitle()->set(__("Now being %1, I'm learning translations", $date ));
		return $pagefactory;
	}


}
