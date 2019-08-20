<?php
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
        $mail->Subject = 'Rappel : '.$data['Objet'];
        $mail->Body =$data['Commentaires'].'<br/> La date limite de réponse sera atteinte dans 2 jours.';

        $mail->addAttachment($data['Chemin']);

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

$req = $db->query("SELECT ID,Expediteur,Objet,Commentaires,Chemin FROM courrier WHERE DateLimite - INTERVAL 2 day = CURDATE() ");

while ($data = $req->fetch())
{
    $data3["Expediteur"] = $data["Expediteur"];
    $data3["Objet"] = $data["Objet"];
    $data3["Chemin"] = $data["Chemin"];
    $data3["Commentaires"] = $data["Commentaires"];

    $req2 = $db->prepare("SELECT IDEmploye FROM `type` WHERE IDCourrier = ? AND Designation = 'Reponse' ");
    $req2->execute(array($data["ID"]));
    while ($data2 = $req2->fetch())
    {
        $req3 = $db->prepare("SELECT `AdresseMail` FROM employe WHERE NSS = ? ");
        $req3->execute(array($data2["IDEmploye"]));
        $address = $req3->fetch();
        mailSend($data3,$address["AdresseMail"]);

        $req3->closeCursor();
    }
    $req2->closeCursor();
}

$req->closeCursor();
