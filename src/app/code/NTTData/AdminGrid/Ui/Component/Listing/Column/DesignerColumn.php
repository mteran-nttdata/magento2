<?php

namespace NTTData\AdminGrid\Ui\Component\Listing\Column;



class DesignerColumn extends AbstractColumn
{
  

        public function prepareDataSource(array $dataSource) {
            if (isset($dataSource['data']['items'])) {
                foreach($dataSource['data']['items'] as & $item){
            
                    $item[$this->getData('name')] = $this->getIdDesigner($item); 
                }
            }

            return $dataSource;
        }

            /**
         * Get data.
         *
         * @param array $item
         *
         * @return string
         */
        protected function getIdDesigner(array $item) {
            $dataId = $item['id_designer'];
            $data="";
            $collection = $this->_collectionDesign->create();
            $collection->addFieldToFilter('id_designer', $dataId);

            foreach ($collection as $item) {
                $data = $item->getName();
              
            }
            
            return $data;

        }

}