<?php
namespace NTTData\Practice\Block;

/* hace la funcion para q muestre la lista de productos del catalogo de magento */


class Index extends \Magento\Framework\View\Element\Template{    
  
      /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;
  
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory){   
            
            
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context);
    }
    
    
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create(); //obtiene la lista de todos los productos
        $collection->addAttributeToSelect('*'); // selecciona todas las propiedades 
        $collection->addAttributeToSort('name','DESC'); // ordenar por nombre en forma descendiente
        $collection->addCategoriesFilter(['in' => $ids]);
        $collection->setPageSize(10);  //muestra el limite de articulos indicado en este caso solo 10
     
        return $collection; //retorna los datos q se almacenan de acuerdo a especificaciones dadas arriba
        
    }

}