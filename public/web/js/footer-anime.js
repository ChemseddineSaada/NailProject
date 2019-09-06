$("section a, ul a").click(function(){

    anime({
        targets: 'footer',
        opacity:0,
        duration: 300,
        easing: 'linear'
        });

});