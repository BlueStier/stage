<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    Carte Interactive
        <small>Consultvox</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-map-marker text-red"></i> Carte Interactive</li>
        <li class="active">Consultvox</li>
      </ol>
    </section>

<div class="form-horizontal">
      <div class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Texte d'intro de Consultvox</h3>              
            </div>
            </div>
        <?php if(isset($error)){echo $error['error'];};
                             echo validation_errors();
                                  echo form_open_multipart('cms/consultvox/');?>
                                   <div class="form-group">               
                  <label class="control-label col-sm-2">Texte d'intro : </label>                
                  <div class="box-body pad col-sm-10">            
                    <textarea id="editor" name="intro_consultvox" class="ckeditor" rows="10" cols="80">
                        <?php echo $consultvox['intro']; ?>                                            
                    </textarea>                                                  
              </div>                   
            </div>
            </div>
            </div>
            <div class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Balise à insérée :</h3>              
            </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 control-label">Balise</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='balise_consultvox' value='<?php echo $consultvox['balise']; ?>' required>
                  </div>
                  </div> 
            </div>
            <div class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Afficher dans les pages :</h3>              
            </div>
            </div>
            <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>Selectionner</th>
                <th>Nom de la page</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($page_item as $page): ?>
                    <tr>
                    <td><input type='checkbox' name="page[]" value="<?php /* affiche le nom du menu */ echo $page['nom'] ?>" <?php if($page['consultvox']){ echo "checked";}?>/><?php /* affiche le nom du menu */ echo "  ".$page['nom'] ?></td>
                    <td><?php echo $page['nom']; ?></td>
      </tr>
<?php endforeach; ?>
</tbody>
<tfoot>
                <tr>
                <th>Selectionner</th>
                <th>Nom de la page</th>
                </tr>
                </tfoot>
</table>
</div>
<div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms">Annuler</a>
                <button id='enregistrer' type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
                </div> 
            </div>                         
            
</div>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div><strong>Copyright &copy; 2018-BlueStier</strong> All rights reserved.
  </footer><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>