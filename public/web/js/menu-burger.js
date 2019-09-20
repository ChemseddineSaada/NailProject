$(document).ready(function(){

    if (window.matchMedia("(max-width: 1050px)").matches) {
        $('.main-menu').attr('hidden','hidden'); 
        $('.mobile-menu').removeAttr('hidden');

        $('.burger').click(function(){

                
            if($('.burger').hasClass('closed')){
                $('.burger').removeClass('closed');
                $('.burger').removeClass('burger-margin');
                $('.user-item').removeAttr('hidden');
                $('.burger-btn').attr('src','/web/img/menu/burger-opened.svg');
                $('.navbar-mobile').removeAttr('hidden');
                $('.third-menu').css('background','rgba(255,255,255,0.7)');        
                $('.menu-logo img').attr('src','/web/img/menu/hashtag.png');
                $('.menu-logo img').css('width','155px');

            }
            else{
                $('.burger').addClass('closed');
                $('.burger').addClass('burger-margin');
                $('.user-item').attr('hidden','hidden');
                $('.burger-btn').attr('src','/web/img/menu/burger-closed.svg');
                $('.navbar-mobile').attr('hidden','hidden');
                $('.third-menu').css('background','');
                $('.menu-logo img').attr('src','/web/img/menu/logo.png');
                $('.menu-logo img').css('width','50px');
            }
        });

    }
});
