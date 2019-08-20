jQuery(document).ready(function(){


    // Show password Button
    $("#showpassword").on('click', function(){

        var pass = $("#newMdp");
        var pass2 = $("#oldMdp");
        var pass3 = $("#cnfnewMdp");
        var fieldtype = pass.attr('type');
        var fieldtype2 = pass2.attr('type');
        var fieldtype3 = pass3.attr('type');

        if (fieldtype == 'password') {
            pass.attr('type', 'text');
            $(this).text("Cacher mot de passe");
        }else{
            pass.attr('type', 'password');
            $(this).text("Afficher mot de passe");
        }
        if (fieldtype2 == 'password') {
            pass2.attr('type', 'text');
            $(this).text("Cacher mot de passe");
        }else{
            pass2.attr('type', 'password');
            $(this).text("Afficher mot de passe");
        }
        if (fieldtype3 == 'password') {
            pass3.attr('type', 'text');
            $(this).text("Cacher mot de passe");
        }else{
            pass3.attr('type', 'password');
            $(this).text("Afficher mot de passe");
        }


    });
    var password = document.getElementById("newMdp")
        , confirm_password = document.getElementById("cnfnewMdp");

    $("#valider").on('click', function(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
        } else {
            confirm_password.setCustomValidity('');
        }
    });

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;







});

