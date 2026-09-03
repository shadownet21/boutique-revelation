<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">CATEGORIES</h1>
        </div><!-- /.col -->
       <!--  <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div> --><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- MODAL SUPPRIMER -->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <span>Voulez - vous supprimer cette information ?</span> 
                <span id="suppression_body"></span>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <button type="button" class="btn btn-danger" id="bouton_supprimer_voiture">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
      <!-- MODAL CHARGEMENT DU NOMBRE DE PIECES DU MOTEUR -->
      
      <div class="modal fade" id="edit_nbre_piece">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier le nombre </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-sm-6">
          <input class="form-control" type="text" id="a" style="display:none"/>
          <input class="form-control" type="text" id="b" style="display:none"/>
          <input class="form-control" type="text" id="c" style="display:none"/>
         
          
                    <div class="form-group">
                    <span id="show"></span>
                    </div>
                      <div class="form-group">
                        <label>Nouvelle quantité</label>
                        <input type="number" id="qtte_stock_md" class="form-control"> 
                      </div>
            </div>
              
              
           

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-success" id="bouton_modifier_nb_piece">Modifier</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- MODAL MODIFICATION DU NOMBRE DE PIECES DU MOTEUR -->
      
      <div class="modal fade" id="mpm">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier le nombre de pièces repertoriées du moteur </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <div id="formulaire_liste_pieces_moteur_toedit"></div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-success" id="edit_piece_moteur">Modifier</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <!-- Horizontal Form -->
        <!-- TABS ***************************************-->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
             Catégories | Enregistrement
            </h3>
          </div>
          <div class="card-body">
           
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="enregistrer_piece_tab" data-toggle="pill" href="#enregistrer_piece" role="tab" aria-controls="enregistrer_piece" aria-selected="true"> <b>Enregistrer les catégories</b> </a>
                  
                  
                </div>
              </div>
              <div class="col-7 col-lg-8">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="enregistrer_piece" role="tabpanel" aria-labelledby="enregistrer_piece_tab">
                    <!-- ENREGISTRER PIECES -->
                    <form>
                <label for="exampleInputEmail1">Nom de la catégorie</label>
                <input type="text" class="form-control" id="lib_categorie" placeholder="Entrer le nom de la catégorie">
              
    <br>
               <center>   <button type="button" class="btn btn-info btn-lg" id="boutton_enregistrer_categorie">Enregistrer</button></center>
              </form>
                    <!-- ENREGISTRER  -->
                  </div>
       
                 
                   
                </div>
              </div>
            </div>
           
    
          </div>
          <!-- /.card -->
        </div>
       
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Liste des rayons ou catégories</h3>
          </div>
        
        </div>
         
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
               
                <th><center>Libellé catégorie</center></th>
               
                <th><center>Modifier</center></th>
               
                
                
              </tr>
              </thead>
              <tbody>
                <?php
              
      $req = $bdd->prepare('SELECT * FROM categories ORDER BY libelle_categorie DESC '); 
      $req->execute();
      $i=0;
      while($dnn=$req->fetch()) {           
                               $i++;   
                               $id_categorie = $dnn['id_categorie'];
                               
                                
                                          ?>
              <tr>
              <td><center><?php echo $i; ?></center></td>
            
              <td><center><?php echo utf8_decode($dnn['libelle_categorie']); ?></center></td>
             
              
              
              <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" onclick="affiche_piece_caross(<?php echo $id_categorie;?>)"><i class="fas fa-edit"></i></button> </center> </td>
                
              </tr>
              <?php }?>
             
              </tbody>
             
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
