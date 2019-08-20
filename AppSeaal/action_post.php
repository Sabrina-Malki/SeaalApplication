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

$req = $db ->prepare('SELECT IDCourrier FROM `type` WHERE IDEmploye=:i And Designation=:t');
$req->execute(array('i'=>$_SESSION['id_emp'],'t'=>"Action"));
$i = 0;

while ($donnee0 = $req->fetch())
{

    $req4 = $db->prepare('SELECT ID FROM `action` WHERE IDCourrier=:cc  ');
    $req4->execute(array('cc'=>$donnee0['IDCourrier']));
    $donnee4 = $req4->fetch();
    if (empty($donnee4))
    {
        $req5 = $db->prepare("SELECT IDService FROM employe WHERE NSS = ? ");
        $req5->execute(array($_SESSION['id_emp']));
        $donnee = $req5->fetch();
        $courr[$i]= $donnee0["IDCourrier"] ;
        $serv[$i]= $donnee["IDService"];
        $i++;
        $req5->closeCursor();
    }
    $req4->closeCursor();
}

$k=0;
for ($j=0; $j<$i; $j++)
{
    $l = 'case'.$k;
    if (isset($_POST[$l]))
    {
        $idMail = $courr[$k];
        $idService = $serv[$k];
        $req2 = $db->prepare("INSERT INTO `action`(IDCourrier,IDService,DateValidAction) VALUES(?,?,NOW())");
        $req2->execute(array($idMail,$idService));
        $req2->closeCursor();
    }
    $k++;
}





$req->closeCursor();
include('interfaceAutre.php');