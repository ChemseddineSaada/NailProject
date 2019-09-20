$(document).ready(function() {

    $('.add-to-cart-btn').on('click', function() {

 /*        var productId = $(this).attr('product-id');

        req = $.ajax({
            url : '{{path("purchase.cart.add")}}',
            type : 'POST',
            data : {id : productId}
        });

        req.done(function(data) {
            
            $('#memberNumber'+member_id).text(data.member_num);

        }); */
    
        var currentCart = $('.cart-number').attr('data-quantity');
        $('.cart-number').text(currentCart++);
        $('.cart-number').attr('data-quantity',currentCart++);


    });

});