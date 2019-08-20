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

$valider =1;
$idRep = htmlspecialchars($_POST["id_r"]);  //TODO Recuperer ID réponse GET
$idAut = $_SESSION['id_emp']; 



    $req = $db->prepare("UPDATE reponse SET Valide=1,DateValidRep=NOW() WHERE ID = ?");
    $req->execute(array($idRep));



$req->closeCursor();
echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<script type="text/javascript">' . 'window.close();' . '</script>';
include('interfaceDG.php');