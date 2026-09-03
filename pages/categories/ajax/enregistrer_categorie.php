<?php 
include('../../../connexion.php');
if(isset($_POST['lib_categorie']) )
{
  $lib_categorie = strtoupper($_POST['lib_categorie']);
 
 
 
  if(empty($lib_categorie))
  {
    echo 0;
  } 

  if(!empty($lib_categorie)) 
    { 
      $req = $bdd->prepare('SELECT * FROM categories WHERE libelle_categorie=:lib');
      $req->execute(array('lib'=>$lib_categorie));
      $res = $req->fetch();
      $nbre = $req->rowCount();
      if( $nbre>0 )  { echo 11; }
    
        
        else if( $nbre==0 ){
               
                $req = $bdd->prepare('INSERT INTO categories(libelle_categorie) VALUES(:a)');
                $req->execute(array( 'a'=>$lib_categorie));
                 
                echo 1;
        } 
      }

  }
  
  ?>


