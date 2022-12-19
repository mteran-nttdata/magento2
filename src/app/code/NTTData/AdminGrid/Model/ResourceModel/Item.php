<?php

namespace NTTData\AdminGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('nttdata_admin_grid', 'id_company');
    }
}
