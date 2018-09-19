 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Pages
        <small>Gestion des pages</small>
      </h2>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i> Apparence</li>
        <li class="active ">Pages</li>
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createPages/"><i class="fa fa-plus"></i> Creer une nouvelle page</a></li>
      </ol>       
    </section>
    <div class="row">
    <?php
//pour chaque page de la bdd
foreach($page_item as $page):
  //on n'affiche pas la page home
  $eject = strcmp($page['type'],'home');
  if($eject != 0){      
?>
    <div class="col-md-3">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <div class="row justify-content-md-center">
              <div class='col-md-4'>
              <?php echo validation_errors(); 
                echo form_open('cms/updatePage/'.$page['id_pages']);?>                              
              <button type="submit" class="btn btn-success" title="Modifier"><i class="fa fa-pencil"></i></button>
              </div></form> 
              <div class='col-md-4'>            
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $page["id_pages"]?>" title="Supprimer"><i class="fa fa-trash"></i></button>              
              </div>
              <div class='col-md-4'>
                <button type="button" class="btn btn-primary" title="Voir les liens vers les menus" onclick="unvisutable();" data-widget="collapse"><i class="fa fa-link"></i>
                </button>
              </div>
              </div><br>             
              <h5><?php echo "Page : '".$page['nom']."' du type : '".$page['type']."'" ?></h5>              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php
            //pour chaque menu de la bdd
            foreach($header_item as $header):
              $compar_menu = strcmp($header['path'],'pages/'.$page['nom'].'/');
              if($compar_menu == 0){
                echo validation_errors(); 
                echo form_open('cms/cutLink/1');?>
                <input type="hidden" name="cut" value='<?php echo $header['id_menu'] ?>'/>                 
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $header['nom']."<br></form>";
              }
            endforeach;
             //pour chaque sousmenu de la bdd
             foreach($sub_item as $sub):
              $compar_smenu = strcmp($sub['path'],'pages/'.$page['nom'].'/');
              if($compar_smenu == 0){
                echo validation_errors(); 
                echo form_open('cms/cutLink/2');?>
                <input type="hidden" name="cut" value='<?php echo $sub['id_sousmenu'] ?>'/>               
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $sub['nom']."<br></form>";
              }
            endforeach;
             //pour chaque 3ème niveau de la bdd
             foreach($third_item as $thi):
              $compar_3menu = strcmp($thi['path'],'pages/'.$page['nom'].'/');
              if($compar_3menu == 0){
                echo validation_errors(); 
                echo form_open('cms/cutLink/3');?>
                <input type="hidden" name="cut" value='<?php echo $thi['id_third'] ?>'/>                             
              <button type="submit" class="btn btn-box-tool" title="Couper le lien"><i class="fa fa-unlink"></i></button>         
              <?php echo $thi['nom']."<br></form>";
              }
            endforeach;      
              ?>
              <button type="button" class="btn btn-box-tool" onclick="visutable('<?php echo $page['nom'] ?>');" ondblclick="unvisutable();" title="Lier"><i class="fa fa-link"></i></button>
              Lier
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>        
         <!-- Modal pour la suppression d'une page -->
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
                      echo form_open('cms/deletePage/');?>
                      <input type="hidden" name="id_pages" value='<?php echo $page["id_pages"] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>  
        
          <?php }
    endforeach;
    ?> 
    </div>
    <div id="table">
    <?php
              echo validation_errors();
              echo form_open_multipart('cms/updateLink/1');?>
                   <!-- table des menus -->
              <!-- box-header --> 
              <div class="box">
            <div class="box-header">
              <h3 class="box-title" id='choice'>Choisissez le(s) menu(s) à liéer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les menus -->
                <thead>
                <tr>
                  <th>Menus</th>                                                     
                </tr>
                </thead>
                <tbody>
                <tr>                
                <?php foreach($header_item as $header): ?>
                <td><input type='checkbox' name="menu1[]" value="<?php /* affiche le nom du menu */ echo $header['nom'] ?>"><?php /* affiche le nom du menu */ echo "  ".$header['nom'] ?></td>
              <?php endforeach; ?>                                  
                </tr>
                </tbody>                
              </table>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les sous-menus -->
                <thead>
                <tr>
                  <th>Sous-menus</th>                                                     
                </tr>
                </thead>
                <tbody>                               
                <?php
                $taille = sizeof($sub_item);                
                $b = 0;
                $d = 0;
                $c = $b+6;
                while($d < $taille){
                  ?><tr><?php 
                  while($b < $c){
                  ?><?php          
                  foreach($sub_item as $k=>$sub):
                                   
                    if($k == $b){
                ?>                
                <td><input type='checkbox' name="sousmenu1[]" value="<?php /* affiche le nom du sous-menu */ echo $sub['nom'] ?>"><?php /* affiche le nom du sous-menu */ echo "  ".$sub['nom'] ?></td>
                    <?php }          
              
                endforeach;
                $b++; }
                $c = $b+6;
                ?></tr><?php
                $d++; } ?> 
                                         
                </tbody>                
              </table>
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les 3ème niveau -->
                <thead>
                <tr>
                  <th>3ème niveau</th>                                                     
                </tr>
                </thead>
                <tbody>                               
                <?php
                $taille1 = sizeof($sub_item);                
                $b1 = 0;
                $d1 = 0;
                $c1 = $b1+6;
                while($d1 < $taille){
                  ?><tr><?php 
                  while($b1 < $c1){
                  ?><?php          
                  foreach($third_item as $k1=>$thi):
                                   
                    if($k1 == $b1){
                ?>                
                <td><input type='checkbox' name="third1[]" value="<?php /* affiche le nom du 3ème niveau */ echo $thi['nom'] ?>"><?php /* affiche le nom du 3ème niveau */ echo "  ".$thi['nom'] ?></td>
                    <?php }          
              
                endforeach;
                $b1++; }
                $c1 = $b1+6;
                ?></tr><?php
                $d1++; } ?> 
                                         
                </tbody>                
              </table>
            </div>
            </div>
            <div class="box-footer">           
              <input type='hidden' id='choice2' name='nomPage'/>
                <a class="btn btn-default" href="<?php echo base_url()?>cms/3">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Valider</button>
                </form>
              </div> 
            <!-- /.box-body -->
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
<script>
document.getElementById("table").style.display ='none';
function visutable(txt){
  document.getElementById('choice2').value = txt;
  document.getElementById('choice').innerHTML ='Choisissez le(s) menu(s) à liéer à la page : '+txt;
  document.getElementById("table").style.display ='block';
}
function unvisutable(){
  document.getElementById("table").style.display ='none';
}
</script>