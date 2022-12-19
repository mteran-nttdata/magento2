<?php
namespace NTTData\AdminGrid\Model\Config\Source;

class TypeEmployee implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'developer', 'label' => __('developer')],
    ['value' => 'designer', 'label' => __('designer')]
  ];
 }
}


