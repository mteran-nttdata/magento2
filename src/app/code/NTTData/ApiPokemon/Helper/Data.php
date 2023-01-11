<?php

namespace NTTData\ApiPokemon\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    protected function getConfig($path, $store =ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue('apiurl/' . $path,$store);
    }

    public function isEnabled()
    {
        return $this->getConfig('general/enable');
    }


    public function urlApi(){
        return $this->getConfig('general/url');
    }




    
}