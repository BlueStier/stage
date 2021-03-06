<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">           
              <h3 class="box-title">Modifier la personnae : <?php echo $personnae['nom']; ?></h3>
            </div>
</div>
<div class="form-horizontal">
<div class="box-body">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/validUpPersonnae/'.$personnae['id_personnae']);
                  ?>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nom de la personnae </label>
                <div class="col-sm-10">
                  <input class="form-control" name="nomPersonnae" value="<?php echo $personnae['nom']; ?>" required>
                  </div>
                  </div>
                  <div class="form-group">
                <label class="col-sm-2 control-label">Concerver cette photo ?</label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$personnae['background'] ?>'/>
                <div class="col-sm-2">
                <input type="radio" name='radioP' onClick='visibleP(true);' value="Non" >Non     
                </div>
                <div class="col-sm-2">
                <input type="radio" name='radioP' onClick='visibleP(false);' value="Oui"checked>Oui     
                </div>                                
                </div>
        <div id="choixPhoto" class="form-group">
          <label class="col-sm-2 control-label">Choisir une autre image</label>
          <div class="col-sm-10">
            <input id="exampleInputFile"
                 name="back2"
                 type="file"
                 value='Choisissez une image'>
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
                <td><input type='checkbox' name="Personnae_check[]" value="<?php echo $page['id_pages'];?>"
                <?php for($i = 0; $i < $nbId; $i++){
                    if($page['id_pages'] == $personnae['id_page'.$i]){
                        echo 'checked';
                    }
                }
                ?>/></td>
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
  <script>
  document.getElementById("choixPhoto").style.display = 'none';
  function visibleP(choix) {
    (choix ? document.getElementById('choixPhoto').style.display = 'block' : document.getElementById('choixPhoto').style.display = 'none');
}
  </script>