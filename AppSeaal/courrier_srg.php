
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
    <title>Courrier sans réponse</title>
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
$req0 = $db->prepare("SELECT Objet,Expediteur,DateArrive,Commentaires,DateSaisie,IDTypologie,Chemin,IDAuteur,DateLimite FROM courrier WHERE ID = ? ");
$req0->execute(array($_GET["id"]));
$donnee = $req0->fetch();
$req3 = $db->prepare("SELECT Designation FROM typologie WHERE ID = ? ");
$req3->execute(array($donnee["IDTypologie"]));
$donnee3 = $req3->fetch();
$req1 = $db->prepare("SELECT IDEmploye,Designation FROM `type` WHERE IDCourrier = ? ");
$req1->execute(array($_GET["id"]));
$emp=0;
while ($donnee1 = $req1->fetch())
{
    $req2 = $db->prepare("SELECT IDService FROM employe WHERE NSS = ? ");
    $req2->execute(array($donnee1["IDEmploye"]));
    $donnee2 = $req2->fetch();
    $req = $db->prepare("SELECT ID,Designation FROM service WHERE ID = ? ");
    $req->execute(array($donnee2["IDService"]));
    $donnee3 = $req->fetch();
    $temp_s[$emp]=$donnee3["Designation"];
    $temp_d[$emp]=$donnee1["Designation"];
    $emp++;
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-lg-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Information sur le courrier</div>
            <div class="panel-body">
                <div class="form-group validate-input">
                    <label for="dateA">Objet:</label>
                    <input  style="border:none;background-color:transparent;" value="<?php echo $donnee["Objet"] ?>" READONLY>
                </div>
                <div class="form-group validate-input">
                    <label for="exp">Expéditeur :</label>
                    <input style="border:none;background-color:transparent;" id="exp" name="exp" value="<?php echo $donnee["Expediteur"] ?>" READONLY>
                    <span id="error_name" class="text-danger"></span>
                </div>
                <div class="form-group validate-input">
                    <label for="exp">Typologie :</label>
                    <input style="border:none;background-color:transparent;" id="exp" name="exp" value="<?php echo $donnee3["Designation"] ?>" READONLY>
                    <span id="error_name" class="text-danger"></span>
                </div>

                <div class="form-group validate-input">
                    <label for="exp">Date d'arrivée:</label>
                    <input  id="exp" name="exp" style="border:none;background-color:transparent;" value="<?php $date1 = new DateTime($donnee["DateArrive"]); echo $date1->format('d-m-Y'); ?>" READONLY>
                    <span id="error_name" class="text-danger"></span>
                </div>
                <div class="form-group validate-input">
                    <label for="exp">Date d'envoie :</label>
                    <input  id="exp" name="exp" style="border:none;background-color:transparent;" value="<?php $date1 = new DateTime($donnee["DateSaisie"]); echo $date1->format('d-m-Y H:i:s'); ?>" READONLY>
                    <span id="error_name" class="text-danger"></span>
                </div>

                <div class="form-group validate-input">
                    <label for="obj">Commentaire:</label>
                    <textarea id="reponse" name="reponse"  class="form-control" placeholder="Aucun commentaire " rows="5" readonly><?php echo $donnee["Commentaires"] ?></textarea>
                    <span id="error_obj" class="text-danger"></span>
                </div>
                <div class="form-group validate-input">
                    <label for="dateA">Le lien du courrier: <a href="pieceJointe.php?id=<?php echo $_GET["id"]?>"><?php echo basename($donnee["Chemin"]) ?><span class="glyphicon glyphicon-download-alt"></span></a></label>
                    <span id="error_dob" class="text-danger"></span>
                </div>
                <div class="form-group validate-input">
                    <label for="exp">Date limite de la réponse :</label>
                    <input  id="exp" name="exp" style="border:none;background-color:transparent;" value="<?php $date3 = new DateTime($donnee["DateArrive"]); echo $date3->format('d-m-Y'); ?>" READONLY>
                    <span id="error_name" class="text-danger"></span>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>