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
    // product qty section
    let qty_up=$(".qty .qty-up");
    let qty_down=$(".qty .qty-down");
    // let input=$(".qty .qty-input");
    //click on qty up button


    qty_up.on('click',function(e){
        let input=$(`.qty-input[data-id="${$(this).data("id")}"]`);
        if(input.val() >= 1 && input.val() <= 9)
        {

            input.val(function(i, old_val){
                return ++old_val;
            });
        }
    });
    qty_down.on('click',function(e){
        let input=$(`.qty-input[data-id='${$(this).data("id")}']`);
        if(input.val() > 1 && input.val() <= 10)
        {

            input.val(function(i, old_val){
                return --old_val;
            });
        }
    });
});