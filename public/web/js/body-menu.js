$(document).ready(function(){

    //Calcul du nombre d'élément dans le menu
    var menuElementNumber = $('.body-menu li').length;

    //Désactivation de tous les éléments lors du chargement
    for(let i = 1; i <= menuElementNumber ; i++){
        $('.to-display-'+i).hide();
    }

    //Activation du premier élément seul
    $('.to-display-1').show();

    //Afficher l'élément cliqué et cacher tous les autres éléments
    $('.body-menu li').click(function (e) { 

        //Désactiver l'actualisation de la page
        e.preventDefault();

        //Cacher tous les éléments
        for(let i = 1; i <= menuElementNumber ; i++){
            $('.to-display-'+i).hide();
            $('.body-menu li').removeClass('activated');
            $('.body-menu li').children().removeClass('activated');
        }
        

        //Afficher l'élément ciblé
        $('.'+$(e.target).attr('data-display')).show();
        $(e.target).addClass('activated');
        $(e.target).children().addClass('activated');

        if(!($(e.target).is('li'))){
            $(e.target).next().addClass('activated');
            $(e.target).prev().addClass('activated');
        }

        if($('.delivery').hasClass('activated')){
            $('.delivery').attr('src',"web/img/userpanel/delivery2.svg");
        }
        else{
            $('.delivery').attr('src',"web/img/userpanel/delivery1.svg");
        }

        
        if($('.map').hasClass('activated')){
            $('.map').attr('src',"web/img/userpanel/map2.svg");
        }
        else{
            $('.map').attr('src',"web/img/userpanel/map1.svg");
        }

        
        if($('.gear').hasClass('activated')){
            $('.gear').attr('src',"web/img/userpanel/gear2.svg");
        }
        else{
            $('.gear').attr('src',"web/img/userpanel/gear1.svg");
        }

    });

});