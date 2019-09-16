$(document).ready(function(){
    
    $('.btn-pop-up-1').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container-1').show();
    });

    

    $('.pop-up-closing').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container-1').hide();
    });

    $('.btn-pop-up-2').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container-2').show();
    });

    

    $('.pop-up-closing').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container-2').hide();
    });
});