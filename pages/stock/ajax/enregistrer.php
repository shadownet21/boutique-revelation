<?php 
include('../../connexion.php');
if(isset($_POST['lib_article']) and isset($_POST['qtte_a_stocker']) and isset($_POST['prix_unitaire']) and isset($_POST['id_categorie']))
{
  $lib_article = $_POST['lib_article'];
  $qtte_a_stocker = $_POST['qtte_a_stocker'];
  $prix_unitaire = $_POST['prix_unitaire'];
  $id_categorie = $_POST['id_categorie'];
  $photo = NULL;
 
 
  if(empty($lib_article) || empty($qtte_a_stocker) || empty($prix_unitaire) || empty($id_categorie))
  {
    echo 0;
  } 
  if(!empty($lib_article) and  !empty($qtte_a_stocker) and !empty($prix_unitaire) and !empty($id_categorie)) 
    { 
      $req = $bdd->query('SELECT COUNT(id_article) AS nbre FROM articles');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
      if($nbre==0)
      {
       //ENREGISTRER DANS ARTICLES
        $code_initial = '16'.date('Y').'1'; //Avec 16 le numero de séquence de la lettre P désignant "PIECE"
        $req = $bdd->prepare('INSERT INTO articles(code_article,libelle_article,prix_article,qtte_stock,photo,id_categorie) VALUES(:a,:b,:c,:d,:e,:f)');
        $req->execute(array(
          'a'=>$code_initial,
          'b'=>$lib_article,
          'c'=>$prix_unitaire,
          'd'=>$qtte_a_stocker,
          'e'=>$photo,
          'f'=>$id_categorie
           
          ));
           echo 1;
          
                   
        }
          elseif($nbre>=1){

            //EXISTANCE 
            $req = $bdd->prepare('SELECT * FROM articles WHERE libelle_article=:lib_article');
            $req->execute(array('lib_article'=>$lib_article));
            while($res = $req->fetch()){echo 2; die();}

            if($prix_unitaire>=0){
                  //

                  $req = $bdd->prepare('SELECT * FROM articles ORDER BY id_article DESC LIMIT 1');
                  $req->execute();
                  $res = $req->fetch();
                  $last_code = $res['code_article'];
                  $code_article = $last_code+1;

                
                  $req = $bdd->prepare('INSERT INTO articles(code_article,libelle_article,prix_article,qtte_stock,photo,id_categorie) VALUES(:a,:b,:c,:d,:e,:f)');
                  $req->execute(array(
                    'a'=>$code_article,
                    'b'=>$lib_article,
                    'c'=>$prix_unitaire,
                    'd'=>$qtte_a_stocker,
                    'e'=>$photo,
                    'f'=>$id_categorie
                  ));
                
                  echo 1;   
            } elseif($prix_unitaire<0){
              echo 18;

            }
           
                         
        }
         
    }
  }
  
  ?>


