<?php

//PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php' ;

/**********fonction d'envoi de mails à plusieurs personnes*****/
function mailSendAll($data,$table,$designation)
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
        foreach ($table as $address)
        {
            $mail->addAddress($address);
        }
        $mail->IsHTML(true);
        $mail->Subject = $data['Objet'].'  /Pour '.$designation;
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
        $mail->Subject = $data['Objet'].'  /Pour '.$designation;
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
/***************************************************/
try
{
    $db = new PDO('mysql:host=localhost;dbname=seaal;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur '.$e->getMessage());
}

//Recuperer le dernier courrier sauvegardé

$req = $db->query("SELECT ID FROM courrier WHERE ID =(SELECT MAX(ID) FROM courrier)");
$donnee = $req->fetch();

// Si commentaire existe, l'enregistrer
if(isset($_POST['comments']))
{
    $comments = htmlspecialchars($_POST["comments"]);
    $req = $db->prepare("UPDATE courrier SET Commentaires = ? WHERE ID = ?");
    $req->execute(array($comments,$donnee['ID']));

}

//Si date limite existe, l'enregistrer
if (!empty($_POST['dateR']))
{
    $req = $db->prepare("UPDATE courrier SET DateLimite = :dateL WHERE ID = :id");
    $req->execute(array(
        "dateL" => $_POST['dateR'],
        "id" => $donnee['ID'],
    ));

}
else
{
    $req = $db->prepare("UPDATE courrier SET DateLimite = NULL WHERE ID = :id");
    $req->execute(array(
        "id" => $donnee['ID'],
    ));

}

//Assistantes DG
if (isset($_POST['groupe0']))
{
    $req = $db->prepare("UPDATE courrier SET Suivre = 1 WHERE ID = ?");
    $req->execute(array($donnee['ID']));

}



//Recuperer les employés ayant un compte
$req3 = $db->query('SELECT NSS,`AdresseMail` FROM employe WHERE IDCompte IS NOT NULL ORDER BY Nom ASC');
$m=0;

// Récuperer les employés de la liste dans un tableau
while ($donnee2 = $req3->fetch())
{
    $tabNSS[$m] = $donnee2['NSS'];
    $tabMail[$m] = $donnee2['AdresseMail'];
    $m++;
}

//Récuperer les informations relatives au courrier
$req = $db->query("SELECT Expediteur,Objet,Commentaires,Chemin,DateLimite FROM courrier WHERE ID =(SELECT MAX(ID) FROM courrier)");
$donneeMail = $req->fetch();

//Choix de "CDG
if (isset($_POST['groupe1']))
{
    //MAJ BDD
    $des = substr($_POST['groupe1'],0,1);
    if ($des == 'i')
    {$des = "Info";} elseif ($des == 'r') {$des = 'Reponse';} else $des = 'Action';
    for ($j=0;$j<$m;$j++)
    {
        $req2 = $db->prepare("INSERT INTO `type`(IDCourrier,IDEmploye,Designation) VALUES(?,?,?)");
        $req2->execute(array(
            $donnee['ID'],
            $tabNSS[$j],
            $des,
        ));

    };

    //Envoi du mail
    mailSendAll($donneeMail,$tabMail,$des);
}

//Choix des autres services
$k = 2;
for ($j=0; $j<$m; $j++)
{
    $l = 'groupe'.$k;
    if (isset($_POST[$l]))
    {
        //MAJ BDD
        $des = substr($_POST[$l],0,1);
        if ($des == 'i') $des = "Info"; else if ($des == 'r') $des = 'Reponse'; else if ($des == 'a') $des = 'Action';
        $idEmp = $tabNSS[$k-2];
        $mailEmp = $tabMail[$k-2];
        $req2 = $db->prepare("INSERT INTO `type`(IDCourrier,IDEmploye,Designation) VALUES(?,?,?)");
        $req2->execute(array(
            $donnee['ID'],
            $idEmp,
            $des,
        ));

        $req2->closeCursor();

        //Envoi du mail
        mailSend($donneeMail,$mailEmp,$des);

    }
    $k++;

}





$req->closeCursor();
$req3->closeCursor();

echo '<script type="text/javascript">' . 'alert("les information sont bien enregistrées");' . '</script>';
echo '<SCRIPT>javascript:window.close()</SCRIPT>';
include('interfaceDG.php');
