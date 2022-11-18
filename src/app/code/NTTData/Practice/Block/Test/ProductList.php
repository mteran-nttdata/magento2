<?php
namespace NTTData\Practice\Block\Test;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use NTTData\Practice\Helper\Data;


class ProductList extends \Magento\Framework\View\Element\Template{    
  
      /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    protected $_attributeFactory;

    public function __construct(Context $context,
                                CollectionFactory $productCollectionFactory,
                                Data $helper)
	{
		$this->_productCollectionFactory = $productCollectionFactory;
        $this->helper = $helper;

        parent::__construct($context);
	}

    public function getCollection($ids)
    {
        $direction=$this->helper->getOrderDirection();
        $limite=$this->helper->getLimit();
        $attributes=$this->helper->getOrderField();
        
        $collection = $this->_productCollectionFactory->create(); 
        $collection->addAttributeToSelect('*'); 
        $collection->addAttributeToSort('name',$direction);
        $collection->addAttributeToFilter('description', ['like' => "%$attributes%"]);
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize($limite); 

        return $collection;
    }

    public function getEnabled()
    {
        return $this->helper->isEnabled();

    }

}