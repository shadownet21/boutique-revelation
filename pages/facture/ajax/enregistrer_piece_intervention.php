<?php 
include('../../connexion.php');
if(isset($_POST['id_interv']) and isset($_POST['id_piece']) and isset($_POST['nb_piece']))

{

 $id_interv = $_POST['id_interv'];
 $id_piece = $_POST['id_piece'];
 $quantite = $_POST['nb_piece'];
 $date = date('Y-m-d H:i:s');

 if(empty($id_interv) || empty($id_piece) || empty($quantite)) {echo 0;}
 
 else if(!empty($id_interv) and !empty($id_piece) and !empty($quantite)) {

        //VERIFICATION DE L'EXISTENCE DE LA PIECE DANS L'INTERVENTION
        $req = $bdd->prepare('SELECT * FROM interventions_pieces WHERE id_piece=:piece and id_interv=:interv');
        $req->execute(array( 'piece'=>$id_piece, 'interv'=>$id_interv ));
        $res = $req->fetch();

        if($res){echo 202;}else{

          $req = $bdd->prepare('INSERT INTO interventions_pieces(id_interv,id_piece,nb_piece,date_c) VALUES(:interv,:piece,:nb,:datec)');
            $req->execute(array(
              'interv'=>$id_interv,
              'piece'=>$id_piece,
              'nb'=>$quantite,
              'datec'=>$date
            ));
            
            //RECHERCHE DU CODE DE L'INTERVENTION
            $search = $bdd->prepare('SELECT * FROM interventions WHERE id_interv=:interv');
            $search->execute(array('interv'=>$id_interv ));
            $lignes = $search->fetch();
            $code_interv = $lignes['code_interv'];

            //MISE A JOUR DU NUMERO DE LA FACTURE
            $numfact = 'FACT'.$code_interv;

            $req = $bdd->prepare('UPDATE factures SET numero_facture=:numfact WHERE id_interv=:interv');
            $req->execute(array( 'numfact'=>$numfact, 'interv'=>$id_interv ));

                  echo 1;   

        }

            
      }
}       
  ?>


