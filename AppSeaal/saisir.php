<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulaire Courrier</title>
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
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Saisie courrier
                </div>
                <div class="panel-body">
                    <form name="myform" method="post" action="saisieCourrier_post.php" enctype="multipart/form-data">
                        <div class="form-group validate-input">
                            <label for="dateA">Date d'Arrivée :*</label>
                            <input type="date" name="dateA" id="dateA" class="form-control form-control-lg">
                            <span id="error_dob" class="text-danger"></span>
                        </div>
                        <div class="form-group validate-input">
                            <label for="exp">Expéditeur :*</label>
                            <input id="exp" name="exp" class="form-control" type="text" data-validation="required" placeholder="saisir l'expéditeur du courrier ">
                            <span id="error_name" class="text-danger"></span>
                        </div>
                        <div class="form-group validate-input">
                            <label for="obj">Objet :*</label>
                            <input id="obj" name="obj" class="form-control" type="text" data-validation="email" placeholder="saisir l'objet du courrier ">
                            <span id="error_obj" class="text-danger"></span>
                        </div>
                        <div class="form-group validate-input">
                            <label for="typo">Typologie :</label>
                            <select name="typologie" id="typo" class="form-control" >
                                <?php
                                try
                                {
                                    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                }
                                catch (Exception $e)
                                {
                                    die('Erreur '.$e->getMessage());
                                }

                                $req =  $db->query('SELECT Designation FROM typologie');

                                while ($donnees = $req->fetch())
                                {
                                    echo '<option value='.$donnees['Designation'].'>'.$donnees['Designation'].'</option>';
                                }

                                $req->closeCursor();

                                ?>

                            </select>
                            <span id="error_gender" class="text-danger"></span>
                        </div>

                        <div class="form-group validate-input">
                            <label for="fich">Sélectionner le courrier à importer: *</label>
                            <input id="fich" name="file1" class="form-control-file" type="file">
                            <span id="error_name" class="text-danger"></span>
                        </div>

                        <!--<div class="form-group">
                            <label for="disc">Discription</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>-->
                        <div class="form-check validate-input">
                            <input class="form-check-input" type="radio" name="groupe" id="dg" checked value="dg">
                            <label class="form-check-label" for="dg">
                                Envoyer au directeur général seulement
                            </label>
                        </div>
                        <div class="form-check validate-input">
                            <input class="form-check-input" type="radio" name="groupe" id="autre" value="autre" >
                            <label class="form-check-label" for="autre">
                                Envoyer à un autre (ou plusieurs autres) service(s)
                            </label>
                        </div>
                        &nbsp;
                        &nbsp;
                        <button id="submit" type="submit" value="submit" class="btn btn-primary center" onclick="confSubmit(this.form);" >Valider</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>