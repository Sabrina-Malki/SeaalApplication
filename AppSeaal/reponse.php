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
            if (confirm("Etes vous sûr de vouloir envoyer ces informations ?")) {
                form.submit();
            };
        }
    </script>
</head>
<body>
<?php
$req0 = $db->prepare("SELECT Objet FROM courrier WHERE ID = ? ");
$req0->execute(array($_GET["idc"]));
$donnee = $req0->fetch();
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Réponse</div>
            <div class="panel-body">
                <form name="myform" method="post" action="reponse_post.php">
                    <div class="form-group validate-input">
                        <label for="dateA">Envoyer A :</label>
                        <input type="text" name="sr" id="dateA" class="form-control form-control-lg" value="Service DG" readonly >
                        <span id="error_dob" class="text-danger"></span>
                    </div>
                    <div class="form-group validate-input">
                        <label for="exp">Objet de courrier :</label>
                        <input id="exp" name="exp" class="form-control" type="text" data-validation="required"  value="<?php echo $donnee["Objet"] ?>" readonly >
                        <span id="error_name" class="text-danger"></span>
                    </div>
                    <div class="form-group validate-input">
                        <label for="obj">Entrez votre réponse :*</label>
                        <textarea id="reponse" name="reponse"  class="form-control" rows="5"></textarea>
                        <span id="error_obj" class="text-danger"></span>
                    </div>
                    <input type="hidden" id="id_cr" name="id_cr" value="<?php echo $_GET["idc"] ?>">

                    &nbsp;
                    <button id="submit" type="submit" value="submit" class="btn btn-primary center"  >Envoyer<span class="glyphicon glyphicon-share-alt"></button>

                </form>

            </div>
        </div>
    </div>
</div>


</body>
</html>
