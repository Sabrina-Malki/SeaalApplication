<!DOCTYPE html>
<html lang="en">
<head>
    <title>Changer mot de passe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/seaal.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main_mdp.js"></script>
    <script type="text/javascript">

        var password = document.getElementById("newMdp")
            , confirm_password = document.getElementById("cnfnewMdp");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Les mots de passe ne correspondent pas");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

        function confSubmit(form) {
            function validatePassword();
            if (confirm("Etes vous sûr de vouloir enregistrer ces informations ?")) {
                form.submit();

            };
        }

    </script>
    <!--===============================================================================================-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form method="post" action="mdp_post.php">
                <div class="form-group">
                    <label for="service">Nom d'utilisateur :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="service" aria-describedby="emailHelp" placeholder="Entrez votre nom d'utilisateur">
                </div>
                <div class="form-group">
                    <label for="ancmdp">Ancien mot de passe</label>
                    <input type="password" class="form-control" name="oldMdp" id="oldMdp" placeholder="Entrez votre ancien mot de passe">
                </div>
                <div class="form-group">
                    <label for="nvMdp">Nouveau mot de passe</label>
                    <input type="password" class="form-control" name="newMdp" id="newMdp" placeholder="Entrez le nouveau mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="cnf nvMdp">Confirmation du nouveau mot de passe</label>
                    <input type="password" class="form-control" name="cnfnewMdp" id="cnfnewMdp" placeholder="Confirmer votre nouveau mot de passe" required>
                </div>
                <div class="form-check">
                    <button class="btn btn-info" type="button" name="showpassword" id="showpassword" value="Show Password">Afficher mot de passe</button>
                    <button type="submit" class="btn btn-primary" id="valider" name="valider" onclick="confSubmit(this.form);">Valider</button>
                </div>

            </form>

        </div>



    </div>
</div>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>