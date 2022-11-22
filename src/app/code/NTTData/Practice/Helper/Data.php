<?php

namespace NTTData\Practice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    protected function getConfig($path, $store =ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue('practice/' . $path,$store);
    }

    public function isEnabled()
    {
        return $this->getConfig('general/enable');
    }


    public function getLimit(){
        return $this->getConfig('general/limit');
    }


    public function getOrderField(){
        return $this->getConfig('general/order_field');
    }

    public function getOrderDirection(){
        return $this->getConfig('general/order_direction');
    }

    
}