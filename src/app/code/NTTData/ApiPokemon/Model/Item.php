<?php

namespace NTTData\ApiPokemon\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\ApiPokemon\Model\ResourceModel\Item::class);
    }
}