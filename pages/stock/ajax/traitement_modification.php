<?php 
   //MODIFICATION
   include('../../connexion.php');

if(isset($_POST['id']) and isset($_POST['libelle_article']) and isset($_POST['prix_article']) and isset($_POST['qtte_stock']) and isset($_POST['id_categorie']))
{
  $id=$_POST['id'];
  $libelle_article = $_POST['libelle_article'];
  $prix_article = $_POST['prix_article'];
  $qtte_stock = $_POST['qtte_stock'];
  $id_categorie =  $_POST['id_categorie'];
  $date_modification = date('Y-m-d H:i:s');

  //RECHERCHE DE L'ANCIENNE VALEUR 

  $req = $bdd->prepare('SELECT * FROM articles a, categories c WHERE a.id_categorie=c.id_categorie AND a.id_article=:id');
  $req->execute(array( 'id'=>$id  ));
  $res = $req->fetch();
  $ancienne_valeur_qtte = $res['qtte_stock'];
  $ancienne_valeur_prix = $res['prix_article'];
  $ancienne_categorie = $res['libelle_categorie'];

  //EQUIVALENCE DE LA NOUVELLE VALEUR 
  $req = $bdd->prepare('SELECT * FROM categories WHERE id_categorie=:id' );
  $req->execute(array( 'id'=>$id_categorie  ));
  $res = $req->fetch();
  $nouvelle_categorie = $res['libelle_categorie'];


  $req = $bdd->prepare('UPDATE articles SET libelle_article=:a,prix_article=:b,qtte_stock=:c,id_categorie=:d WHERE id_article=:id');
  $req->execute(array(
    'a'=>$libelle_article,
    'b'=>$prix_article,
    'c'=>$qtte_stock,
    'd'=>$id_categorie,
    'id'=>$id

  ));
  //REPERTORIER LES MODIFICATIONS SUR LE FORMULAIRE 

      $req = $bdd->prepare('INSERT historique_modif_stock(libelle_elmt,ancienne_valeur_qtte,nouvelle_valeur_qtte,ancienne_valeur_prix,nouvelle_valeur_prix,ancienne_categorie,nouvelle_categorie,date_modification) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)');
      $req->execute(array(
        'a'=>$libelle_article,
        'b'=>$ancienne_valeur_qtte,
        'c'=>$qtte_stock,
        'd'=>$ancienne_valeur_prix,
        'e'=>$prix_article,
        'f'=>$ancienne_categorie,
        'g'=>$nouvelle_categorie,
        'h'=>$date_modification
       
    
      ));

 echo 1;

  
}

  
  ?>


