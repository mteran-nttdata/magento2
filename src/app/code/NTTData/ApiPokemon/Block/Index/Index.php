<?php
namespace NTTData\ApiPokemon\Block\Index;
use Magento\Framework\View\Element\Template\Context;
use NTTData\ApiService\Service\PokemonService;
use NTTData\ApiPokemon\Helper\Data;

use Magento\Store\Model\StoreManagerInterface;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $storeManager;
   
    protected $pokeService;
  
    public function __construct(Context $context,
    StoreManagerInterface $storeManager, 
                                Data $helper,
                                PokemonService $pokeService ){   
        $this->helper = $helper;
        $this->pokeService = $pokeService;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }



	public function execute()
	{
		$storeID= $this->storeManager->getStore()->getId(); 
        return $storeID;
	}


    public function getOnePokemon(){

            $pokeNum= rand(1, 151);

            $pokeData= $this->pokeService->pokemon( $pokeNum);;
            $obj = json_decode($pokeData, true);

            $dataName=$obj['name'];
            $dataId=$obj['id'];

            $dataImg=$obj['sprites']['other']['dream_world']['front_default'];
            $dataImg2=$obj['sprites']['front_default'];

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
            $ability= array_column( $obj['abilities'], 'ability');
      
            $dataAbility= implode(",",array_column( $ability, 'name') );
            $model = [];
            $model=([
            'id'=>  $dataId,  
            'name'=>$dataName,
            'img'=>$dataImg,
            'img2'=>$dataImg2,
            'type'=>$dataTypes,
            'generation'=>$dataGenerations,
            'region'=>  $dataRegion,
            'ability'=>$dataAbility]);
            
          
   

		return $model;
        
    
    }




}