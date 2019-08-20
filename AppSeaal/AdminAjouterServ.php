<?php
if(!isset($_SESSION))
{
    session_start();
}
try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contenu de courrier</title>
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
    <script type="text/javascript" src="js/main_saisir.js"></script>
    <script type="text/javascript" src="js/main_service.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main_saisir.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!--===============================================================================================-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">


        function confSubmit_Ajout(form) {
            function validatePassword();
            if (confirm("Etes vous sûr de vouloir sauvgarder ces informations?")) {
                form.submit();

            };
        }


    </script>

</head>
<body>

<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary">
                <form method="post" action="adminAjoutServ_post.php">
                <div class="panel-body">
                    <h4 style="color: #0062cc"><strong>Service :</strong></h4>
                    <div class="form-group validate-input">
                        <label for="service">Nom du nouveau service : </label>
                        <input type="text" class="form-control" id="serv" name="serv"  placeholder="Entrez la désignation de ce nouveau service">
                    </div>
                   </br>

                    <h4 style="color: #0062cc"><strong>Compte :</strong></h4>
                    <div class="form-group validate-input">
                        <label for="service">mot de passe du compte de service : </label>
                        <input type="password" class="form-control" id="mdp" name="mdp"  placeholder="Entrez le mot de passe de service">

                    </div>
                    </br>
                    <h4 style="color: #0062cc"><strong>Informations sur le directeur de service :</strong></h4>
                    <div class="form-group validate-input">
                        <label for="service">NSS : </label>
                        <input type="number" class="form-control" id="nss" name="nss"  placeholder="Entrez le nss du directeur">
                    </div>
                    <div class="form-group validate-input">
                        <label for="service">Nom : </label>
                        <input type="text" class="form-control" id="nom" name="nom"  placeholder="Entrez le nom du directeur">
                    </div>
                    <div class="form-group validate-input">
                        <label for="service">Prénom : </label>
                        <input type="text" class="form-control" id="prenom" name="prenom"  placeholder="Entrez le prénom du directeur">
                    </div>
                    <div class="form-group validate-input">
                        <label for="service">Adresse mail : </label>
                        <input type="email" class="form-control" id="mail" name="mail"  placeholder="Entrez l'adresse mail du directeur">
                    </div>
                    <div class="form-check">
                        <button type="submit" class="btn btn-primary" id="ajouter" name="ajouter" onclick="confSubmit_Ajout(this.form);">Ajouter</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>

