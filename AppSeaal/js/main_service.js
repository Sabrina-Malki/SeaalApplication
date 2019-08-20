jQuery(document).ready(function(){


    // Show password Button
    $("#afficher").on('click', function(){

        var pass = $("#mdp");
        var fieldtype = pass.attr('type');

        if (fieldtype == 'password') {
            pass.attr('type', 'text');
            $(this).text("Cacher mot de passe");
        }else{
            pass.attr('type', 'password');
            $(this).text("Afficher mot de passe");
        }

    });





});