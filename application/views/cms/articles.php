<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
      Gestion des Articles        
      </h2>
      <ol class="breadcrumb">
        <li><i class="fa fa-newspaper-o text-yellow"></i> Gestion des Articles</li>
        <li class="active">Voir tous</li>
      </ol>      
    </section>    
    <?php /*pour chaque page de type 'article' */foreach($page_item as $p): ?>
    <section class="content-header">
    <h1>        
     <?php echo $p['nom'];?>
     <small>En cour sur le site (articles de moins de 3 mois)</small>
    </h1>
  </section>
  <br>
  <section class="content">      
      <div class="row">
      <?php //var_dump($current_item.$w);//affiche les articles en cour sur le site
      foreach($current_item as $k=>$c):
        if($c['id_articlespage'] == $p['id_pages']){
            ?>
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <div class="row justify-content-md-center">
              <div class='col-md-3'>              
              <?php 
              echo validation_errors(); 
              echo form_open('cms/updateArticle/'.$c['id_articles']);?>             
              <button type="submit" class="btn btn-success" title="Modifier"><i class="fa fa-pencil"></i></button>
              </div></form> 
              <div class='col-md-3'>            
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $c["id_articles"]?>" title="Supprimer"><i class="fa fa-trash"></i></button>              
              </div>              
              <div class='col-md-3'>
              <?php  echo validation_errors(); 
                echo form_open('cms/visibleOrNot/4');                              
              ?>
              <input type="hidden" name="id_articles" value='<?php echo $c['id_articles'] ?>'/>
                <button type="submit" class="btn btn-warning" >
                <?php if($c['visible']){ ?>
                <i class="fa fa-eye"></i>
                <?php } else {               
              ?>
              <i class="fa fa-eye-slash"></i>
              <?php } ?>
                </button></form>              
              </div>
              <div class='col-md-3'>              
                <button type="submit" class="btn btn-primary" title="Voir les alertes"  data-widget="collapse"><i class="fa fa-bell-o"></i>
                </button>
              </div>
              </div><br>             
              <h5><?php echo $c['titre']." publier le ".$c['jour'] ?></h5>              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if( $c['alerte'] != NULL){
                      echo validation_errors(); 
                      echo form_open('cms/supAlert/'.$c['id_articles']);?>
              <input type="hidden" name="cut" value='<?php echo $c['id_articles'] ?>'/>                 
              <button type="submit" class="btn btn-box-tool" title="Couper l'alerte"><i class="fa fa-bell-slash-o"></i></button>
              <?php echo "Alerte prévue le : ".$c['alerte'];"<br></form>"; 
             }else{ ?>
            Pas d'alerte sur cet article<br>
            <button onClick='visuselect(<?php echo $k; ?>);' class="btn btn-box-tool" title="Creer une alerte à partir de la date"><i class="fa fa-bell-o"></i>Créer un alerte</button>
            <?php echo validation_errors(); 
                      echo form_open('cms/configAlert/'.$c['id_articles']);?>
                      <div id="periode<?php echo $k; ?>">            
            <div class="form-group">               
                <select  name='selectPeriode1' class="form-control select2" >
                <option value='1'>Dans 3 mois</option>
                <option value='2'>Dans 6 mois</option>
                <option value='3'>Dans 1 ans</option>
                <option value='4'>Dans 18 mois</option>
                <option value='5'>Dans 2 ans</option>
                </select>                
                </div>                
                <div class='row justify-content-md-center' >
                <div class="col-lg-1"></div>                
                      <input type="hidden" name="id_articles" value='<?php echo $c["id_articles"] ?>'/>
                <input type="submit" class="col-lg-4 btn btn-primary" value="Confirmer"/>
                </form>
                <div class="col-lg-1"></div>                
                <a type="button" class="col-lg-4 btn btn-danger" href="<?php echo base_url()?>cms/6" >Annuler</a>
                <div class="col-lg-1"></div>
                </div>
                </div>
                                             
            <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- Modal pour la suppression d'un article -->
         <div class="modal modal-danger fade" id="modal-danger<?php echo $c["id_articles"]?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $c['titre'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/deleteArticle/');?>
                      <input type="hidden" name="id_articles" value='<?php echo $c["id_articles"] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>          
       <?php 
       } endforeach; ?>
      </div>
      <section class="content-header">
      <h1><small>Plus visible sur le site (articles de plus de 3 mois)</small></h1>
      </section>
      <br>
  <section class="content">      
      <div class="row">
      <?php //affiche les articles en cour sur le site     
      foreach($past_item as $k=>$c):
        if($c['id_articlespage'] == $p['id_pages']){
            ?>
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <div class="row justify-content-md-center">
              <div class='col-md-4'>
              <?php 
              echo validation_errors(); 
              echo form_open('cms/updateArticle/'.$c['id_articles']);?>             
              <button type="submit" class="btn btn-success" title="Modifier"><i class="fa fa-pencil"></i></button>
              </div></form> 
              <div class='col-md-4'>            
              <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $c["id_articles"]?>" title="Supprimer"><i class="fa fa-trash"></i></button>              
              </div>           
              <div class='col-md-4'>              
                <button type="button" class="btn btn-primary" title="Voir les alertes"  data-widget="collapse"><i class="fa fa-bell-o"></i>
                </button>
              </div>
              </div><br>             
              <h5><?php echo $c['titre']." publier le ".$c['jour'] ?></h5>              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if( $c['alerte'] != NULL){
                      echo validation_errors(); 
                      echo form_open('cms/supAlert/'.$c['id_articles']);?>                              
              <button type="submit" class="btn btn-box-tool" title="Couper l'alerte"><i class="fa fa-bell-slash-o"></i></button>
              <?php echo "Alerte prévue le : ".$c['alerte'];"<br></form>"; 
             }else{ ?>
            Pas d'alerte sur cet article<br>
            <button onClick='visuselect(<?php echo $k; ?>);' class="btn btn-box-tool" title="Creer une alerte à partir de la date"><i class="fa fa-bell-o"></i>Créer un alerte</button>
            <?php echo validation_errors(); 
                      echo form_open('cms/configAlert/'.$c['id_articles']);?>
                      <div id="periode<?php echo $k; ?>">            
            <div class="form-group">               
                <select  name='selectPeriode1' class="form-control select2" >
                <option value='1'>Dans 3 mois</option>
                <option value='2'>Dans 6 mois</option>
                <option value='3'>Dans 1 ans</option>
                <option value='4'>Dans 18 mois</option>
                <option value='5'>Dans 2 ans</option>
                </select>                
                </div>                
                <div class='row justify-content-md-center' >
                <div class="col-lg-1"></div>                
                      <input type="hidden" name="id_articles" value='<?php echo $c["id_articles"] ?>'/>
                <input type="submit" class="col-lg-4 btn btn-primary" value="Confirmer"/>
                </form>
                <div class="col-lg-1"></div>                
                <a type="button" class="col-lg-4 btn btn-danger" href="<?php echo base_url()?>cms/6" >Annuler</a>
                <div class="col-lg-1"></div>
                </div>
                </div>
                                             
            <?php } ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- Modal pour la suppression d'un article -->
         <div class="modal modal-danger fade" id="modal-danger<?php echo $c["id_articles"]?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $c['titre'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/deleteArticle/');?>
                      <input type="hidden" name="id_articles" value='<?php echo $c["id_articles"] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>          
       <?php 
       } endforeach; ?>
      </div>
  </section>    
  <?php
    endforeach; ?>
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
<?php $taille = sizeof($current_item) ;?>
var taille = <?php echo $taille ?>;
window.onload = all_invisible();

function all_invisible(){
for(nb = 0; nb <= taille; nb++){
document.getElementById('periode'+nb).style.display='none';}
}
 //var bool = true;
function visuselect(nb){    
    //if(bool){
    document.getElementById('periode'+nb).style.display='block';
    //bool = false;
   
}
</script>
