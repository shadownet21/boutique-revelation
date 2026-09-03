<?php 
include('../../connexion.php');
if(isset($_POST['marque']) and isset($_POST['modele']) and isset($_POST['numero_chassis']))
{
  $marque = $_POST['marque'];
  $modele = $_POST['modele'];
  $numero_chassis = $_POST['numero_chassis'];
  $date_enregis=date('Y-m-d H:i:s');
 
  if(empty($marque) || empty($modele) || empty($numero_chassis))
  {
    echo 0;
  } 
  if(!empty($marque) and  !empty($modele) and !empty($numero_chassis)) 
    { 
      $req = $bdd->query('SELECT COUNT(id_voiture) AS nbre FROM voitures');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       
        $code_initial = date('Y').'1';
        $req = $bdd->prepare('INSERT INTO voitures(code_voiture,marque_voiture,modele_voiture,numero_chassis,date_arrivee) VALUES(:a,:b,:c,:d,:e)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$marque,
          'c'=>$modele,
          'd'=>$numero_chassis,
          'e'=>$date_enregis));
          
                   
        }
          elseif($nbre>=1){
          $req = $bdd->prepare('SELECT * FROM voitures ORDER BY id_voiture DESC LIMIT 1');
          $req->execute();
          $res = $req->fetch();
          $last_code = $res['code_voiture'];
          $code_voiture = $last_code+1;
     
         
         $req = $bdd->prepare('INSERT INTO voitures(code_voiture,marque_voiture,modele_voiture,numero_chassis,date_arrivee) VALUES(:a,:b,:c,:d,:e)');
         $req->execute(array(
          'a'=>$code_voiture,
          'b'=>$marque,
          'c'=>$modele,
          'd'=>$numero_chassis,
          'e'=>$date_enregis)); 
                                    
        }

           echo 1;
  
    }
  }
  
  ?>


