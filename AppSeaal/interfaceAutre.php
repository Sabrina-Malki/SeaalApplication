
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
    <title>Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/seaal.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="angular/angular.min.js">
    <link rel="stylesheet" type="text/css" href="angular/angular.js">
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
    <!--===============================================================================================-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        function Rep_v() {

            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');
            if (act_v.style.display === "block") {
                act_v.style.display = "none";}
            if (act_nv.style.display === "block") {
                act_nv.style.display = "none";}
            if (rep_nv.style.display === "block") {
                rep_nv.style.display = "none";}

            if (rep_sr.style.display === "block") {
                rep_sr.style.display = "none";}

            rep_v.style.display = "block"; rec.style.display = "none";
        }
        function Rep_sr(){
            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');
            if (act_v.style.display === "block") {
                act_v.style.display = "none";}
            if (act_nv.style.display === "block") {
                act_nv.style.display = "none";}
            if (rep_v.style.display === "block") {
                rep_v.style.display = "none";}
            if (rep_nv.style.display === "block") {
                rep_nv.style.display = "none";}


            rep_sr.style.display = "block"; rec.style.display = "none";
        }
        function Rep_nv(){
            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');
            if (act_v.style.display === "block") {
                act_v.style.display = "none";}
            if (act_nv.style.display === "block") {
                act_nv.style.display = "none";}
            if (rep_sr.style.display === "block") {
                rep_sr.style.display = "none";}
            if (rep_v.style.display === "block") {
                rep_v.style.display = "none";}


            rep_nv.style.display = "block"; rec.style.display = "none";
        }

        function Rec() {
            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');
            if (act_v.style.display === "block") {
                act_v.style.display = "none";}
            if (act_nv.style.display === "block") {
                act_nv.style.display = "none";}
            if (rep_sr.style.display === "block") {
                rep_sr.style.display = "none";}
            if (rep_nv.style.display === "block") {
                rep_nv.style.display = "none";}

            if (rep_v.style.display === "block") {
                rep_v.style.display = "none";}

            rec.style.display = "block";
        }
        function Act_v(){
            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');

            if (act_nv.style.display === "block") {
                act_nv.style.display = "none";}
            if (rep_sr.style.display === "block") {
                rep_sr.style.display = "none";}
            if (rep_nv.style.display === "block") {
                rep_nv.style.display = "none";}
            if (rep_v.style.display === "block") {
                rep_v.style.display = "none";}

            act_v.style.display = "block"; rec.style.display = "none";
        }
        function Act_nv(){
            var rec = document.getElementById('rec');
            var rep_v = document.getElementById('rep_v');
            var rep_sr= document.getElementById('rep_sr');

            var rep_nv= document.getElementById('rep_nv');
            var act_nv= document.getElementById('act_nv');
            var act_v= document.getElementById('act_v');

            if (act_v.style.display === "block") {
                act_v.style.display = "none";}
            if (rep_sr.style.display === "block") {
                rep_sr.style.display = "none";}
            if (rep_nv.style.display === "block") {
                rep_nv.style.display = "none";}
            if (rep_v.style.display === "block") {
                rep_v.style.display = "none";}

            act_nv.style.display = "block"; rec.style.display = "none";
        }

    </script>

    <script type="text/javascript">

        function confSubmit(form) {
            if (confirm("Etes vous sûr de vouloir valider ces actions ?")) {
                form.submit();

            };
        }
    </script>
</head>
<body>

<div class="container-login100" style="background-image: url('images/Capture.png');">
    <div  class="container">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <div class="mail-box">
            <aside class="sm-side">
                <div class="user-head">
                    <a class="inbox-avatar" href="javascript:;">
                        <img  width="64" height="60" src="images/seaall.png">
                    </a>

                    <div class="user-name">
                        <h5><?php echo $_SESSION['nom']; ?>&nbsp;<?php echo $_SESSION['prenom']; ?>_<?php echo $_SESSION['service']; ?></h5>
                        <span><a href="https://outlook.live.com"><?php echo $_SESSION['adr']; ?></a></span>
                    </div>

                </div>

                <ul class="inbox-nav inbox-divider">
                    <li>
                        <a href="javascript:Rec();" ><i class="fa fa-inbox" ></i> Boite de réception</a>
                        <!--	<span class="label label-danger pull-right">2</span>-->
                    </li>
                    <li>
                        <a data-toggle="dropdown" href="#"  >
                            <i class="fa fa-envelope-o " ></i> Réponses</a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:Rep_v();"> Réponses validées </a></li>
                            <li><a href="javascript:Rep_nv();"> Réponses refusées </a></li>
                            <li><a href="javascript:Rep_sr();"> Courriers sans réponse </a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="dropdown" href="#"  >
                            <i class=" fa fa-flash " ></i> Actions</a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:Act_v();"> Actions réalisées </a></li>
                            <li><a href="javascript:Act_nv();"> Courriers sans action</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="deconnexion.php"><i class="glyphicon glyphicon-log-out" ></i> Déconnexion</a>
                    </li>
                </ul>
            </aside>
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Mails</h3>
                </div>
                <div id="rec" class="inbox-body">

                    <table class="table table-inbox table-hover" >
                        <tbody>
                        <?php
                        $req = $db ->prepare('SELECT IDCourrier,IDEmploye,Designation FROM `type` WHERE IDEmploye=:i');
                        $req->execute(array('i'=>$_SESSION['id_emp']));
                        while ($donnee0 = $req->fetch())
                        {   $req1 = $db ->prepare('SELECT ID,Expediteur,Objet,DateSaisie FROM courrier WHERE ID=:cc');
                            $req1->execute(array('cc'=>$donnee0['IDCourrier']));$donnee1 = $req1->fetch();
                            if($donnee0['Designation']=='Info'){
                            echo '<tr class="unread" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">
                                   <td></td>
                                    <td class="view-message  dont-show">'.$donnee1['Expediteur'].
                                    '<span class="label label-info pull-right">'.$donnee0['Designation'].'</span></td>
                                    <td class="view-message  ">Objet:'.$donnee1['Objet'].'</td>
                                    
                                    <td class="view-message  text-righ  ">Reçu le: '.$donnee1['DateSaisie'].'</td>
                                    </tr>
                                    ';}
                                    else{ echo '<tr class="unread" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">
                                   <td> </td>
                                    <td class="view-message  dont-show">'.$donnee1['Expediteur'].
                                        '<span class="label label-danger pull-right">'.$donnee0['Designation'].'</span></td>
                                    <td class="view-message  ">Objet:'.$donnee1['Objet'].'</td>
                                    
                                    <td class="view-message  text-righ  ">Reçu le: '.$donnee1['DateSaisie'].'</td>
                                    </tr>
                                    ';}

                            $req1->closeCursor();
                        }
                        $req->closeCursor();
                        ?>

                        </tbody>
                    </table>

                </div>
                <div id="rep_v" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'afficher_repValide.php'; ?></tbody>
                    </table>

                </div>
                <div id="rep_nv" class="inbox-body" style="display:none";>
                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'afficher_repNonValide.php'; ?></tbody>
                    </table>

                </div>
                <div id="rep_sr" class="inbox-body" style="display:none";>


                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'rep_sr.php'; ?></tbody>
                    </table>

                </div>
                <div id="act_v" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'ActionValide.php'; ?></tbody>
                    </table>

                </div>
                <div id="act_nv" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <form method="post" action="action_post.php">
                            <div class="form-row text-center">
                                <div class="col-12">
                                    <input type="button" value="Valider Action"  title="sélectionnez les actions que vous voulez valider"   class="btn btn-compose" onclick="confSubmit(this.form);">
                                </div>
                            </div>
                            <tbody>
                            <?php include 'ActionAtt.php'; ?>
                            </tbody>
                        </form>
                    </table>

                </div>
            </aside>
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
