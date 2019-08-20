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
        function Rep_gv(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            rep_gv.style.display = "block"; rec_g.style.display = "none";
        }
        function Rep_gsr(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}

            rep_gsr.style.display = "block"; rec_g.style.display = "none";
        }
        function Rep_gnv(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            rep_gnv.style.display = "block"; rec_g.style.display = "none";
        }
        function Rep_gatt(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            rep_gatt.style.display = "block"; rec_g.style.display = "none";
        }

        function Rec_g() {
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}

            rec_g.style.display = "block";
        }
        function Act_gv(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            act_gv.style.display = "block"; rec_g.style.display = "none";
        }
        function Act_gnv(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (suiv_g.style.display === "block") {
                suiv_g.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            act_gnv.style.display = "block"; rec_g.style.display = "none";
        }
        function Suiv_g(){
            var rec_g = document.getElementById('rec_g');
            var rep_gv = document.getElementById('rep_gv');
            var rep_gsr= document.getElementById('rep_gsr');
            var rep_gatt= document.getElementById('rep_gatt');
            var rep_gnv= document.getElementById('rep_gnv');
            var act_gnv= document.getElementById('act_gnv');
            var act_gv= document.getElementById('act_gv');
            var suiv_g= document.getElementById('suiv_g');

            if (act_gnv.style.display === "block") {
                act_gnv.style.display = "none";}
            if (rep_gatt.style.display === "block") {
                rep_gatt.style.display = "none";}
            if (act_gv.style.display === "block") {
                act_gv.style.display = "none";}
            if (rep_gnv.style.display === "block") {
                rep_gnv.style.display = "none";}
            if (rep_gv.style.display === "block") {
                rep_gv.style.display = "none";}
            if (rep_gsr.style.display === "block") {
                rep_gsr.style.display = "none";}

            suiv_g.style.display = "block"; rec_g.style.display = "none";}

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
                <div class="inbox-body">
                    <a href="saisir.php" data-toggle="modal"  title="Compose"   class="btn btn-compose" onclick="window.open(this.href, 'Popup', 'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400'); return false;">
                        Envoyer Courrier
                    </a>
                </div>
                <ul class="inbox-nav inbox-divider">
                    <li class="active">
                        <a href="javascript:Rec_g();"><i class="fa fa-inbox" ></i> Courriers Envoyés</a>
                        <!--	<span class="label label-danger pull-right">2</span>-->
                    </li>
                    <li>
                        <a data-toggle="dropdown" href="#"  >
                            <i class="fa fa-envelope-o " ></i> Réponses</a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:Rep_gv();"> Réponses validées </a></li>
                            <li><a href="javascript:Rep_gatt();"> Réponses en attente de validation</a></li>
                            <li><a href="javascript:Rep_gnv();"> Réponses refusées</a></li>
                            <li><a href="javascript:Rep_gsr();"> Courriers sans réponses</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="dropdown" href="#"  >
                            <i class=" fa fa-flash " ></i> Actions</a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:Act_gv();"> Actions traitées </a></li>
                            <li><a href="javascript:Act_gnv();"> Actions non traitées</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:Suiv_g();"><i class="fa fa-warning" ></i> Courriers à Suivre</a>

                    </li>
                    <li>
                        <a href="deconnexion.php"><i class="glyphicon glyphicon-log-out" ></i> Déconnexion</a>

                    </li>

                </ul>
                <div class="inbox-body text-center">

                    <div class="btn-group">
                        <a data-toggle="dropdown" title="Paramètre" href="#" class="btn btn-info" aria-expanded="false">Paramètre
                            <i class="fa fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="AdminAjouterServ.php" onclick="window.open(this.href, 'Popup', 'scrollbars=0,resizable=0,height=200,width=770,top=400,left=400'); return false;" > Ajouter Service</a></li>
                            <li><a href="adminModifServ.php" onclick="window.open(this.href, 'Popup', 'scrollbars=0,resizable=0,height=250,width=770,top=400,left=400'); return false;" > Modifier Service</a></li>
                            <li><a href="AdminModifEmp.php" onclick="window.open(this.href, 'Popup', 'scrollbars=0,resizable=0,height=660,width=770,top=400,left=400'); return false;"> Modifier Employé</a></li>
                        </ul>
                    </div>
                </div>

            </aside>
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Mails</h3>
                </div>
                <div id="rec_g" class="inbox-body">
                    <table class="table table-inbox table-hover" >
                        <tbody>
                        <?php include 'DG_courriers.php'; ?></tbody>
                    </table>

                </div>
                <div id="rep_gv" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include('DG_rep_v.php'); ?></tbody>
                    </table>

                </div>
                <div id="rep_gnv" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include ('DG_rep_nv.php'); ?></tbody>
                    </table>

                </div>
                <div id="rep_gatt" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'DG_rep_att.php'; ?></tbody>
                    </table>

                </div>
                <div id="rep_gsr" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'DG_rep_sr.php'; ?></tbody>
                    </table>

                </div>
                <div id="act_gv" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'DG_act_v.php'; ?></tbody>
                    </table>

                </div>
                <div id="act_gnv" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'DG_act_nv.php'; ?></tbody>
                    </table>

                </div>
                <div id="suiv_g" class="inbox-body" style="display:none";>

                    <table class="table table-inbox table-hover" >
                        <tbody><?php include 'DG_suivis.php'; ?></tbody>
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