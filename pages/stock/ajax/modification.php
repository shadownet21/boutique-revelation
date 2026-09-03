<?php

include('../../connexion.php');

if(isset($_POST['id']))
{

  $id = $_POST['id'];
    $req = $bdd->prepare('SELECT * FROM articles a, categories b where a.id_categorie=b.id_categorie and  a.id_article=:id');
    $req->execute(array('id' => $id ));
    $dnn = $req->fetch();
    $id_categorie = $dnn['id_categorie'];
    $formulaire='';
      
    $rayon = "";
    $rayon.='<option value='.$dnn['id_categorie'].'>'.utf8_decode($dnn['libelle_categorie']).'</option>';
    $rayon_dif = $bdd->prepare('SELECT * FROM categories where id_categorie<>:cat');
    $rayon_dif->execute(array('cat'=> $id_categorie));

  while($result=$rayon_dif->fetch()){

    $rayon.='<option value='.$result['id_categorie'].'>'.utf8_decode($result['libelle_categorie']).'</option>';
    }


        $formulaire.='
        	         
  <div class="form-row">
                        
           <input class="form-control" type="hidden" id="id_article"  value="'.$dnn['id_article'].'" ><br>
           
           <label>Désignation</label>
           <input class="form-control" value="'.$dnn['libelle_article'].'" id="libelle_article_edit"><br>
                 
                 
          <label>Prix article</label>
          <input class="form-control"  value="'.$dnn['prix_article'].'" id="prix_article_edit"><br>

          <label>Quantité en stock</label>
          <input class="form-control"  value="'.$dnn['qtte_stock'].'" id="qtte_article_edit"><br>

          <label>Rayon</label>
          <select class="form-control" id="id_categorie">'.$rayon.'</select><br>
  </div>
                                   
        '; 
echo $formulaire;


} 
 
?>
