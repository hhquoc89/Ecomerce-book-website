$(document).ready(function(){

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({

        loop:true,
        dots: true,
        items: 1,
        autoplay:true,
        autoplayTimeout:4000,


    });
    //top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }

    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })
    // new books owl carousel
    $("#new-books .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }

    });
    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            }

        }

    });


    function calculateSubtotal(){
        let subTotal = 0;

        $('.float-price').each(function(index, input){
           subTotal +=  parseFloat(input.value);
        });

        let deal_price =$("#deal-price");
        deal_price.html(subTotal.toFixed(2));
    }

    // product qty section
    let qty_up=$(".qty .qty-up");
    let qty_down=$(".qty .qty-down");
    let deal_price =$("#deal-price");
    // let input=$(".qty .qty-input");
    //click on qty up button
    qty_up.on('click',function(e){
        let item_id = $(this).data('id')
        //let input = $('.qty_input[data-id="${item_id}"]');

        let input = $(`.qty_input[data-id="${item_id}"]`);
        let price = $(`.product_price[data-id="${item_id}"]`);
        let floatPrice = $(`.float-price[data-id="${item_id}"]`);

    //change product price using ajax call
    $.ajax({
        url:"template/ajax.php",
        type: 'post',
        data:
            {
                itemid: $(this).data("id")
            },
        success: function (result){
            let obj = JSON.parse(result);

            let item_price = parseFloat(obj[0]['item_price']);

                if(input.val() >= 1 && input.val() <= 9)
                {
                    input.val(function(i, old_val){
                        return ++old_val;
                    });
                }
                // increase price of the product
                price.text(parseFloat(item_price * parseFloat(input.val())).toFixed(2));
                floatPrice.val(item_price * parseFloat(input.val()));
                // set subtotal price
                let subtotal = parseFloat(deal_price.text()) + parseFloat(item_price);
                //deal_price.text(subtotal.toFixed(2));
                calculateSubtotal();
        }
    }); // closing ajax request



    });
    qty_down.on('click',function(e){
        let item_id = $(this).data('id')
        //let input = $('.qty_input[data-id="${item_id}"]');

        let input = $(`.qty_input[data-id="${item_id}"]`);
        let price = $(`.product_price[data-id="${item_id}"]`);
        let floatPrice = $(`.float-price[data-id="${item_id}"]`);

        //change product price using ajax call
        $.ajax({
            url:"template/ajax.php",
            type: 'post',
            data:
                {
                    itemid: $(this).data("id")
                },
            success: function (result){
                let obj = JSON.parse(result);

                let item_price = parseFloat(obj[0]['item_price']);

                if(input.val() > 1 && input.val() <= 10)
                {

                    input.val(function(i, old_val){
                        return --old_val;
                    });
                }
                // increase price of the product
                price.text(parseFloat(item_price * parseFloat(input.val())).toFixed(2));
                floatPrice.val(item_price * parseFloat(input.val()));
                // set subtotal price
                let subtotal = parseFloat(deal_price.text()) + parseFloat(item_price);
                //deal_price.text(subtotal.toFixed(2));
                calculateSubtotal();
            }
        }); // closing ajax request


});
});


