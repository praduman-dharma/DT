<?php

namespace Conceptive\CustomGrid\Ui\Component;

use Conceptive\CustomGrid\Model\ResourceModel\School\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider
 * Provides data for the Request Quote UI component.
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var array|null
     * Holds loaded data from the collection.
     */
    protected $loadedData;

    /**
     * Constructor
     *
     * @param string $name Name of the data provider.
     * @param string $primaryFieldName Primary field name in the data source.
     * @param string $requestFieldName Request field name.
     * @param CollectionFactory $collectionFactory Factory to create the request quote collection.
     * @param array $meta Metadata for the UI component.
     * @param array $data Data for the UI component.
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data from the collection.
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        return $this->loadedData;
    }
}
