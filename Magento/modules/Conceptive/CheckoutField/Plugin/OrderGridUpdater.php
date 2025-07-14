<?php

namespace Conceptive\CheckoutField\Plugin;

class OrderGridUpdater
{
    public function afterSave(
        \Magento\Sales\Model\ResourceModel\Order $subject,
        $result,
        $order
    ) {
        if ($order->dataHasChangedFor('agree')) {
            $order->getResource()->getConnection()->update(
                $order->getResource()->getTable('sales_order_grid'),
                ['agree' => $order->getAgree()],
                ['entity_id = ?' => $order->getId()]
            );
        }
        return $result;
    }
}