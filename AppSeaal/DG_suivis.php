<?php
$req = $db ->query('SELECT ID,Expediteur,Objet,DateSaisie FROM courrier WHERE Suivre=1 order by DateSaisie DESC ');
while ($donnee1 = $req->fetch())
{
    echo  '<tr class="unread" >
                                   <td>
                                    </td>
                        
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee0["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">'.$donnee1['Expediteur'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee0["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Objet:'.$donnee1['Objet'].'</td>
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee0["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Envoyé le: '.$donnee1['DateSaisie'].'</td>
                                    <td><i class="fa fa-star inbox-started" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee0["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"></i></td>
                                    </tr>
                                    ';

}

$req->closeCursor();

?>

