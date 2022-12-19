<?php

namespace NTTData\AdminGrid\Controller\Adminhtml\Item;

use NTTData\AdminGrid\Model\ResourceModel\Item\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

class Average extends Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;
    protected $ItemFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        Filter $filter,
        CollectionFactory $Item
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->ItemFactory = $Item;
        $this->filter = $filter;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->ItemFactory->create());
        

        foreach ($collection as $item) {
            $data []= (intval($item['age']));
            
        }

        $lenghtData = count($data);
        $sumData=array_sum($data);
        $average= $sumData/$lenghtData;


        $this->messageManager->addSuccess(__('The average age of the selected employees is %1.',$average));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('admingrid/index/index');
    }
}