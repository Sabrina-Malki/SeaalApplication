<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$new = htmlspecialchars($_POST["newServ"]);
$req = $db->prepare("UPDATE service SET Designation = :new WHERE Designation = :old");
$req->execute(array(
    "new"=>$new,
    "old"=>$_POST["oldServ"]
));

$req = $db->prepare("UPDATE compte SET Nom = :new WHERE Nom = :old");
$req->execute(array(
    "new"=>$new,
    "old"=>$_POST["oldServ"]
));


$req->closeCursor();
echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('interfaceDG.php');