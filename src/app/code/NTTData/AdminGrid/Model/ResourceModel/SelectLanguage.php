<?php
namespace NTTData\AdminGrid\Model\ResourceModel;

class SelectLanguage extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() {
        $this->_init('nttdata_adminlanguage', 'id_language');
    }
}