<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$nss = htmlspecialchars($_POST["nss_md"]);
$nvnss = htmlspecialchars($_POST["nvnss_md"]);
$nom = htmlspecialchars($_POST["nom_md"]);
$prenom = htmlspecialchars($_POST["prenom_md"]);
$mail = htmlspecialchars($_POST["mail_md"]);

$req = $db->prepare("SELECT ID FROM service WHERE Designation = ?");
$req->execute(array($_POST["service_md"]));
$ser = $req->fetch();


$req = $db->prepare("UPDATE employe SET NSS=:n,Nom=:nom,Prenom=:prenom,`AdresseMail`=:mail,IDService = :idser WHERE NSS = :nss");
$req->execute(array(
    'n'=>$nvnss,
    'nom'=>$nom,
    'prenom'=>$prenom,
    'mail'=>$mail,
    'idser'=>$ser['ID'],
    'nss'=>$nss,
));


$req->closeCursor();

echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('interfaceDG.php');
