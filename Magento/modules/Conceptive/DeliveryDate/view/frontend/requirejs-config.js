var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Conceptive_DeliveryDate/js/order/place-order-mixin': true
            },
            'Magento_Checkout/js/action/set-payment-information': {
                'Conceptive_DeliveryDate/js/order/set-payment-information-mixin': true
            },
            'Magento_Checkout/js/action/set-shipping-information': {
                'Conceptive_DeliveryDate/js/order/set-shipping-information-mixin': true
            }
        }
    }
}

