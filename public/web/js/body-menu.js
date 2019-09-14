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

    });

});