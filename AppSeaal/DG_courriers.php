
<?php
$req1 = $db ->query('SELECT ID,Expediteur,Objet,DateSaisie,Suivre FROM courrier order by DateSaisie DESC ');

while ($donnee1 = $req1->fetch())
{ echo  '<tr class="unread" >
                                   <td>
                                    </td>
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">'.$donnee1['Expediteur'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Objet:'.$donnee1['Objet'].'</td>
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;">Envoyé le: '.$donnee1['DateSaisie'].'</td>';
                                    if($donnee1['Suivre']==1)
                                        echo '<td><i class="fa fa-star inbox-started" onclick="Javascript:window.open(\'Contenu_courrier.php?id='.$donnee1["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"></i></td>
                                    
                                    </tr>
                                    ';
                                    else  echo '<td></td>
                                    
                                    </tr>
                                    ';
}

$req1->closeCursor();
?>

