 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Pages
        <small>Gestion des pages</small>
      </h2>
      <ol class="breadcrumb">
        <li><a  href="#"><i class="fa fa-dashboard"></i> Apparence</a></li>
        <li class="active">Pages</li>
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createPages/"><i class="fa fa-plus"></i> Creer une nouvelle page</a></li>
      </ol>       
    </section>
    <div class="row">
    <?php
//pour chaque page de la bdd
foreach($page_item as $page):      
?>
    <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <div class="row justify-content-md-center">
              <div class='col-md-4'>              
              <button type="submit" class="btn btn-success" title="Modifier"><i class="fa fa-pencil"></i></button>
              </div> 
              <div class='col-md-4'>            
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $page["id_pages"]?>" title="Supprimer"><i class="fa fa-trash"></i></button>              
              </div>
              <div class='col-md-4'>
                <button type="button" class="btn btn-primary" title="Voir les liens vers les menus" data-widget="collapse"><i class="fa fa-link"></i>
                </button>
              </div>
              </div><br>             
              <h3><?php echo $page['nom'] ?></h3>              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            //pour chaque menu de la bdd
            foreach($header_item as $header):
              $compar_menu = strcmp($header['path'],'pages/'.$page['nom'].'/');
              if($compar_menu == 0){
              ?>               
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $header['nom']."<br>";
              }
            endforeach;
             //pour chaque sousmenu de la bdd
             foreach($sub_item as $sub):
              $compar_smenu = strcmp($sub['path'],'pages/'.$page['nom'].'/');
              if($compar_smenu == 0){
                ?>               
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $sub['nom']."<br>";
              }
            endforeach;
             //pour chaque 3ème niveau de la bdd
             foreach($third_item as $thi):
              $compar_3menu = strcmp($thi['path'],'pages/'.$page['nom'].'/');
              if($compar_3menu == 0){
                ?>               
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $thi['nom']."<br>";
              }
            endforeach;      
              ?>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- Modal pour la suppression d'un sousmenu -->
         <div class="modal modal-danger fade" id="modal-danger<?php echo $page["id_pages"]?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $page['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/delete/2');?>
                      <input type="hidden" name="idmenu" value='<?php //echo $tab['id_sousmenu'] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          </div>  
        
        <?php
    endforeach;
    ?> 
    </div>    
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