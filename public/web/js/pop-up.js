$(document).ready(function(){
    $('.btn-subscribe').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container').show();
    });

    

    $('.pop-up-closing').click(function (e) { 
        e.preventDefault();
        $('.pop-up-container').hide();
    });
});