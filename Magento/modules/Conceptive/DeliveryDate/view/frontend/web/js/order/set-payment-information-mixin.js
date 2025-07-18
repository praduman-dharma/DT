/*jshint browser:true jquery:true*/
/*global alert*/
define([
    'jquery',
    'mage/utils/wrapper',
    'Conceptive_DeliveryDate/js/order/ordercomment-assigner'
], function ($, wrapper, ordercommentAssigner) {
    'use strict';

    return function (placeOrderAction) {
        /** Override place-order-mixin for set-payment-information action as they differs only by method signature */
        return wrapper.wrap(placeOrderAction, function (originalAction, messageContainer, paymentData) {
            ordercommentAssigner(paymentData);

            return originalAction(messageContainer, paymentData);
        });
    };
});