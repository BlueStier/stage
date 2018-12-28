<?php
$select_entete ='';
$select_couleur = '';
switch($gen['entete']){
    case 'header-white header-bg':
    $select_entete = 1;
    break;
    case 'header-dark header-bg':
    $select_entete = 0;
    break;
    case 'header-white header-alpha':
    $select_entete = 3;
    break;
    case 'header-dark header-alpha':
    $select_entete = 2;
    break;
}
switch($gen['couleur']){
    case 'blue':
    $select_couleur = 0;
    break;
    case 'brown':
    $select_couleur = 1;
    break;
    case 'sea':
    $select_couleur = 2;
    break;
    case 'pink':
    $select_couleur = 3;
    break;
    case 'green':
    $select_couleur = 4;
    break;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Apparence
        <small>Général</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i> Apparence</li>
        <li class="active">Général</li>
      </ol>
    </section>
    <div class="form-horizontal">
      <div class="box-body">
        <?php if(isset($error)){echo $error['error'];};
                             echo validation_errors();
                                  echo form_open_multipart('cms/general/');?>
                                  <div class="form-group">
                <label class="col-sm-3 control-label">Choix de la couleur générale :</label>
                <div class="col-sm-9">                
                <select id="select_couleur" name ="select_couleur" class="form-control select2" >
                <option>Bleu</option>
                <option>Maron</option>
                <option>Océan</option>
                <option>Rose</option>
                <option>Verte</option>               
                </select>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3 control-label">En-tête :</label>
                <div class="col-sm-9">                
                <select id="select_en_tete" name ="select_en_tete" class="form-control select2" >
                <option>Noire pleine</option>
                <option>Blanche pleine</option>
                <option>Noire transparente</option>
                <option>Blanche transparente</option>                              
                </select>
                </div>
                </div>
                
                <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms">Annuler</a>
                <button id='enregistrer' type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
              </div>
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
  <script>
       document.getElementById("select_couleur").selectedIndex = "<?php echo $select_couleur; ?>";
      document.getElementById("select_en_tete").selectedIndex = "<?php echo $select_entete; ?>";
  </script>    
  