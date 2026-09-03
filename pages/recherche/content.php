<body class="hold-transition sidebar-mini layout-fixed">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">RECHERCHE</h1>
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
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
             Vente | Recherche | Révélation 
            </h3>
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Date Début</label>
                    <input type="date" id="date_start" class="form-control">
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                    <label for="">Date Fin</label>
                      <input type="date" id="date_end" class="form-control">
                  </div>
              </div>
          </div>
           <div class="col-lg-8">
           <center>
            <button type="button" class="btn btn-primary btn-lg" id="boutton_rechercher_vente">Rechercher</button>
            </center>
           </div>
            
             
              
          </div>
            
            
              
              
     
                                                  
                            
           
    
          
          <!-- /.card -->
        </div>
        <!-- TABS ****************************************-->
      
          <div class="card-header">
            <h3 class="card-title">Historique des ventes &nbsp;<b><span id="datedebut" style="color: blue;"></span></b><b>&nbsp;<span id="et">&nbsp;</span></b><b><span id="datefin" style="color: blue;"></span></b></h3>
            <div id="spin"></div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
              <th>#</th>
                <th><center>VENTE N°</center> </th>
                <th><center>CLIENT</center></th>
                <th><center>ARTICLE</center></th>
                <th><center>QTTE VENUDE</center></th>
                <th><center>PRIX DE VENTE</center></th>
              </tr>
              </thead>
              <tbody id="affiche_result"> </tbody>
            </table>
          </div>
         

      </div>
            
        </section>
        <!-- right col -->
      </div>
     
