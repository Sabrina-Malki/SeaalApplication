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


    function confSubmit_Supp(form) {
        function validatePassword();
        if (confirm("Etes vous sûr de vouloir sauvgarder ces modifications??")) {
            form.submit();

        };
    }


</script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form method="post" action="">
                <label for="emp">Sélectionner un employé à modifier :</label>
                <select name="employe" id="employe" class="form-control">
                    <?php
                    $req9 = $db->query("SELECT NSS,Nom,Prenom FROM employe ORDER BY Nom ASC");

                    while ($donnees8 = $req9->fetch())
                    {
                        echo '<option value='.$donnees8['NSS'].'>'.$donnees8['Nom'].' '.$donnees8['Prenom'].'</option>';
                    }

                    $req9->closeCursor();

                    ?>
                </select>
                <br/>
                <button type="submit" class="btn btn-info" id="afficher" name="afficher">Afficher
                </button>
            </form>

            <?php

            //Affichage des informations d'un employé
            if (isset($_POST["employe"])) {
                $req = $db->prepare("SELECT NSS,Nom,Prenom,`AdresseMail`,IDService FROM employe WHERE NSS = ? ");
                $req->execute(array($_POST["employe"]));
                $donnee = $req->fetch();
                $req = $db->prepare("SELECT Designation FROM service WHERE ID = ?");
                $req->execute(array($donnee['IDService']));
                $donnee2 = $req->fetch();
                ?>
                <form method="post" action="adminModif_post.php">
                    <div class="form-group">
                        <label for="NSS">NSS:</label>
                        <input type="text" class="form-control" id="nss_md" name="nss_md"
                               value="<?php echo $donnee["NSS"] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="NVNSS">Nouveau NSS:</label>
                        <input type="text" class="form-control" id="nvnss_md" name="nvnss_md" value="<?php echo $donnee["NSS"] ?>"
                               placeholder="Entrez le NSS de l'employé" >
                    </div>
                    <div class="form-group">
                        <label for="NOM">Nom:</label>
                        <input type="text" class="form-control" id="nom_md" name="nom_md"
                               placeholder="Entrez le nom de l'employé" value="<?php echo $donnee["Nom"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="PRENOM">Prénom :</label>
                        <input type="text" class="form-control" id="prenom_md" name="prenom_md"
                               placeholder="Entrez le prénom de l'employé" value="<?php echo $donnee["Prenom"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="ADR">Adresse Mail :</label>
                        <input type="email" class="form-control" id="mail_md" name="mail_md" aria-describedby="emailHelp"
                               placeholder="Entrez l'adresse mail de l'employé"
                               value="<?php echo $donnee["AdresseMail"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="service">Service :</label>
                        <input type="text" class="form-control" id="serv" name="serv"
                               value="<?php echo $donnee2["Designation"] ?>" readonly>
                        <br/>
                        <select name="service_md" id="service_md" class="form-control">
                            <?php

                            $req = $db->query('SELECT Designation FROM service');

                            while ($donnees = $req->fetch()) {
                                echo '<option value=' . $donnees['Designation'] . '>' . $donnees['Designation'] . '</option>';
                            }

                            $req->closeCursor();

                            ?>

                        </select>
                    </div>
                    <div class="form-check">

                        <button type="submit" class="btn btn-primary" id="valide" name="valide"
                                onclick="confSubmit_Supp(this.form);">Modifier
                        </button>
                    </div>

                </form>
                <?php
                $req->closeCursor();
            }
            ?>
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

