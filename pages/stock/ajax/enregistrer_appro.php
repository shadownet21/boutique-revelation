<?php 
include('../../connexion.php');
if(isset($_POST['id_article']) and isset($_POST['qtte_appro']) and isset($_POST['prix_achat']) )
{
  $id_article = $_POST['id_article'];
  $qtte_appro = $_POST['qtte_appro'];
  $date_appro = date('Y-m-d H:i:s');
  $prix_achat = $_POST['prix_achat'];
 
 
  if(empty($id_article) || empty($qtte_appro) || empty($prix_achat))
  {
    echo 0;
  } 
  if(!empty($id_article) and  !empty($qtte_appro) and !empty($prix_achat)) 
    { 
     

            if($prix_achat>0 and $qtte_appro>0)
      {

              $req = $bdd->query('SELECT COUNT(id_appro) AS nbre FROM approvisionnement');
      $req->execute();
      $res = $req->fetch();
      $nbre = $res['nbre'];
            if($nbre==0)  //INITIALISATION
            {
              //ENREGISTRER DANS APPRO
                $code_initial = '1'.date('Y').'1'; //Avec 1 le numero de séquence de la lettre A désignant "APPRO"
                $req = $bdd->prepare('INSERT INTO approvisionnement(code_appro) VALUES(:a)');
                $req->execute(array('a'=>$code_initial ));

                $req = $bdd->prepare('SELECT * FROM approvisionnement ORDER BY id_appro DESC LIMIT 1');
                          $req->execute();
                          $res = $req->fetch();
                          $id_appro = $res['id_appro'];
                  //ENREGISTER DANS LA TABEL D'ASSOCIATION
                  $req = $bdd->prepare('INSERT INTO appro_articles(id_article,id_appro,qtte_appro,date_appro,prix_article_appro) VALUES(:a,:b,:c,:d,:e)');
                  $req->execute(array(
                    'a'=>$id_article, 
                    'b'=>$id_appro, 
                    'c'=>$qtte_appro, 
                    'd'=>$date_appro, 
                    'e'=>$prix_achat 
                  ));
                  //
                  //MISE A JOUR DE LA QTTE EN STOCK

                  $req = $bdd->prepare('SELECT * FROM articles WHERE id_article =:id');
                  $req->execute(array('id'=>$id_article));
                  $res = $req->fetch();
                  $qtte_stock = $res['qtte_stock'];
                  $nouvelle_qtte = $qtte_stock +intval($qtte_appro);
                  $req = $bdd->prepare('UPDATE articles SET qtte_stock=:new WHERE id_article=:id');
                  $req->execute(array(
                    'id'=>$id_article,
                    'new'=>$nouvelle_qtte
                  ));
                    echo 1;
          
                   
        }
          elseif($nbre>=1){
             //ENREGISTREMENT L'APPROVISIONNEMENT
             $req = $bdd->prepare('SELECT * FROM approvisionnement ORDER BY id_appro DESC LIMIT 1');
                  $req->execute();
                  $res = $req->fetch();
                  $code_appro = $res['code_appro']+1;
                  $id_appro = $res['id_appro'];
                  $req = $bdd->prepare('INSERT INTO approvisionnement(code_appro) VALUES(:a)');
                  $req->execute(array('a'=>$code_appro ));

                   //ENREGISTER DANS LA TABLE D'ASSOCIATION
                    $req = $bdd->prepare('INSERT INTO appro_articles(id_article,id_appro,qtte_appro,date_appro,prix_article_appro) VALUES(:a,:b,:c,:d,:e)');
                    $req->execute(array(
                      'a'=>$id_article, 
                      'b'=>$id_appro, 
                      'c'=>$qtte_appro, 
                      'd'=>$date_appro, 
                      'e'=>$prix_achat 
                    ));
                    //MISE A JOUR DE LA QTTE EN STOCK

                  $req = $bdd->prepare('SELECT * FROM articles WHERE id_article =:id');
                  $req->execute(array('id'=>$id_article));
                  $res = $req->fetch();
                  $qtte_stock = $res['qtte_stock'];
                  $nouvelle_qtte = $qtte_stock +intval($qtte_appro);

                  $req = $bdd->prepare('UPDATE articles SET qtte_stock=:new,prix_article=:prix WHERE id_article=:id');
                  $req->execute(array(
                    'id'=>$id_article,
                    'prix'=>$prix_achat,
                    'new'=>$nouvelle_qtte
                  ));

                echo 1;  
          }     
    } elseif($prix_achat<0 || $qtte_appro<0){echo 18; }
                         
  } 
   
}
  
  ?>


