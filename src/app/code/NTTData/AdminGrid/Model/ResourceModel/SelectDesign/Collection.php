<?php
namespace NTTData\AdminGrid\Model\ResourceModel\SelectDesign;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    protected function _construct() {
        $this->_init('NTTData\AdminGrid\Model\SelectDesign', 'NTTData\AdminGrid\Model\ResourceModel\SelectDesign');
    }
}