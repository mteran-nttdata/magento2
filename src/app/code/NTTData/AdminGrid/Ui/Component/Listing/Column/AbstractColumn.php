<?php

namespace NTTData\AdminGrid\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class AbstractColumn extends Column
{
    /**
     * @var \NTTData\AdminGrid\Model\ResourceModel\SelectDesign\CollectionFactory
     */
    /**
     * @var \NTTData\AdminGrid\Model\ResourceModel\SelectLanguage\CollectionFactory
     */
    protected $_collectionDesign;
    protected $_collectionLanguage;

    public function __construct(
        ContextInterface $context,            
        UiComponentFactory $uiComponentFactory,  
        \NTTData\AdminGrid\Model\ResourceModel\SelectDesign\CollectionFactory $collectionDesign,   
        \NTTData\AdminGrid\Model\ResourceModel\SelectLanguage\CollectionFactory $collectionLanguage,
        array $components = [],
        array $data = []
    ) {
       
        $this->_collectionDesign = $collectionDesign; 
        $this->_collectionLanguage = $collectionLanguage; 
        parent::__construct($context, $uiComponentFactory, $components, $data);     
    }



    
     

}