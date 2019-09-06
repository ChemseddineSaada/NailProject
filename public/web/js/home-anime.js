$("section a, ul a").click(function(){
    
    anime({
        targets: 'section img',
        translateY: 100,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });

    anime({
        targets: 'section p',
        translateY: 50,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });

    anime({
        targets: '.left-display h3',
        translateX: -200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });

    anime({
        targets: '.right-display h3',
        translateX: 200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });  

    anime({
        targets: '.title-right',
        translateX: 200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });  

    anime({
        targets: '.title-left',
        translateX: -200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        }); 

    anime({
        targets: '.title-center',
        translateX: -200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        }); 
    
    anime({
        targets: '.home-subscription h3',
        translateX: 200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });

    anime({
        targets: '.home-subscription p',
        translateX: -200,
        opacity:0,
        duration: 300,
        easing: 'linear'
        });


});

