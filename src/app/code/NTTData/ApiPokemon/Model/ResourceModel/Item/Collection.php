<?php

namespace NTTData\ApiPokemon\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\ApiPokemon\Model\Item;
use NTTData\ApiPokemon\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id_pokemon';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
