<?php

namespace NTTData\ApiPokemon\Controller\Adminhtml\Index;

use NTTData\ApiPokemon\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $itemFactory;
 
    public function __construct(
 
        \Magento\Backend\App\Action\Context $context,
        \NTTData\ApiPokemon\Model\ItemFactory $itemFactory
 
    ) {
        
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
      
 
    }
 
    public function execute()
    {
 
        $model = $this->itemFactory->create();

        $data = $this->getRequest()->getPostValue()['general'];

        $type=implode(",",($data['type']));
        $generation=implode(",",($data['generation']));
        $region=implode(",",($data['region']));
        
        try {
 
            $model->addData([
                "name" => $data['name'],
                "type" => $type,
                "generation" => $generation,
                "region" => $region
            ]);
 
            $saveData = $model->save();
 
            if($saveData){
            
                $this->messageManager->addSuccess( __('Insert data Successfully !') );
            }
 
        }catch (\Exception $e) {
 
            $this->messageManager->addError(__($e->getMessage()));
 
        }
        
        $this->_redirect('*/*/index');
 
    }
 
}