<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">           
              <h3 class="box-title">Créer une personnae :</h3>
            </div>
</div>
<div class="form-horizontal">
<div class="box-body">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/validatePersonnae');
                  ?>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nom de la personnae</label>
                <div class="col-sm-10">
                  <input class="form-control" name="nomPersonnae" placeholder="Entrez le nom" required>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Choisir une image </label>
                  <div class="col-sm-10">
                  <input type="file" name="backgroundImg" id="exampleInputFile" value='Choisissez une image'>
                </div>
                </div>
                    <div class="box box-info">
                    <div class="box-header with-border" >
                    <h3 class="box-title">Sélectionnez les pages à lier </h3>
                    </div>
                  </div>
                  <div class="box-body table-responsive">    
              <table class=" display table table-bordered table-striped">
                <thead>
                <tr>
                <th>Selectionner</th>
                  <th>Nom de la page</th>
                  <th>Type de la page</th>                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($page_item as $page):?>
                <tr>
                <td><input type='checkbox' name="Personnae_check[]" value="<?php echo $page['id_pages'];?>"/></td>
                <td><?php echo $page['nom']; ?></td>
                <td><?php echo $page['type']; ?></td>
                </tr>
<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Selectionner</th>
                  <th>Nom de la page</th>
                  <th>Type de la page</th>                  
                </tr>
                </tfoot>
                </table>             
                  </div>
                  </div>
                     <!-- /.box-body -->
               <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/2">Annuler</a>
                <button id='enregistrer' type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
              </div>
              </div>
               
              <!-- /.box-footer -->
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>