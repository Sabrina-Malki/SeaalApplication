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

    $nom = htmlspecialchars($_POST['name']);
    $req = $db->prepare('SELECT * from compte WHERE Nom = :nom');
    $req->execute(array('nom'=>$nom));
    $donnees = $req->fetch();

    if (empty($donnees)) {
        echo '<script type="text/javascript">' . 'alert("Veuillez entrer un nom de service valide");' . '</script>';
        include ('login.html');
    }
    else
    {
        $req2 = $db->prepare('SELECT `Mot de passe` from compte WHERE Nom = :nom');
        $req2->execute(array('nom'=>$nom));
        $donnees2 = $req2->fetch();

        if ($donnees2['Mot de passe'] == htmlspecialchars($_POST['password']))
        {
            $req2 = $db->prepare('SELECT ID FROM compte WHERE Nom = :nom');
            $req2->execute(array('nom'=>$nom));
            $donnees3 = $req2->fetch();
            $_SESSION['id']=$donnees3['ID'];

            $req2 = $db->prepare('SELECT NSS,IDService,Nom,Prenom,AdresseMail FROM employe WHERE :don = IDCompte');
            $req2->execute(array('don'=>$donnees3['ID']));
            $donnees4 = $req2->fetch();
            $_SESSION['id_emp']=$donnees4['NSS'];
            $_SESSION['id_s']=$donnees4['IDService'];

            $req3 = $db->prepare('SELECT Designation FROM service WHERE :donn = ID ');
            $req3->execute(array('donn'=>$donnees4['IDService']));
            $donnees5 = $req3->fetch();
            $_SESSION['prenom']= $donnees4['Prenom']; $_SESSION['nom']= $donnees4['Nom'];$_SESSION['adr']= $donnees4['AdresseMail'];
            $_SESSION['service']= $donnees5['Designation'];

            $req2 = $db->query('SELECT ID FROM service WHERE Designation = "DG"');
            $donnees5 = $req2->fetch();
            if ($donnees4['IDService']== $donnees5['ID'])  header('Location:interfaceDG.php');
            else header('Location:interfaceAutre.php');
        }
        else {
            echo '<script type="text/javascript">' . 'alert("Le mot de passe saisi est incorrect");' . '</script>';
            header('Location:login.html');
        }

        $req2->closeCursor();
    }

    $req->closeCursor();







