<?php

namespace NTTData\AdminGrid\Ui\Component\Listing\Column;


class LanguageColumn extends AbstractColumn
{
    
        public function prepareDataSource(array $dataSource) {
            if (isset($dataSource['data']['items'])) {
                foreach($dataSource['data']['items'] as & $item){
            
                    $item[$this->getData('name')] = $this->getIdLanguage($item); 
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
        protected function getIdLanguage(array $item) {
            $dataId = $item['id_language'];
            $data="";
            $collection = $this->_collectionLanguage->create();
            $collection->addFieldToFilter('id_language', $dataId);

            foreach ($collection as $item) {
                $data = $item->getName();
              
            }
            
            return $data;

        }

}