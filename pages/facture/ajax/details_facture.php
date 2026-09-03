<?php

include('../../connexion.php');

if(isset($_POST['id_facture']))
{
    $id_facture = $_POST['id_facture'];


    //ENTETE FACTURE 
$req = $bdd->prepare('SELECT  * FROM factures f, interventions i, voitures v, clients c WHERE f.id_interv=i.id_interv AND i.id_voiture=v.id_voiture and v.id_client=c.id_client and f.id_facture =:facture');
$req->execute(array('facture'=>$id_facture));

$lignes = $req->fetch();
$numero_facture = $lignes['numero_facture'];
$nom_client = $lignes['nom_client'];
$date_facture = $lignes['date_facture'];
$main_oeuvre = $lignes['mmo'];
$marque =  $lignes['marque_voiture'];
$modele =  $lignes['modele_voiture'];
$plaque =  $lignes['numero_plaque'];
$objet = $lignes['libelle_intervention'];

   //FIN ENTETE FACTURE
   
  

    $fact  = '<div id="print">Facture N° :  <b>'.$numero_facture.'</b><br><br> Client : <b>'.$nom_client.'</b><br><br>Date Facture : <b>'.$date_facture.'</b><br><br>';

    $voiture = '<div style="float:right; margin-top:-150px">Marque<b> : '.$marque.'</b><br>Modele<b> : '.$modele.'</b><br>Plaque<b> : '.$plaque.'</b><br><u>Objet de l\'intervention</u>: '.$objet.'</div><br><center><b><u>Garage la Révélation</u></b></center>';

    $entete_tableau = '<br><div style="align:center"><table class="table table-striped">
            <thead>
            <tr>
               
                <th>Pièce</th>
                <th>Quantite</th>
                <th>Prix unitaire</th>
                <th>Prix Total</th>
            </tr>
            </thead><tbody>';

       //AFFICHER LE CORPS DU TABLEAU ET SES INFORMATIONS
       
       $req = $bdd->prepare('SELECT * FROM interventions_pieces ip, pieces p, interventions i,factures f WHERE ip.id_piece=p.id_piece and ip.id_interv=i.id_interv and f.id_interv=i.id_interv and f.id_facture=:id');
       $req->execute(array('id'=>$id_facture));
    
    $t1 = $fact.$voiture.$entete_tableau;
    $i = 0;
    $tot = 0;
    while($dnn = $req->fetch()){
        $i++;
        $libelle = $dnn['libelle_piece'];
        
        $nb = $dnn['nb_piece'];
        $prix = $dnn['prix_piece'];
        $total_ligne = $nb*$prix;
        $tot = $tot+$total_ligne;
        $t1 .= '
        <tr>
       
         <td height="10">'.utf8_encode($dnn['libelle_piece']).'</td>
         <td><center>'.$dnn['nb_piece'].'</center></td>
         <td><center>'.$dnn['prix_piece'].'</center></td>
         <td><center>'.$total_ligne.'</center></td></tr>
        ';
           
    }
    
    $t1 .='<tr><td></td><td></td><td></td><td></td><td></td></tr><tr>
    <td><center><b>Total</b></td><td></td><td></td><td><b>'.$tot.' FCFA</b></center></td>
    </tr>
    <tr>
    <td><center><b>Main d\'oeuvre : </b></td><td></td><td></td><td><b>'.$main_oeuvre.' FCFA</b></center></td>
    </tr><br>
    <tr>
    <td><center><b>TOTAL FACTURE : </b></td><td></td><td></td><td><b>'.$tot+$main_oeuvre.' FCFA</b></center></td>
    </tr>
    
    </tbody></table></div></div>';
    echo $t1;
}

?>
