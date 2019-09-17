jQuery(document).ready(function(){
    // Augmenter la valeur
    $('[data-quantity="plus"]').click(function(e){
        // ne pas recharger la page
        e.preventDefault();
        // Récupérer le nom de l'input
        fieldName = $(this).attr('data-field');
        // Récupérer la valeur
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        if (!isNaN(currentVal)) {

            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {

            $('input[name='+fieldName+']').val(0);
        }
    });

    $('[data-quantity="minus"]').click(function(e) {

        e.preventDefault();

        fieldName = $(this).attr('data-field');

        var currentVal = parseInt($('input[name='+fieldName+']').val());

        if (!isNaN(currentVal) && currentVal > 0) {

            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {

            $('input[name='+fieldName+']').val(0);
        }
    });
});

