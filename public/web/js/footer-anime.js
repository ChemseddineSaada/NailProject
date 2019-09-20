$(document).ready(function(){

    $('.footer-div').css('opacity',0);
        $(window).scroll(function(footerHeight){

            var footerHeight = $(".footer-div").offset().top;
            var currentHeight = $(window).scroll(function(){}).scrollTop();

            if (window.matchMedia("(max-width: 1201px)").matches) {

                $('.footer-div').css('opacity',1);
              } 
              else{
                if(currentHeight + 400 > footerHeight){
                    anime({
                        targets: '.footer-div',
                        opacity: 1,
                        duration: 400,
                        easing: 'linear'
                        });
                    
                }
              }

    });
});