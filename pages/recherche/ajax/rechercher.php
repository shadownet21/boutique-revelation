<?php 
include('../../connexion.php');
if(isset($_POST['date_start']) and isset($_POST['date_end']))

{
            $date_start = $_POST['date_start'];
            $date_end = $_POST['date_end'];

            
  if(empty($date_start) || empty($date_end)){ echo 0; }

  if($date_start>$date_end){echo 111; die();}


  if(!empty($date_start) and !empty($date_end) and $date_start<$date_end or $date_start=$date_end ){

    
    $req = $bdd->prepare("SELECT * FROM ventes v,articles a ,vente_article va  WHERE  date(v.date_vente) BETWEEN :starter AND  :ender AND va.id_vente=v.id_vente AND va.id_article=a.id_article ");
    $req->execute(array('starter'=>$date_start,'ender'=>$date_end)); 

    $nb_lignes = $req->rowCount();

      if($nb_lignes<1){echo 1;}

    else if($nb_lignes>0){

      $contenu="";
                      $i=0;
                      $total = 0;
      while( $res = $req->fetch()) {
        $total = $total+$res['prix_vente'];
       $i++;  
  
       $contenu.='
       <tr>
       <td><center>'. $i .'</center></td>
       <td><center>'. $res['code_vente'].'</center></td>
       <td><center>'. $res['nom_acheteur'] .'</center></td>
       <td><center>'. $res['libelle_article'] .'</center></td>
       <td><center>'. $res['qtte_vendue'].' </center></td>
       <td><center>'. $res['prix_vente'].'</center></td>
       </tr>';

      }
      $contenu.='
      <tr>
      <td><center><b>TOTAL</b></center></td>
      <td><center></center></td>
      <td><center></center></td>
      <td><center></center></td>
      <td><center> </center></td>
      <td style="color:red"><center><b>'.number_format($total, -1, 3, ' ').'&nbsp; FCFA</b></center></td>
      </tr>';
      
      echo $contenu;
    } 
  
        
}
}     
  ?>


