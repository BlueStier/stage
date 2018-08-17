



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Menus
        <small>Gestion des menus et sous menus</small>
      </h2>
      <ol class="breadcrumb">
        <li><a  href="#"><i class="fa fa-dashboard"></i> Apparence</a></li>
        <li class="active">Menus</li>
      </ol>      
    </section>

<section class="content-header">
      <h1>        
        Menu principal :
      </h1> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un menu</a></li>
    </ol>           
    </section>
    <br>    
    <section class="content">      
      <div class="row">
<?php
$i = 0;
//pour chaque menu de la bdd
foreach($header_item as $header):   
?>
      <div class="col-md-4">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 class="box-title"><?php /* affiche le nom du menu */ echo $header['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <div class="col-lg-6">
              <a type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</a>
              </div>
              <div class="col-lg-6">              
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $header['id_menu'] ?>"><i class="fa  fa-warning"></i> Supprimer</button>
              </div>
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="modal modal-danger fade" id="modal-danger<?php echo $header['id_menu'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $header['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/1');?>
                      <input type="hidden" name="idmenu" value='<?php echo $header['id_menu'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        
    </div><?php 
    $i++;
endforeach;
?>
</div>
</section>
<section class="content-header">
      <h3>        
        Sous-menus :
      </h3> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un sous-menu</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">     
      
<?php
foreach($header_item as $header):?>
    <h4><?php echo $header['nom'] ?></h4>
    <div class="row"><?php
//pour chaque sous menu de la bdd
    foreach($sub_item as $sub):
        $compare = strcmp($sub['menu'],$header['nom']);
        if($compare == 0){
            ?>
    <div class="col-md-4">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 class="box-title"><?php /* affiche le nom du menu */ echo $sub['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <div class="col-lg-6">
              <a type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</a>
              </div>
              <div class="col-lg-6">
              <a type="button" class="btn btn-danger" href="#"><i class="fa  fa-warning"></i> Supprimer</a>
              </div>
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    
        <?php
        } 
    endforeach;
    ?></div><?php   
endforeach;
?>

</section>
<section class="content-header">
      <h3>        
        Sous-menus de 3ème niveau :
      </h3> 
      <ol class="breadcrumb">
        <li><a type="button" class="btn btn-success" href="#"><i class="fa fa-plus"></i> Ajouter un 3ème niveau</a></li>
    </ol>           
    </section>
    <br>
    <section class="content">      
      
<?php
foreach($header_item as $header):
    ?>
    <h4>Menu :&nbsp <?php echo $header['nom'] ?>
    <div class="row"><?php 
    
        foreach($third_item as $thi):            
            $compare = strcmp($thi['menu'],$header['nom']);            
            if($compare == 0){?>
<div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border" style="background-color:<?php /* affiche le nom du menu */ echo $header['couleur'] ?>">
              <h3 class="box-title"><?php /* affiche le nom du menu */ echo $thi['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">            
              <div class="row">
              <div class="col-lg-6">
              <a type="button" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</a>
              </div>
              <div class="col-lg-6">
              <a type="button" class="btn btn-danger" href="#"><i class="fa  fa-warning"></i> Supprimer</a>
              </div>
              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
           
            <?php 
        }
    
endforeach;
?></div><?php
endforeach;
?>
</section>
<div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de <?php echo $_SESSION['sup'] ?> sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-outline">Confirmer la suppression</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>

  
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
