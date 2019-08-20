<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$ser = htmlspecialchars($_POST['service']);
$oldMdp = htmlspecialchars($_POST['oldMdp']);
$newMdp = htmlspecialchars($_POST['newMdp']);

$req = $db->prepare("SELECT * FROM compte WHERE Nom = ?");
$req->execute(array($ser));

if (!$req->rowCount()) {
    echo '<script type="text/javascript">' . 'alert("Ce compte n\'existe pas !");' . '</script>';
     include('Changer_mdp.php');
}
else
{
    $compte = $req->fetch();
    if ($oldMdp != $compte["Mot de passe"]) {
        echo '<script type="text/javascript">' . 'alert("Le mot de passe saisi est incorrect !");' . '</script>';
        include('Changer_mdp.php');
    }

    else {
        $req = $db->prepare("UPDATE compte SET `Mot de passe` = ? WHERE Nom = ?");
        $req->execute(array($newMdp,$ser));
        echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
       include('Changer_mdp.php');

    }
}



$req->closeCursor();
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('login.html');
