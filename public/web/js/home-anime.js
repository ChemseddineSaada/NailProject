$(document).ready(function(){

    $(window).scroll(function(){
        var currentHeight = $(window).scroll(function(){}).scrollTop();

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

        if(!((currentHeight * 0.7 - 1700 ) >= 0) ){
                $('#ancre3').css({'transform':'translateX('+ (currentHeight * 0.7 - 1700 ) + 'px)','opacity': 0.0002 * currentHeight});
        }
        else{
                $('#ancre3').css({'transform':'translateX(0px)','opacity': '1'});
        }

        

    });

});