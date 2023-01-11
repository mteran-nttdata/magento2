<?php
namespace NTTData\ApiPokemon\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory; 

		return parent::__construct($context);
	}

	public function execute()
	{

		return $this->_pageFactory->create();
	}
}
