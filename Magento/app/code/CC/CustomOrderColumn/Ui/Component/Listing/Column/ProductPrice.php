<?php
namespace CC\CustomOrderColumn\Ui\Component\Listing\Column;

use \Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\Api\SearchCriteriaBuilder;

class ProductPrice extends Column
{
    protected $_orderRepository;
    protected $_searchCriteria;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        OrderRepositoryInterface $orderRepository,
        SearchCriteriaBuilder $criteria,
        array $components = [],
        array $data = []
    ) {
        $this->_orderRepository = $orderRepository;
        $this->_searchCriteria  = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {

                $order  = $this->_orderRepository->get($item["entity_id"]);
                $status = $order->getData("product_price");

                $orderId = $item["entity_id"];

                $orderData = $this->getOrderData($orderId);

                foreach ($orderData->getAllVisibleItems() as $_item) {
                    $product_sku = $_item->getSku();
                }

                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $productCollection = $objectManager->create('Magento\Catalog\Model\Product')->loadByAttribute('sku', $product_sku);
                $productPriceBySku = $productCollection->getPrice();
                $export_status = round($productPriceBySku,0);

                // $this->getData('name') returns the name of the column so in this case it would return export_status
                $item[$this->getData('name')] = $export_status;
            }
        }

        return $dataSource;
    }

    /* Load Order data by order_id */
    public function getOrderData($order_id)
    {
        $order = $this->_orderRepository->get($order_id);
        return $order;
    }
}