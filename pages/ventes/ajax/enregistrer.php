<?php 
include('../../connexion.php');
if(isset($_POST['id_article']) and isset($_POST['nbre_arti_av']) and isset($_POST['remise']) and isset($_POST['nom_acheteur']) )

{
            $id_article = $_POST['id_article'];
            $nbre_arti_av = $_POST['nbre_arti_av'];
            $remise = $_POST['remise'];
            $nom_acheteur = $_POST['nom_acheteur'];
            $date_vente = date('Y-m-d H:i:s');

            if(empty($remise)){$remise=0;} elseif(!empty($remise) and $remise > 0){$remise = $_POST['remise'];}
            if(empty($nom_acheteur)){$nom_acheteur="NON DEFINI";} elseif(!empty($nom_acheteur)){$nom_acheteur = $_POST['nom_acheteur'];}
            

            
  if(empty($id_article) || empty($nbre_arti_av)){ echo 0; }
  else{
    //VERIFICATION DE LA QUANTITE  
    $req = $bdd->prepare('SELECT * FROM articles WHERE  id_article=:id_artice ');
    $req->execute(array(
      'id_artice'=>$id_article
     )); 
        $res = $req->fetch();
        $qtte_stock = $res['qtte_stock'];
        $prix = $res['prix_article'];
           
              if($qtte_stock<$nbre_arti_av){  echo 400; } /* QUANTITE INSUFISANTE POUR EFFECTUER LA VENTE */
                  else if($qtte_stock >= $nbre_arti_av)
            {
                   
                        
                        //INSERT INTO VENTE 
                        $req = $bdd->query('SELECT COUNT(id_vente) AS nbre FROM ventes');
                        $req->execute();
                        $res = $req->fetch();
                        $nbre = $res['nbre'];
                        if($nbre==0)
                            {
                              //TABLE VIDE
                              $code_initial = date('Y').'11';
                            
                              //     1-        INSERER DANS LA TABLE VENTE
                              $req = $bdd->prepare('INSERT INTO ventes(code_vente,date_vente,nom_acheteur,montant_remise) VALUES(:a,:b,:c,:d)');
                              $req->execute(array(
                                'a'=>$code_initial,
                                'b'=>$date_vente,
                                'c'=>$nom_acheteur,
                                'd'=>$remise
                                )); 

                                 //2- RECHERCHER L'ID DE LA VENTE 
                                 $req = $bdd->prepare('SELECT * FROM ventes ORDER BY id_vente DESC LIMIT 1');
                                 $req->execute();
                                 $res = $req->fetch();
                                 $id_vente = $res['id_vente'];
                                 $prix_vente = (intval($prix)*intval($nbre_arti_av))-$remise;

                                //3- INSERER DANS LA TABLE VENTE_ARTICLE
                                $req = $bdd->prepare('INSERT INTO vente_article(id_article,id_vente,qtte_vendue,prix_vente) VALUES(:a,:b,:c,:d)');
                                $req->execute(array(
                                  'a'=>$id_article,
                                  'b'=>$id_vente,
                                  'c'=>$nbre_arti_av,
                                  'd'=>$prix_vente
                                  
                                  )); 

                                  //4 - MISE A JOUR DE LA QUANTITE EN STOCK
                                     
                                     $reste = $qtte_stock-$nbre_arti_av;
                                     $req = $bdd->prepare('UPDATE articles SET qtte_stock=:reste WHERE id_article=:id');
                                     $req->execute(array(
                                       'id'=>$id_article,
                                       'reste'=>$reste )); 
                                        
                                      
                                        echo 402;
                              }
                         elseif($nbre>=1)
                         {
                          //TABLE NON VIDE
                               //1- RECHERCHER L'ID DE LA VENTE 
                               $req = $bdd->prepare('SELECT * FROM ventes ORDER BY id_vente DESC LIMIT 1');
                               $req->execute();
                               $res = $req->fetch();
                               $code_vente = $res['code_vente']+1;
                          
                        
                          //     1-        INSERER DANS LA TABLE VENTE
                          $req = $bdd->prepare('INSERT INTO ventes(code_vente,date_vente,nom_acheteur,montant_remise) VALUES(:a,:b,:c,:d)');
                          $req->execute(array(
                            'a'=>$code_vente,
                            'b'=>$date_vente,
                            'c'=>$nom_acheteur,
                            'd'=>$remise
                            )); 

                             //2- RECHERCHER L'ID DE LA VENTE 
                             $req = $bdd->prepare('SELECT * FROM ventes ORDER BY id_vente DESC LIMIT 1');
                             $req->execute();
                             $res = $req->fetch();
                             $id_vente = $res['id_vente'];
                             $prix_vente = (intval($prix)*intval($nbre_arti_av))-$remise;
                            //3- INSERER DANS LA TABLE VENTE_ARTICLE
                            $req = $bdd->prepare('INSERT INTO vente_article(id_article,id_vente,qtte_vendue,prix_vente) VALUES(:a,:b,:c,:d)');
                            $req->execute(array(
                              'a'=>$id_article,
                              'b'=>$id_vente,
                              'c'=>$nbre_arti_av,
                              'd'=>$prix_vente ));
                              
                              
                              //4 - MISE A JOUR DE LA QUANTITE EN STOCK
                                     
                              $reste = $qtte_stock-$nbre_arti_av;
                              $req = $bdd->prepare('UPDATE articles SET qtte_stock=:reste WHERE id_article=:id');
                              $req->execute(array(
                                'id'=>$id_article,
                                'reste'=>$reste )); 
                                    echo 402;
                          
                          }
                 
             }

            }
      }
         
  ?>


