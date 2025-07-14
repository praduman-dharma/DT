require([
    'jquery',
    'mage/url',
    'Magento_Ui/js/modal/modal',
    'mage/validation'
], function ($, urlBuilder, modal) {
    'use strict';

    var options = {
        type: 'popup',
        responsive: true,
        innerScroll: true,
        modalClass: 'cc-quote-popup',
        title: 'Request Quote',
        buttons: []
    };

    var productId = "";
    var quoteModal = modal(options, $('.cc-request-quote-popup'));
    var quoteForm  = quoteModal._getElem('.cc-request-quote-form');
    var quoteSuccessElem  = quoteModal._getElem('.cc-request-quote-success');
    var quoteWrapper  = quoteModal._getElem('.modal-inner-wrap');
    var closeModalTimeout;


    $('.cc-request-quote-btn').on('click', function () {
        productId = $(this).data('product-id');
        quoteForm.show();
        quoteSuccessElem.hide();
        quoteModal.openModal();
        quoteWrapper.removeClass('submitted');

        if (closeModalTimeout) {
            clearTimeout(closeModalTimeout);
        }
    });

    $('.cc-request-quote-form').on('submit', function (event) {
        event.preventDefault();
        if ($(this).validation() && $(this).validation('isValid')) {
            var formData = $(this).serialize();
            formData += '&product_id=' + productId;

            $.ajax({
                url: urlBuilder.build('requestquote/index/add'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                showLoader: true,
                success: function (response) {
                    if (response.success) {
                        quoteForm.hide();
                        quoteWrapper.addClass('submitted');
                        quoteSuccessElem.html(response.html).show();
                        closeModalTimeout = setTimeout(function () {
                            quoteModal.closeModal();
                        }, 5000);
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred while submitting your request.');
                }
            });
        }
    });

    // Handle modal close manually to clear timeout
    $('.cc-request-quote-popup').on('modalClose', function () {
        alert("hello");
        if (closeModalTimeout) {
            clearTimeout(closeModalTimeout);
        }
    });
});
