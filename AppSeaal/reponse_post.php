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

$idMail = htmlspecialchars($_POST['id_cr']);
$messageMail =  htmlspecialchars($_POST['reponse']);
$idService = $_SESSION['id_s'] ;

//MAJ de la BDD
$req = $db->prepare("INSERT INTO Reponse(TextRep,DateReponse,IDCourrier,IDService) VALUES(:text,NOW(),:idcour,:idser)");
$req->execute(array(
    'text' => $messageMail,
    'idcour' => $idMail,
    'idser' => $idService,
));

//Envoi du mail à la secretaire
$req = $db->prepare("SELECT Objet,IDAuteur FROM courrier WHERE ID = ?");
$req->execute(array($idMail));
$donnee = $req->fetch();

$req = $db->prepare("SELECT `AdresseMail`FROM employe WHERE IDCompte = ?");
$req->execute(array($donnee["IDAuteur"]));
$donnee2 = $req->fetch();

$req = $db->prepare("SELECT Designation FROM service WHERE ID = ?");
$req->execute(array($idService));
$ser = $req->fetch();


$data["Expediteur"] = $ser["Designation"];
$data["Objet"] = $donnee["Objet"];
$data["Commentaires"] = $messageMail;
$address = $donnee2['AdresseMail'];
mailSend($data,$address);


$req->closeCursor();
echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('interfaceAutre.php');