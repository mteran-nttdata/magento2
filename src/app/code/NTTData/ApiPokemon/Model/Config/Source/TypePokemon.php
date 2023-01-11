<?php
namespace NTTData\ApiPokemon\Model\Config\Source;

class TypePokemon implements \Magento\Framework\Option\ArrayInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => '', 'label' => __('')],
    ['value' => 'normal', 'label' => __('normal')],
    ['value' => 'fighting', 'label' => __('fighting')],
    ['value' => 'flying', 'label' => __('flying')],
    ['value' => 'poison', 'label' => __('poison')],
    ['value' => 'ground', 'label' => __('ground')],
    ['value' => 'rock', 'label' => __('rock')],
    ['value' => 'bug', 'label' => __('bug')],
    ['value' => 'ghost', 'label' => __('ghost')],
    ['value' => 'steel', 'label' => __('steel')],
    ['value' => 'fire', 'label' => __('fire')],
    ['value' => 'water', 'label' => __('water')],
    ['value' => 'grass', 'label' => __('grass')],
    ['value' => 'electric', 'label' => __('electric')],
    ['value' => 'psychic', 'label' => __('psychic')],
    ['value' => 'ice', 'label' => __('ice')],
    ['value' => 'dragon', 'label' => __('dragon')],
    ['value' => 'dark', 'label' => __('dark')],
    ['value' => 'fairy', 'label' => __('fairy')],
    ['value' => 'unknown', 'label' => __('unknown')],
    ['value' => 'shadow', 'label' => __('shadow')]
  ];
 }
}


