<?php

namespace Conceptive\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;

class RecentOrders implements ResolverInterface
{
    private $orderCollectionFactory;
    private $getCustomer;

    public function __construct(
        CollectionFactory $orderCollectionFactory,
        GetCustomer $getCustomer
    ) {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->getCustomer = $getCustomer;
    }

    public function resolve(
        Field $field,
        $context, 
        ResolveInfo $resolveInfo,
        array $value = null,
        array $args = null
    ) {
        /*
        $customer = $this->getCustomer->execute($context);
        $customerId = $customer->getId();
        if (!$customerId) {
            return [];
        } */

        $limit = $args['limit'] ?? 5;
        $orders = $this->orderCollectionFactory->create()
            // ->addFieldToFilter('customer_id', $customerId)
            ->setOrder('created_at', 'DESC')
            ->setPageSize($limit);

        $orderData = [];
        foreach ($orders as $order) {
            $orderData[] = [
                'order_id' => $order->getIncrementId(),
                'grand_total' => (float) $order->getGrandTotal(),
                'status' => $order->getStatus()
            ];
        }

        return $orderData;
    }
}
