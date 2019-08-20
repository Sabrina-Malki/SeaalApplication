<?php
$req = $db ->prepare('SELECT IDCourrier,IDEmploye,Designation FROM `type` WHERE Designation=:t');
$req->execute(array('t'=>"Action"));
while ($donnee0 = $req->fetch())
{
    $req6= $db ->prepare('SELECT ID FROM `action` WHERE IDCourrier=:cr');
    $req6->execute(array('cr'=>$donnee0['IDCourrier']));
    $donnee6 = $req6->fetch();
    if (empty($donnee6))
    {
        $req2 = $db->prepare("SELECT IDService FROM employe WHERE NSS = ?");
        $req2->execute(array($donnee0["IDEmploye"]));
        $donnee2 = $req2->fetch();
        $req0= $db->prepare('SELECT Designation FROM service WHERE ID=:cd');
        $req0->execute(array('cd'=>$donnee2['IDService']));
        $donnee5 = $req0->fetch();
        $req1 = $db ->prepare('SELECT ID,Expediteur,Objet,DateSaisie FROM courrier WHERE ID=:cc order by DateSaisie DESC ');
        $req1->execute(array('cc'=>$donnee0['IDCourrier']));
        $donnee1 = $req1->fetch();
        echo '<tr class="unread" >
                                   <td>
                                    </td>
                                    <td class="inbox-small-cells" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"><i class="fa fa-exclamation"></i></td>
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">'.$donnee1['Expediteur'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Objet:'.$donnee1['Objet'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Envoyé le: '.$donnee1['DateSaisie'].'</td>
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">En attente: '.$donnee5['Designation'].'</td>
                                    </tr>
                                    ';
    }
    $req0->closeCursor();
    $req1->closeCursor();
    $req6->closeCursor();
}

$req->closeCursor();
?>