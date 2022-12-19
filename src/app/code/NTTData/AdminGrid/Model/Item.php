<?php

namespace NTTData\AdminGrid\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\NTTData\AdminGrid\Model\ResourceModel\Item::class);
    }
}