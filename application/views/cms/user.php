<div class="content-wrapper">
<section class="content-header">
      <h2>
      Utilisateurs        
      </h2>
      <ol class="breadcrumb">
        <li><i class="fa fa-user text-green"></i> Utilisateurs </li>
        <li class="active">Voir tous</li>
      </ol>      
    </section>
    <div class="box box-info">
            <div class="box-header with-border">                           
            </div>
            </div>
            <div class='row'>
        <?php foreach($users as $u):
          if($u['id_user'] != $id_user){?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url().$u['photo']?>" alt="User Avatar">
                <br>
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $u['prenom'].' '.$u['nom']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $u['type']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="<?php echo base_url().'cms/updateUser/'.$u['id_user'];?>">Modifer<i class="pull-right fa fa-pencil text-green"></i></i></a></li>
                <li><a data-toggle="modal" data-target="#modal-danger<?php echo $u["id_user"]?>" >Supprimer<i class="pull-right fa fa-trash text-blue"></i></a></li>
            </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- Modal pour la suppression d'un user -->
        <div class="modal modal-danger fade" id="modal-danger<?php echo $u["id_user"]?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suppression</h4>
              </div>
              <div class="modal-body">
                <p><i class="fa  fa-warning"></i> La suppression de '<?php echo $u['prenom'].' '.$u['nom']; ?>' sera définitive </p>
                <p>Confirmez-vous le suppression ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <?php echo validation_errors(); 
                      echo form_open('cms/deleteUser/');?>
                      <input type="hidden" name="id_user" value='<?php echo $u["id_user"] ?>'/>
                <button type="submit" class="btn btn-outline" >Confirmer la suppression</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->        
          </div>          
         <?php } endforeach; ?> 
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