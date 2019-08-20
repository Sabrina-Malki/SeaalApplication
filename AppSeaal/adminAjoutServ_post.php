<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$nss = htmlspecialchars($_POST["nss"]);
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$mail = htmlspecialchars($_POST["mail"]);

$req = $db->prepare("INSERT INTO service(Designation) VALUES(?)");
$req->execute(array($_POST["serv"]));

$req = $db->prepare("INSERT INTO compte(Nom,`Mot de passe`) VALUES(?,?)");
$req->execute(array($_POST["serv"],$_POST["mdp"]));

$req = $db->query("SELECT ID from compte WHERE ID =(SELECT MAX(ID) FROM compte)");
$cpt = $req->fetch();

$req = $db->query("SELECT ID from service WHERE ID =(SELECT MAX(ID) FROM service)");
$ser = $req->fetch();

$req = $db->prepare("INSERT INTO employe(NSS,Nom,Prenom,AdresseMail,IDCompte,IDService) VALUES(:nss,:nom,:prenom,:mail,:idc,:ids)");
$req->execute(array(
    "nss"=> $nss,
    "nom"=> $nom,
    "prenom"=>$prenom,
    "mail"=>$mail,
    "idc"=>$cpt['ID'],
    "ids"=>$ser['ID'],
));

$req->closeCursor();
echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('interfaceDG.php');