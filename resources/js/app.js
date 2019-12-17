require('./bootstrap');

/**
 * Import sweet alert
 */
require('sweetalert');

/**
 * Import turbolinks
 */
require('./bootstrap');
let Turbolinks = require('turbolinks');
Turbolinks.start();

/**
 * Import utilities
 */
import utils from './utils';

$(document).on('turbolinks:load',function() {

    /**
     * Event Quantity
     */
    $('.qty-control').change((e) => {
        const qty   = e.currentTarget.value;
        const id    = e.currentTarget.getAttribute('data-id');
        const price = e.currentTarget.getAttribute('data-price');
        const qtyEl = $('#qty-'+id);

        const total = qty * price;
        /* console.log(`id: ${id}`);
        console.log(`price: ${price}`);
        console.log(`qty: ${qty}`);
        console.log(`total: ${total}`);
        console.log(utils.rupiahToNum(qtyEl.text())); */
        qtyEl.text(utils.numToRupiah(total));

        utils.updateTotalCart();
    });

    /**
     * Open address field
     */
    $('#pickup').change((e) => {
        const total = utils.rupiahToNum($('.total').text());
        const shipping = 10000;
        if(e.currentTarget.checked){
            $('.address-field').removeClass('d-none');
            $('.shipping-text').removeClass('d-none');
            $('.total').text( utils.numToRupiah(total + shipping) );
        } else {
            $('.address-field').addClass('d-none');
            $('.shipping-text').addClass('d-none');
            $('.total').text( utils.numToRupiah(total - shipping) );
        }
    });

    /**
     * Place the order
     */
    $('#order').submit((e) => {
        e.preventDefault();
        utils.clearAlert();

        $.ajax({
            url: '/order/store',
            type: 'POST',
            dataType: 'json',
            data: $('#order').serialize(),
        })
        .done((res) => {
            if(res.errors){
                $.each(res.errors, function (field, msg) {
                    utils.pushAlert('danger', msg, 'alerts-order');
                });
            } else {
                Turbolinks.visit(`/invoice/${res.order.number}`)
            }
        })
        .fail((errs) => {
            console.log(errs);
        })
        .always(() => {
            console.log('Complete');
        });
    });

    /**
     * Prevent user to order
     */
    $(document).ready(() => {
        if($('.guest').length > 0){
            swal("Oops!", "Please login before trying to order our service.", "warning", {
                buttons: {
                login: "Login",
                register: "Don't have an account",
                },
                closeOnClickOutside: false
            }).then((value) => {
                switch (value) {
                case "login":
                    Turbolinks.visit('/login');
                    break;
                case "register":
                    Turbolinks.visit('/register');
                    break;
                default:
                    Turbolinks.visit('/login');
                }
            });
        }
    });

    /**
     * Contact
     */
    $('#form-contact').submit(function(e){
        e.preventDefault();

        if($('#email').val() == ''){
            swal('Oops', 'Email address cannot be empty', 'warning');
        } else if($('#phone_number').val() == ''){
            swal('Oops', 'Phone number cannot be empty', 'warning');
        } else if($('#name').val() == ''){
            swal('Oops', 'Name cannot be empty', 'warning');
        } else if($('#message').val() == ''){
            swal('Oops', 'Message cannot be empty', 'warning');
        } else {
            swal('Thank you', 'Your message has been received. We will assist your sortly.', 'success');
        }
        
    });


});