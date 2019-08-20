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
    <title>AccueilDG</title>
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
    <!------ Include the above in your HEAD tag ---------->
    <script type="text/javascript" src="angular/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js"></script>
    <script type="text/javascript" src="angular/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">


        function confSubmit_MDF(form) {
            function validatePassword();
            if (confirm("Etes vous sûr de vouloir sauvgarder ces modiications?")) {
                form.submit();

            };
        }


    </script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form method="post" action="adminModifServ_post.php">
                <div class="form-group">
                    <label for="service">Sélectionner le service à modifer :</label>
                    <br/>
                    <select name="oldServ" id="oldServ" class="form-control">
                        <?php
                        $req = $db->query("SELECT Designation FROM Service ORDER BY Designation ASC");

                        while ($donnees = $req->fetch())
                        {
                            echo '<option value='.$donnees['Designation'].'>'.$donnees['Designation'].'</option>';
                        }

                        $req->closeCursor();

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="servi">Nouveau nom de service :</label>
                    <input type="text" class="form-control" id="newServ" name="newServ"  placeholder="Entrez la désignation de service">
                </div>
                <div class="form-check">

                    <button type="submit" class="btn btn-primary" id="modifer" name="modifer" onclick="confSubmit_MDF(this.form);">Modifier</button>
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

