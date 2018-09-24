<?php
$nbCarroussel = 0; 
foreach($home_item as $h):
  for($e = 1; $e <= 5; $e++){    
  if(!empty($h['photo'.$e])){
    $nbCarroussel++;
  }
  }
endforeach;?>
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
              <h3 class="box-title">La Home page permet d'afficher un titre, un soustitre (tous deux facultatifs) suivi d'un carroussel de 5 photos maximum (une au minimum).<br> En cliquant sur une photo de ce dernier, l'internaute pourra accéder à une page particulière du site.<br> Vous pouvez donc choisir 5 articles (ou page) à lier au carroussel.</h3>              
            </div>
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
               <h4>Choisir une page : </h4>
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
  
  