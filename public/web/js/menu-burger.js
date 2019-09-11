$('.burger').click(function(){
    if($('.burger').hasClass('closed')){

        $('.burger').removeClass('closed');
        $('.menu-list').show();
        anime({
            targets: '.menu-list',
            translateY: 0,
            translateX: 0,
            opacity:1,
            duration: 200,
            easing: 'linear'
            });

        anime({
            targets: '.menu-title',
            translateX: 0,
            duration : 300,
            easing: 'linear'
            });

        anime({
            targets: '.menu-devise',
            duration : 50,
            opacity: 0,
            easing: 'linear'
            });
        
            setTimeout(() => {
                $('.menu-devise').attr('hidden','hidden');
            }, 200);
    }

    else{

        $('.burger').addClass('closed');
        anime({
            targets: '.menu-list',
            translateY: 20,
            translateX: 5,
            opacity:0,
            duration: 200,
            easing: 'linear'
            });

            setTimeout(() => {
                $('.menu-list').hide();
            }, 200);
            
        anime({
            targets: '.menu-title',
            translateX: 700,
            duration : 300,
            easing: 'linear'
            });

        $('.menu-devise').removeAttr('hidden');
        $('.menu-devise').css('opacity',0);
        anime({
            targets: '.menu-devise',
            duration : 50,
            opacity: 1,
            easing: 'linear'
            });
        
    }
});