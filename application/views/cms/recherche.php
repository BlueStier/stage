<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Tableau de bord
        <small>Barre de recherche</small>        
      </h1>
      <ol class="breadcrumb">      
        <li><i class="fa fa-dashboard text-green"></i> Tableau de bord</li>
        <li class="active">Barre de recherche</li>        
      </ol>
</section>
<div class="box-body">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mots contenus dans la liste de recherche</h3>              
            </div>
            </div>
            <div class="box-body table-responsive">    
              <table class=" display table table-bordered table-striped">
                <thead>
                <tr>
                <th>Supprimer</th>
                  <th>Mot</th>                 
                  <th>Black lister</th>
                </tr>
                </thead>
                <tbody>                  
                  <?php                 
    for($a = 0; $a < $nombre_de_mot; $a++){            
      if($white_list['mot'.$a] != NULL){    
      ?><tr>
      <td><a href="<?php echo base_url(); ?>cms/barre_de_recherche/true/true/<?php echo $a; ?>" class='btn btn-danger'>Supprimer le mot</a></td>
      <td><?php echo $white_list['mot'.$a]; ?></td>
      <td><a href="<?php echo base_url(); ?>cms/barre_de_recherche/true/false/<?php echo $a; ?>" class='btn btn-warning'>Black lister le mot</a></td>
      </tr>
      <?php 
     }
      }; ?>
</tbody>
<tfoot>
                <tr>
                <th>Supprimer</th>
                  <th>Mot</th>                 
                  <th>Black lister</th>
                </tr>
                </tfoot> 
</table>
            </div>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistrer un mot dans la liste de recherche</h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/enregistre_mot/1');?>
                  <button type="submit" class="btn btn-success">Enregistrer</button>
                  <div class="col-sm-10">
                  <input class="form-control" name='mot_white' placeholder="Entrez le mot " >
                  </div>
    </form>
                  </div>
                  </div>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mots contenus dans la black liste</h3>              
            </div>
            </div>
            <div class="box-body table-responsive">    
              <table class=" display table table-bordered table-striped">
                <thead>
                <tr>
                <th>Supprimer</th>
                  <th>Mot</th>                 
                  <th>Autoriser dans la liste de recherche</th>
                </tr>
                </thead>
                <tbody> 
                  <?php
    for($a = 0; $a < $nombre_de_mot; $a++){            
      if($black_list['mot'.$a] != NULL){              
        
      ?><tr>
      <td><a href="<?php echo base_url(); ?>cms/barre_de_recherche/false/true/<?php echo $a; ?>" class='btn btn-danger'>Supprimer le mot</a></td>
      <td><?php echo $black_list['mot'.$a]; ?></td>
      <td><a href="<?php echo base_url(); ?>cms/barre_de_recherche/false/false/<?php echo $a; ?>" class='btn btn-warning'>Autoriser dans la liste de recherche</a></td>
      </tr>
      <?php 
     }
      }; ?>
</tbody>
<tfoot>
                <tr>
                <th>Supprimer</th>
                  <th>Mot</th>                 
                  <th>Autoriser dans la liste de recherche</th>
                </tr>
                </tfoot> 
</table>
            </div>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistrer un mot dans la black liste </h3>              
            </div>
            </div>
            <div class="form-horizontal">
            <div class="form-group">
            <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/enregistre_mot/2');?>
                  <button type="submit" class="btn btn-success">Enregistrer</button>
                  <div class="col-sm-10">
                  <input class="form-control" name='mot_black' placeholder="Entrez le mot " >
                  </div>
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