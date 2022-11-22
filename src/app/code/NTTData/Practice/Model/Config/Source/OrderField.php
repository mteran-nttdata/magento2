<?php
namespace NTTData\Practice\Model\Config\Source;

use Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory;


class OrderField implements \Magento\Framework\Option\ArrayInterface
{

  protected $_attributeFactory;

  public function __construct (CollectionFactory $attributeFactory) 
  {
      $this->_attributeFactory = $attributeFactory;
  }


  /**
   * Get options
   *
   * @return array
   */
  public function toOptionArray()
  {
    $attributeInfo = $this->_attributeFactory->create();

    foreach($attributeInfo as $attributes)
    {
      $attributeCode = $attributes->getAttributeCode();
      $attrlabel = $attributes->getFrontendLabel();
      $availableOptions[] = array('value' => $attributeCode , 'label' => $attrlabel);
    }


    return $availableOptions;   
  }


 
}


