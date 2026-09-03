<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SHOP REVELATION</h1>
        </div><!-- /.col -->
        <!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> <?php 
                        include('connexion.php');
                        $req = $bdd->query('SELECT count(id_appro) as nbpd FROM approvisionnement');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbpd'];
                        echo $nblignes; 
              
              ?></h3>

              <p>NBRE X D'APPROVISIONNEMENT</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
         <!--    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
            <h3> <?php 
                     
                        $req = $bdd->query('SELECT count(id_categorie) as nbpd FROM categories');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbpd'];
                        echo $nblignes; 
              
              ?></h3>

              <p>TOUTES LES CATEGORIES D'ARTICLE</p>
            </div>
            <div class="icon">
              <i class="ion ion-bar-graph"></i>
            </div>
           <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3> <?php 
                      
                        $req = $bdd->query('SELECT count(id_article) as nbv FROM articles');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbv'];
                        echo $nblignes;
              ?></h3>
              <p>TOUS LES ARTICLES</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-indigo">
            <div class="inner">
            <h3> <?php 
                        
                        $req = $bdd->query('SELECT count(id_vente) as nbv FROM ventes');
                        $req->execute();
                        $res = $req->fetch();
                        $nblignes = $res['nbv'];
                        echo $nblignes; 
              ?></h3>
              <p>TOUTES LES VENTES</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
          </div>
        </div><!--  -->
        <!-- ./col ****************************-->
       
        
         
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
         
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>