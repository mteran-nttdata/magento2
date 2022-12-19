<?php
namespace NTTData\AdminGrid\Model\ResourceModel;

class SelectDesign extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() {
        $this->_init('nttdata_admindesigner', 'id_designer');
    }
}