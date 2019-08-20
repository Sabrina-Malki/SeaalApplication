<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE>
<html>
<head>

</head>
<body>

<?php

//PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php' ;

/**********fonction d'envoi de mails à une personne*****/
function mailSend($data,$address,$designation)
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
        $mail->Subject = $data['Objet'].$designation;
        if ($designation == 'Reponse')
        {
            $mail->Body =$data['Commentaires'].'<br/> La date limite de réponse est : '.$data['DateLimite'];
        }
        else $mail->Body =$data['Commentaires'];

        $mail->addAttachment($data['Chemin']);

        return $mail->send();
    }
    catch (Exception $e)
    {
        echo 'Mailer Error '.$mail->ErrorInfo;
    }
}

if (empty($_POST['dateA']))
{
    echo '<script type="text/javascript">' . 'alert("Veuillez saisir la date d\'arrivée");' . '</script>';
    include("saisir.php");
}
else
{
    if (empty($_POST['exp']))
    {
        echo '<script type="text/javascript">' . 'alert("Veuillez saisir le nom de l\'expéditeur");' . '</script>';
        include("saisir.php");
    }
    else
    {
        if (empty($_POST['obj']))
        {
            echo '<script type="text/javascript">' . 'alert("Veuillez saisir l\'objet");' . '</script>';
            include("saisir.php");
        }
        else
        {
            if ($_FILES['file1']['error'] == UPLOAD_ERR_NO_FILE)
            {
                echo '<script type="text/javascript">' . 'alert("Veuillez importer le courrier");' . '</script>';
                include("saisir.php");

            }
            else {
                try
                {
                    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                    die('Erreur '.$e->getMessage());
                }
                $exp = htmlspecialchars($_POST['exp']);
                $obj = htmlspecialchars($_POST['obj']);

                $req2 = $db->prepare('SELECT ID FROM typologie WHERE Designation = ?');
                $req2->execute(array($_POST['typologie']));
                $typo = $req2->fetch();
                $req2->closeCursor();

                $fileName=$_FILES['file1']['name'];
                $target = 'files/';
                $fileTarget = $target.$fileName;
                $tempFileName = $_FILES['file1']['tmp_name'];
                $result = move_uploaded_file($tempFileName,$fileTarget);
                $req = $db->prepare('INSERT INTO courrier(DateArrive,Expediteur,Objet,DateSaisie,IDTypologie,Chemin,IDAuteur) VALUES(:dateA,:exp,:obj,NOW(),:typo,:path,:aut) ');
                $req->execute(array(
                    'dateA' => $_POST['dateA'],
                    'exp'=> $exp,
                    'obj'=> $obj,
                    'typo'=>$typo['ID'],
                    'path' =>$fileTarget,
                    'aut'=> $_SESSION['id'],
                ));

                if ($_POST['groupe'] == "autre")
                {
                    echo("
                          <SCRIPT LANGUAGE=JavaScript>
                          window.open ('formService.php', 'Formulaire Service', 'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400'); 
                         </SCRIPT>                                            
                          ");
                    echo '<SCRIPT>javascript:window.close()</SCRIPT>';
                }
                else
                {
                    $req = $db->query("SELECT NSS,AdresseMail FROM employe WHERE isDir = 1");
                    $dir = $req->fetch();
                    $data['Expediteur'] = $exp;
                    $data['Objet'] = $obj;
                    $data['Chemin'] = $fileTarget ;
                    $data['Commentaires'] ='';
                    mailSend($data,$dir['AdresseMail'],'');

                    $req = $db->query("SELECT ID FROM courrier WHERE ID =(SELECT MAX(ID) FROM courrier)");
                    $donnee = $req->fetch();
                    $req = $db->prepare("INSERT INTO `type`(IDCourrier,IDEmploye) VALUES(?,?)");
                    $req->execute(array(
                        $donnee['ID'],
                        $dir['NSS'],
                    ));

                    echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
                    echo '<SCRIPT>javascript:window.close()</SCRIPT>';
                    include ('interfaceDG.php');
                }

                $req->closeCursor();

            }


        }
    }
}

?>

</body>
</html>