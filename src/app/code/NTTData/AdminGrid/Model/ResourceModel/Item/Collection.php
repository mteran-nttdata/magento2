<?php
namespace NTTData\AdminGrid\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NTTData\AdminGrid\Model\Item;
use NTTData\AdminGrid\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection
{
    
    protected $_idFieldName = 'id_company';

    
    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }

    
    
    


}
