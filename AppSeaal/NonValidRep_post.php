<?php
if(!isset($_SESSION))
{
    session_start();
}
//PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php' ;

/**********fonction d'envoi de mails à une personne*****/
function mailSend($data,$address)
{
    $mail = new PHPMailer(true);
    try{
        $mail->IsSMTP();
        $mail->AllowEmpty = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->SMTPAuth = true;
        $mail->Username = 'courrierseaal@gmail.com';
        $mail->Password = 'seaal2018';
        $mail->SMTPSecure = 'ssl';
        $mail->SetFrom('nimpqui@gmail.com',$data['Expediteur']);
        $mail->addAddress($address);
        $mail->IsHTML(true);
        $mail->Subject = 'RE : '.$data['Objet'];

        $mail->Body =$data['Commentaires'];

        return $mail->send();
    }
    catch (Exception $e)
    {
        echo 'Mailer Error '.$mail->ErrorInfo;
    }
}

try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

$valider =0;
$idRep = htmlspecialchars($_POST["id_r"]);  //
$comments = htmlspecialchars($_POST['comment_rf']); //
$idAut = $_SESSION['id_emp'];

 //Réponse refusée
    //MAJ BDD
    $req =$db->prepare("UPDATE reponse SET Commentaires=?,DateValidRep=NOW() WHERE ID = ?");
    $req->execute(array($comments,$idRep));

    //Envoi du courrier de refus au service
    $req = $db->prepare("SELECT IDCourrier,IDService FROM reponse WHERE ID = ?");
    $req->execute(array($idRep));
    $donnee = $req->fetch();

    $req = $db->prepare("SELECT Objet FROM Courrier WHERE ID = ?");
    $req->execute(array($donnee["IDCourrier"]));
    $donnee2 = $req->fetch();

    $req = $db->prepare("SELECT AdresseMail FROM employe WHERE IDService = ? AND IDCompte IS NOT NULL");
    $req->execute(array($donnee["IDService"]));
    $donnee3 = $req->fetch();

    $req = $db->prepare("SELECT Nom,Prenom FROM employe WHERE NSS = ?");
    $req->execute(array($idAut));
    $donnee4 = $req->fetch();

    echo 'je suis '.$donnee4["Nom"];


    $data["Commentaires"] = $comments;
    $data["Expediteur"] = $donnee4["Nom"].' '.$donnee4["Prenom"];
    $data["Objet"] = $donnee2["Objet"];
    $address = $donnee3["AdresseMail"];

    mailSend($data,$address);

$req->closeCursor();
echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<script type="text/javascript">' . 'window.close();' . '</script>';

include('interfaceDG.php');