var linksNumber = $('.ancre').length;
var navParameters = [];

//Récupération des hauteurs des ancres
for(let i = 1; i <= linksNumber; i++){
    navParameters.push({id: '#ancre'+i , offset : $('#ancre'+i).offset().top - 200 })
}

//Cette fonction vérifie si la hauteur actuel du scroll est inférieur à celle de l'élement 
//et change l'attribut "Href" si c'est le cas pour appliquer l'ancre

$('.nav-arrow').click(function(){
    var currentHeight = $(window).scroll(function(){}).scrollTop();

        let j = 0;
        navParameters.forEach(element => {
            if(navParameters[ j - 1 ]){
                if( currentHeight > navParameters[ j - 1 ].offset && currentHeight < element.offset){
                    $('.nav-arrow').attr('href',element.id);
                    console.log('ok');
                }
            }
            else{
                if( currentHeight > element.offset - 700 && currentHeight < element.offset){
                    $('.nav-arrow').attr('href',element.id);
                    console.log('ok');
                }
            }

           j++;
        });

});