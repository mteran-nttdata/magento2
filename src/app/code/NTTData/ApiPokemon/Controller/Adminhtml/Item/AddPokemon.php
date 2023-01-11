<?php 
namespace NTTData\ApiPokemon\Controller\Adminhtml\Item;

use NTTData\ApiPokemon\Model\ItemFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use NTTData\ApiService\Service\PokemonService;
use NTTData\ApiPokemon\Helper\Data;
use NTTData\ApiPokemon\Model\ResourceModel\Item\CollectionFactory;


class AddPokemon extends \Magento\Framework\App\Action\Action{

    protected $pokeService;
    protected $helper;
    protected $_dataTable;
    protected $resultRedirect;
    protected $_collectionFactory;

    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \NTTData\ApiPokemon\Model\ItemFactory  $dataTable,
                                \NTTData\ApiService\Service\PokemonService $pokeService,
                                \NTTData\ApiPokemon\Helper\Data $helper,
                                \Magento\Framework\Controller\ResultFactory $result,
                                \NTTData\ApiPokemon\Model\ResourceModel\Item\CollectionFactory $collectionFactory)
    
    {
        parent::__construct($context);
        $this->_dataTable = $dataTable;
        $this->resultRedirect = $result;
        $this->pokeService = $pokeService;
        $this->helper = $helper;
        $this->_collectionFactory = $collectionFactory; 
      
    }
	public function execute(){

        $collection = $this->_collectionFactory->create();

        foreach ($collection as $item) {
            $id[]=$item['id_pokemon'];
            
        }

        if (!empty($collection->getData())) {
            $lastId= end($id);
            $intId= intval($lastId)+1;
            $offset =$intId;
        }else {
            $offset =0;
        }

        
        $response= $this->pokeService->sendRequest($this->helper->urlApi().$offset,'GET');  
        $res = json_decode($response,true);
        $data=$res['results'];

        for ($i=0; $i < 5; $i++) { 

            $dataName= $data[$i]['name'];
            $pokeUrl= $data[$i]['url'];

            $pokeData= $this->pokeService->sendRequest( $pokeUrl,'GET');;
            $obj = json_decode($pokeData, true);

            $type= array_column( $obj['types'], 'type');
            $dataTypes= implode(",",array_column( $type, 'name') ) ;
             
            $generation =array_keys($obj['sprites']['versions']);
            $dataGenerations= implode(",", $generation );

            $urlRegion= $obj['location_area_encounters'];
            $region= $this->pokeService->sendRequest( $urlRegion,'GET');
            $objRegion = json_decode($region, true);
            $locationArea = array_column( $objRegion,'location_area');
            if (empty($locationArea)) {
                $dataRegion ="";
            }else {
                foreach ($locationArea as $item) {
                    $urlLocationArea= $item['url'];
                    $locationCall= $this->pokeService->sendRequest( $urlLocationArea,'GET');
                    $objlocationCall = json_decode($locationCall, true);
                        
                    $urlLocation=$objlocationCall['location']['url'];
                    $resLocation= $this->pokeService->sendRequest(  $urlLocation ,'GET');
                    $objLocation = json_decode($resLocation, true);
        
                    $nameRegion[]= $objLocation['region']['name'];

                    $nameRegionUnique= array_unique($nameRegion);

                    $dataRegion= implode(",", $nameRegionUnique);
                }

            }
            
            $model = $this->_dataTable->create();
            $model->addData([
            'name'=>$dataName,
            'type'=>$dataTypes,
            'generation'=>$dataGenerations,
            'region'=>  $dataRegion ]);
            $saveData = $model->save();
          
        }

        if($saveData){
            $this->messageManager->addSuccess( __('Insert Record Successfully !') );
        }
		return $this->resultRedirectFactory->create()->setPath('apipokemon/index/index');
         
    
    }



}
 ?>