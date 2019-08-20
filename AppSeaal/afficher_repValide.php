<?php
$req2 = $db ->prepare('SELECT ID,DateReponse,IDCourrier,Valide,IDService FROM reponse WHERE IDService=:donn And Valide=1 ORDER BY DateReponse DESC');
$req2->execute(array('donn'=>$_SESSION['id_s']));
while ($donnee2 = $req2->fetch())
{   $req3= $db ->prepare('SELECT Objet,DateSaisie FROM courrier WHERE ID=:cc ORDER BY DateSaisie DESC');
    $req3->execute(array('cc'=>$donnee2['IDCourrier']));$donnee3 = $req3->fetch();
    echo'<tr class="unread" >
                                   <td>
                                    </td>
                                    
                                    <td class="inbox-small-cells" onclick="Javascript:window.open(\'Contenu_rep_s.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"><i class="fa fa-check-circle-o"></i></td>
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_rep_s.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Re:</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_rep_s.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">'.$donnee3['Objet'].'</td>
                                   
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'Contenu_rep_s.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Envoyée le: '.$donnee2['DateReponse'].'</td>
                                    </tr>
                                    ';
    $req3->closeCursor();
}
$req2->closeCursor();
?>