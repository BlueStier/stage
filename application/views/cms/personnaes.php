<div class="content-wrapper">
<section class="content-header">
      <h2>
      Personnaes       
      </h2>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i>Apparence</li>
        <li class="active">Personnaes</li>
        <li><a type="button" class="btn btn-success" href="<?php echo base_url()?>cms/createPersonnae/"><i class="fa fa-plus"></i> Creer une personnae</a></li>
      </ol>      
    </section>
    <section class="content">      
      <div class="row">
<?php
//pour chaque personnaes de la bdd
foreach($personnaes_item as $perso):
      
?>
      <div class="col-md-4">
          <div class="box box-default collapsed-box" style="background-color : grey;">
            <div class="box-header with-border">
            <div class="row justify-content-md-center">          
            <div class='col-md-4'></div>
              <div class='col-md-4 col-xs-12'>
                <?php //si la personnae est visible sur le site on affiche l'oeil et récupère l'id à modif  
                if($perso['visible']){
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/5');
                ?>
                <input type="hidden" name="id" value='<?php echo $perso['id_personnae'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre invisible"><i class="fa fa-eye"></i></button></form></div>
                <?php
                //sinon on affiche l'oeil barré et récupère l'id à modif
                }else{
                  echo validation_errors(); 
                  echo form_open('cms/visibleOrNot/5');
                ?>
                <input type="hidden" name="id" value='<?php echo $perso['id_personnae'] ?>'/>
            <button type="submit" class="btn btn-primary" title="Rendre visible"><i class="fa fa-eye-slash"></i></button></form></div>
                <?php
                }              
              ?>
              </div>
              <div class='col-md-4'></div>
              <h3 ><?php /* affiche le nom de la personnae */ echo $perso['nom'] ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">                  
            <?php  echo validation_errors(); 
                  echo form_open('cms/updatePersonnae/'.$perso['id_personnae']);?>
              <button type="submit" class="btn btn-success" href="#"><i class="fa fa-medkit"></i> Modifier</button> 
              <button type="button" class="marge btn btn-danger" data-toggle="modal" data-target="#modal-danger<?php echo $perso['id_personnae'] ?>"><i class="fa  fa-warning"></i> Supprimer</button></form>         
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Modal pour la suppression d'un menu -->
        <div class="modal modal-danger fade" id="modal-danger<?php echo $perso['id_personnae']  ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $perso['nom'] ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/deletePersonnae/'.$perso['id_personnae']);?>                     
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        
    </div><?php 
   
endforeach;
?></div>
</section>
    </div>

<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>