$(document).ready(function(){

    function slideToTop(currentImageId)
    {
        
        var currentImageId = parseInt($('.slider-show img').attr('id'));

        if(currentImageId === 1)
        {
            $('.slider-show img').attr('src',$('#4').attr('src'));
            $('.slider-show img').attr('id',4);
        }
        else{
            $('.slider-show img').attr('src',$('#'+ (currentImageId - 1)).attr('src'));
            $('.slider-show img').attr('id',(currentImageId - 1));
        }  
        var newcurrentImageId = parseInt($('.slider-show img').attr('id'));
        $('.slider-nav img').removeClass('slide-active');
        $('.image' + newcurrentImageId).addClass('slide-active');
        
    }

    function slideToBottom(currentImageId)
    {    
        
        var currentImageId = parseInt($('.slider-show img').attr('id'));

        if(currentImageId === 4)
        {
            $('.slider-show img').attr('src',$('#1').attr('src'));
            $('.slider-show img').attr('id',1);
        }
        else{
            $('.slider-show img').attr('src',$('#'+ (currentImageId + 1)).attr('src'));
            $('.slider-show img').attr('id',(currentImageId + 1));
        } 

        var newcurrentImageId = parseInt($('.slider-show img').attr('id'));
        $('.slider-nav img').removeClass('slide-active');
        $('.image' + newcurrentImageId).addClass('slide-active');

    }

    $('.prev-arrow').click(function(e){

        $('.slider-show').fadeOut(300);

        setTimeout(slideToTop,300);

        $('.slider-show').fadeIn(300);
        


    });

    $('.next-arrow').click(function(e){

        $('.slider-show').fadeOut(300);

        setTimeout(slideToBottom,300);
        
        $('.slider-show').fadeIn(300);   


    });

});
