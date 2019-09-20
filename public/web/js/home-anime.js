$(document).ready(function(){

    $(window).scroll(function(){
        var currentHeight = $(window).scroll(function(){}).scrollTop();

        if (window.matchMedia("(min-width: 1300px)").matches) {


        //HEADER 
        
        $('.hashtag-bbb').css({'transform':'translateX('+ currentHeight * 0.9 +'px)','opacity': 1 - 0.003 * currentHeight});

        $('.text-header p').css({'transform':'translateY(-'+ currentHeight * 0.3 +'px)','opacity': 1 - 0.004 * currentHeight});

        $('header').css('background-size',100 + currentHeight*0.1 +'% auto');



        //TITLES

        if(!((currentHeight * 0.7 - 400 ) >= 0) ){
                $('#ancre1').css({'transform':'translateX('+ (currentHeight * 0.7 - 400 ) + 'px)','opacity': 0.002 * currentHeight});
        }
        else{
                $('#ancre1').css({'transform':'translateX(0px)','opacity': '1'});
        }

        if(!((currentHeight * 0.7 - 900 ) >= 0) ){
                $('#ancre2').css({'transform':'translateX('+ (currentHeight * 0.7 - 900 ) + 'px)','opacity': 0.0005 * currentHeight});
        }
        else{
                $('#ancre2').css({'transform':'translateX(0px)','opacity': '1'});
        }

        if(!((currentHeight * 0.7 - 1600 ) >= 0) ){
                $('#ancre3').css({'transform':'translateX('+ (currentHeight * 0.7 - 1600 ) + 'px)','opacity': 0.0002 * currentHeight});
        }
        else{
                $('#ancre3').css({'transform':'translateX(0px)','opacity': '1'});
        }

        //ARTICLES

        
        if(((160 - currentHeight * 0.2) > 0) ){
                $('.product-description-bold').css({'transform':'translateX(-'+ (160 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.00112});
        }
        else{
                $('.product-description-bold').css({'transform':'translateY(0px)','opacity': '1'});
        }

        if(((180 - currentHeight * 0.2) > 0) ){
                $('.product-description-light').css({'transform':'translateX('+ (180 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0005});
        }
        else{
                $('.product-description-light').css({'transform':'translateY(0px)','opacity': '1'});
        }

        //READ MORE BUTTON

        if(((160 - currentHeight * 0.2) > 0) ){
                $('.see-more-products').css({'opacity': currentHeight * 0.0004});
        }
        else{
                $('.see-more-products').css({'opacity': '1'});
        }

        //IMAGES

        if(((200 - currentHeight * 0.2) > 0) ){
                $('.product-element-image').css({'transform':'translateY('+ (200 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.00112});
        }
        else{
                $('.product-element-image').css({'transform':'translateY(0px)','opacity': '1'});
        }

        if(((325 - currentHeight * 0.2) > 0) ){
                $('.offer-element-image').css({'transform':'translateY('+ (325 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0005});
        }
        else{
                $('.offer-element-image').css({'transform':'translateY(0px)','opacity': '1'});
        }

 
        
        //ELEMENTS TITLE


        if(((200 - currentHeight * 0.2) > 0) ){
                $('.product-element-title').css({'transform':'translateX(-'+ (200 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0005});
        }
        else{
                $('.product-element-title').css({'transform':'translateX(0px)','opacity': '1'});
        }

        if(((350 - currentHeight * 0.2) > 0) ){
                $('.offer-element-title').css({'transform':'translateX(-'+ (350 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0003});
        }
        else{
                $('.offer-element-title').css({'transform':'translateX(0px)','opacity': '1'});
        }

        //ELEMENTS PRICE


        if(((200 - currentHeight * 0.2) > 0) ){
                $('.product-element-price').css({'transform':'translateX('+ (200 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0005});
        }
        else{
                $('.product-element-price').css({'transform':'translateX(0px)','opacity': '1'});
        }

        if(((350 - currentHeight * 0.2) > 0) ){
                $('.offer-element-price').css({'transform':'translateX('+ (350 - currentHeight * 0.2) +'px)','opacity': currentHeight * 0.0003});
        }
        else{
                $('.offer-element-price').css({'transform':'translateX(0px)','opacity': '1'});
        }

        var footerHeight = $('.footer-div').scroll(function(){}).scrollTop();
    
        if(currentHeight > 2406){
            $('.nav-arrow img').css('transform','rotate(180deg)');
            $('.nav-arrow').addClass('top-scroll');
        }

        else{
                $('.nav-arrow img').css('transform','rotate(0)');
                $('.nav-arrow').removeClass('top-scroll');
            }

        }

    });

});