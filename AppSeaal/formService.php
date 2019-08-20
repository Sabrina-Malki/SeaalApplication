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
    <!------ Include the above in your HEAD tag ---------->

<body>

<div class="container" style="background-color: #5882FA">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">

                <div class="panel-body">
                    <div class="table-responsive">
                        <form method="post" action="formService_post.php" >
                            <h3 class="text-center"  id="listes_services">Liste des services</h3>
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <tr>
                                    <th>Nom & Prenom</th>
                                    <th>P/Info</th>
                                    <th>P/Action</th>
                                    <th>P/Réponse</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Assistantes DG</td>
                                    <td><input class="form-check-input" type="radio" name="groupe0" value="i0"></td>
                                    <td><input class="form-check-input" type="radio" name="groupe0" value="a1"></td>
                                    <td><input class="form-check-input" type="radio" name="groupe0" value="r2"></td>
                                </tr>
                                <tr>
                                    <td>CDG</td>
                                    <td><input class="form-check-input" type="radio" name="groupe1" value="i3"></td>
                                    <td><input class="form-check-input" type="radio" name="groupe1" value="a4"></td>
                                    <td><input class="form-check-input" type="radio" name="groupe1" value="r5"></td>
                                </tr>
                                <?php
                                try
                                {
                                    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                }
                                catch (Exception $e)
                                {
                                    die('Erreur '.$e->getMessage());
                                }

                                $i=2;$j=2;
                                $req = $db ->query('SELECT Nom,Prenom FROM employe WHERE IDCompte IS NOT NULL ORDER BY Nom ASC');

                                while ($donnee1 = $req->fetch())
                                {
                                    echo ' <tr>
                                    <td>'.$donnee1['Nom'].' '.$donnee1['Prenom'].'</td>
                                     <td><input class="form-check-input" type="radio" name="groupe'.$i.'" value="i'.$j.'" </td>';
                                    $j++;
                                    echo '<td><input class="form-check-input" type="radio" name="groupe'.$i.'" value="a'.$j.'\" </td>';
                                    $j++;
                                    echo '<td><input class="form-check-input" type="radio" name="groupe'.$i.'"  value="r'.$j.'" </td>';
                                    $i++;$j++;
                                }

                                $req->closeCursor();
                                ?>
                                </tbody>
                            </table>
                            <br/>
                            <div class="form-group">
                                <label for="destinataire">Commentaire (facultatif) :</label>
                                <textarea id="comments" name="comments" class="form-control" rows="5"></textarea>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="dateR"> Date limite de réponse (facultatif) : </label>
                                <input type="date" name="dateR" id="dateR" class="form-control form-control-lg"> <br/> <br/>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-send"></span> Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>