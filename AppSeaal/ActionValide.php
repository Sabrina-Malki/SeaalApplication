<?php
$req2 = $db ->prepare('SELECT IDCourrier,IDService,DateValidAction FROM `action` WHERE IDService=:donn And DateValidAction IS NOT NULL ORDER BY DateValidAction DESC');
$req2->execute(array('donn'=>$_SESSION['id_s']));
while ($donnee2 = $req2->fetch())
{   $req0= $db ->prepare('SELECT Designation FROM service WHERE ID=:cd');
    $req0->execute(array('cd'=>$donnee2['IDService']));$donnee5 = $req0->fetch();
    $req3= $db ->prepare('SELECT ID,Objet FROM courrier WHERE ID=:cc ORDER BY DateSaisie DESC');
    $req3->execute(array('cc'=>$donnee2['IDCourrier']));$donnee3 = $req3->fetch();
    echo'<tr class="unread" >
                                   <td>
                                    </td>
                                    <td class="inbox-small-cells" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee3["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"><i class="fa fa-check-square-o"></i></td>
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee3["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Action sur:</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee3["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">'.$donnee3['Objet'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee3["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Validée le: '.$donnee2['DateValidAction'].'</td>
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'Contenu_Courrier_s.php?id='.$donnee3["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Par: '.$donnee5['Designation'].'</td>
                                    </tr>
                                    ';
    $req3->closeCursor();
    $req0->closeCursor();

}
$req2->closeCursor();
?>