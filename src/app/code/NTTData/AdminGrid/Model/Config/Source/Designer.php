<?php
namespace NTTData\AdminGrid\Model\Config\Source;

class Designer implements \Magento\Framework\Option\ArrayInterface
{
 /**
     * @var \NTTData\AdminGrid\Model\ResourceModel\SelectDesign\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var array|null
     */
    protected $_options;

    /**
     * @param \NTTData\AdminGrid\Model\ResourceModel\SelectDesign\CollectionFactory $collectionFactory
     */
    public function __construct(
        \NTTData\AdminGrid\Model\ResourceModel\SelectDesign\CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray() {
        if ($this->_options === null) {
            $collection = $this->_collectionFactory->create();

            $this->_options = [['label' => 'select', 'value' => '']];

            foreach ($collection as $category) {
                $this->_options[] = [
                    'label' => __($category->getName()),
                    'value' => $category->getId()
                ];
            }
        }

        return $this->_options;
    }
}
