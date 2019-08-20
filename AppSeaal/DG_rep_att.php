<?php
$req2 = $db ->prepare('SELECT ID,DateReponse,IDCourrier,Valide,IDService FROM reponse WHERE Valide=0 And DateValidRep IS NULL ORDER BY DateReponse DESC');
$req2->execute(array('donn'=>$_SESSION['id_s']));
while ($donnee2 = $req2->fetch())
{   $req0= $db ->prepare('SELECT Designation FROM service WHERE ID=:cd');
    $req0->execute(array('cd'=>$donnee2['IDService']));$donnee5 = $req0->fetch();
    $req3= $db ->prepare('SELECT Objet,DateSaisie FROM courrier WHERE ID=:cc');
    $req3->execute(array('cc'=>$donnee2['IDCourrier']));$donnee3 = $req3->fetch();
    echo'<tr class="unread" >
                                   <td>
                                    </td>
                                     <td class="inbox-small-cells" onclick="Javascript:window.open(\'ContenuDG_repAtt.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=560,width=770,top=400,left=400\'); return false;"><i class="fa fa-circle-o-notch"></i></td>
                                    <td class="view-message  dont-show" onclick="Javascript:window.open(\'ContenuDG_repAtt.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=700,width=900,top=300,left=400\'); return false;">'.$donnee5['Designation'].'</td>
                                    <td class="view-message  " onclick="Javascript:window.open(\'ContenuDG_repAtt.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=700,width=900,top=300,left=400\'); return false;">Re: '.$donnee3['Objet'].'</td>
                                    <td class="view-message  text-righ  " onclick="Javascript:window.open(\'ContenuDG_repAtt.php?id='.$donnee2["ID"].'\',\'ma page\', \'Popup\', \'scrollbars=0,resizable=0,height=700,width=900,top=300,left=400\'); return false;">Reçue le: '.$donnee2['DateReponse'].'</td>
                                    </tr>
                                    ';
    $req3->closeCursor();
    $req0->closeCursor();
}
$req2->closeCursor();
?>
