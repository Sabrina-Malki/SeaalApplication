<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$req = $db->prepare("SELECT Chemin FROM courrier WHERE ID = ?");
$req->execute(array($_GET["id"]));

$data = $req->fetch();

header('Content-Disposition: attachement; filename="'.basename($data["Chemin"]).'"');
readfile($data["Chemin"]);

$req->closeCursor();


