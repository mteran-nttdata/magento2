<?php
namespace NTTData\Practice\Model\Config\Source;

class OrderDirection implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'asc', 'label' => __('Ascending')],
    ['value' => 'desc', 'label' => __('Descending')]
  ];
 }
}


