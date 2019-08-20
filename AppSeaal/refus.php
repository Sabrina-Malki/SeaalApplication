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
    <title>Réponse</title>
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
    <link rel="stylesheet" type="text/css" href="css/main_saisir.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <!--===============================================================================================-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">

        function confSubmit(form) {
            if (confirm("Etes vous sûr de vouloir envoyer ce commantaire ?")) {
                form.submit();
            };
        }
    </script>
</head>
<body>
<?php

$req0 = $db->prepare("SELECT IDService FROM reponse WHERE ID = ? ");
$req0->execute(array($_GET["idr"]));
$donnee0 = $req0->fetch();
$req1 = $db->prepare("SELECT Designation FROM service WHERE ID = ? ");
$req1->execute(array($donnee0["IDService"]));
$donnee1 = $req1->fetch();
$valide=0;
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Commentaire</div>
            <div class="panel-body">
                <form name="myform" method="post" action="NonValidRep_post.php">
                    <div class="form-group validate-input">
                        <label for="obj">Entrez un commentaire à envoyer au service <?php echo $donnee1["Designation"]?> :*</label>
                        <textarea id="comment_rf" name="comment_rf"  class="form-control" rows="5"></textarea>
                        <span id="error_obj" class="text-danger"></span>
                    </div>
                    <input type="hidden" id="id_r" name="id_r" value="<?php echo $_GET["idr"] ?>">

                    &nbsp;
                    <button id="submit" type="submit" value="submit" class="btn btn-primary center" onclick="confSubmit(this.form);"  >Envoyer<span class="glyphicon glyphicon-share-alt"></button>

                </form>

            </div>
        </div>
    </div>
</div>


</body>
</html>
