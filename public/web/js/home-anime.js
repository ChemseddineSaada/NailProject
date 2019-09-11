$(document).ready(function(){
    $('.parallax img').css('transform','translateY(100px)');
    $('.parallax p').css('transform',' translateY(50px)');
    $('.left-display h4').css('transform','translateX(-200px)');
    $('.right-display h4').css('transform','translateX(200px)');
    $('.title-right').css('transform','translateX(200px)');
    $('.title-left').css('transform','translateX(-200px)');
    $('.title-center').css('transform','translateX(-200px)');
    $('.home-subscription p').css('transform','translateX(200px)');
    $('.home-subscription h4').css('transform','translateX(-200px)');
  

    var parallaxNumber = $(".parallax").length;
    var parallaxParameters = [];

    for(let i = 0; i < parallaxNumber; i++){
   
        var imgOffset = $('.parallax'+i+' img').offset().top;

        var img ={
            targets: '.parallax'+i+' img',
            translateY: 0,
            opacity:1,
            duration: 300,
            easing: 'linear',
            };

        var price = {
            targets: '.parallax'+i+' p',
            translateY: 0,
            opacity:1,
            duration: 300,
            easing: 'linear',
            };

        if( i % 2 == 0){               

           var title = {
                targets: '.parallax'+i+' h4',
                translateX: 0,
                opacity:1,
                duration: 300,
                easing: 'linear',
                };
            }

        else{
            var title = {
                targets: '.parallax'+i+' h4',
                translateX: 0,
                opacity:1,
                duration: 300,
                easing: 'linear',
                };  
            }

        parallaxParameters[i] = {'img': img, 'price': price, 'title': title , 'imgOffset': imgOffset};
        let k = i;
        }       

        var subscriptions = $(".home-subscription").length;


        for(let i = 0; i < subscriptions; i++){
        
            var imgOffset = $('.home-subscription'+i+' img').offset().top;

            var title = {
                targets: '.home-subscription h4',
                translateX: 0,
                opacity:1,
                duration: 300,
                easing: 'linear'
                };
        
            var price = {
                targets: '.home-subscription p',
                translateX: 0,
                opacity:1,
                duration: 300,
                easing: 'linear'
                };

            parallaxParameters[ i + k ] = {'img': img, 'price': price, 'title': title , 'imgOffset': imgOffset};
        }
    
        var titleRight = {
            targets: '.title-right',
            translateX: 0,
            opacity:1,
            duration: 300,
            easing: 'linear'
            };  

        var imgOffset = $('.title-right').offset().top;
        parallaxParameters.push({'title': titleRight , 'imgOffset': imgOffset });

        var titleLeft = {
            targets: '.title-left',
            translateX: 0,
            opacity:1,
            duration: 300,
            easing: 'linear'
            }; 

        var imgOffset = $('.title-left').offset().top;
        parallaxParameters.push({'title': titleLeft , 'imgOffset': imgOffset});

        var titleCenter = {
            targets: '.title-center',
            translateX: 0,
            opacity:1,
            duration: 300,
            easing: 'linear'
            }; 

        var imgOffset = $('.title-center').offset().top;
        parallaxParameters.push({'title': titleCenter , 'imgOffset': imgOffset});

    function parallaxAnime(parallaxParameters,$w){
        parallaxParameters.forEach(element =>{
            if($w > element.imgOffset){

                anime(element.img);
                anime(element.title);
                anime(element.price);

            }
        });
    }
    
    
    $(window).scroll(function(){
        var currentHeight = $(window).scroll(function(){}).scrollTop();
        parallaxAnime(parallaxParameters,currentHeight + 400);
    });
});






