<?php
$req = $db->prepare('SELECT IDCourrier,IDEmploye,Designation FROM `type` WHERE IDEmploye=:i And Designation=:t');
$req->execute(array('i'=>$_SESSION['id_emp'],'t'=>"Reponse"));
while ($donnee0 = $req->fetch())
{
    $req6 = $db->prepare('SELECT ID FROM reponse WHERE IDCourrier=:cr');
    $req6->execute(array('cr'=>$donnee0['IDCourrier']));
    $donnee6 = $req6->fetch();
    if (empty($donnee6))
    {
        $req1 = $db ->prepare('SELECT ID,Expediteur,Objet,DateSaisie FROM courrier WHERE ID=:cc ORDER BY DateSaisie DESC ');
        $req1->execute(array('cc'=>$donnee0['IDCourrier']));$donnee1 = $req1->fetch();
        echo '<tr class="unread" onclick="Javascript:window.open(\'Courrier_srep.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">
                                   <td>
                                    </td>
                                    <td class="inbox-small-cells"><i class="fa fa-exclamation"></i></td>
                                    <td class="view-message  dont-show">'.$donnee1['Expediteur'].'</td>
                                    <td class="view-message  ">Objet:'.$donnee1['Objet'].'</td>
                                    <td class="view-message  text-righ  ">Reçu le: '.$donnee1['DateSaisie'].'</td>
                                    </tr>
                                    ';
    }

    $req1->closeCursor();
}

$req->closeCursor();
?>
