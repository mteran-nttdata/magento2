<?php
namespace NTTData\ApiPokemon\Model\Config\Source;

class GenerationPokemon implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'generation-i', 'label' => __('generation-i')],
    ['value' => 'generation-ii', 'label' => __('generation-ii')],
    ['value' => 'generation-iii', 'label' => __('generation-iii')],
    ['value' => 'generation-iv', 'label' => __('generation-iv')],
    ['value' => 'generation-v', 'label' => __('generation-v')],
    ['value' => 'generation-vi', 'label' => __('generation-vi')],
    ['value' => 'generation-vii', 'label' => __('generation-vii')],
    ['value' => 'generation-viii', 'label' => __('generation-viii')]
  ];
 }
}


