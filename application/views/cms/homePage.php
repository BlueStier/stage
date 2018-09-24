<?php
$nbCarroussel = 0; 
foreach($home_item as $h):
  for($e = 1; $e <= 5; $e++){    
  if(!empty($h['photo'.$e])){
    $nbCarroussel++;
  }
  }
endforeach;
?>
<div class="content-wrapper">
<section class="content-header">
      <h2>
      Home Page        
      </h2>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i>Apparence</li>
        <li class="active">Home page</li>
      </ol>      
    </section>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">La Home page permet d'afficher un titre, un soustitre (tous deux facultatifs) suivi d'un carroussel de 5 photos maximum (une au minimum).<br> En cliquant sur une photo de ce dernier, l'internaute pourra accéder à une page particulière du site.<br> Vous pouvez donc choisir 5 articles (ou pages) à lier au carroussel.
              <br>Chaque photo peu avoir un titre et un sous-titre.</h3>              
            </div>
            </div>
            <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre de la Home page :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le texte">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Sous-titre de la Home page:</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le texte">
                  </div>
                </div>
                <div class='row'>               
                <a class="col-md-12 btn btn-warning">Valider le changement de titre et de sous-titre</a>                                
                </div>
                <br>
                </div>
            <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Il y a actuellement <?php echo $nbCarroussel; ?> lien(s) présent(s) dans le carroussel de la Home page </h3>              
            </div>
            </div>            
            <?php
            foreach($home_item as $h):
              for($e = 1; $e <= 5; $e++){ ?>
              <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Lien numéro : <?php echo $e; ?></h3>              
            </div>
            </div> 
           
              <?php    
              if(empty($h['path'.$e])){
                ?>
                <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le texte">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Sous-titre :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le texte">
                  </div>
                </div>
                </div>
               <h4>Choisir une page : </h4>               
              <div class='row'>
               <?php
               foreach($pages_item as $page):
                $compare = strcmp($page['nom'],'home');
                if($compare != 0){ ?>               
<div class='col-md-4'>
     <!-- Widget: user widget style 1 -->
     <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $page['nom'];?></h3>
              <h5 class="widget-user-desc">Page du type : <?php echo $page['type'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url().$page['background'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><button type='' class='btn btn-primary'>Choisir</button></h5>                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
              <!-- /.row -->
            </div>
          </div>
</div>
             <?php
            }
              endforeach; ?>
</div>
             <?php
              } else { ?>

<?php
              }
              }
            endforeach;?>
 
              
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>
  
  