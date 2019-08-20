<?php

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
        $req1 = $db->prepare('SELECT ID,Expediteur,Objet,DateSaisie FROM courrier WHERE ID=:cc ORDER BY DateSaisie DESC ');
        $req1->execute(array('cc' => $donnee0['IDCourrier']));
        $donnee1 = $req1->fetch();
        echo '             <tr class="unread" >
                                   <td class="inbox-small-cells">
                                   <input type="checkbox" class="mail-checkbox" name="case'.$i.'">
                                    </td>
                                    <td class="inbox-small-cells" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">' . $donnee1['Expediteur'] . '</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Objet:' . $donnee1['Objet'] . '</td>
                          
                                    <td class="view-message  text-righ " onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Reçu le: ' . $donnee1['DateSaisie'] . '</td>
                                    </tr> <br/>
                                    ';
        $i++;
        $req1->closeCursor();
    }

    $req4->closeCursor();

}
$req->closeCursor();
?>