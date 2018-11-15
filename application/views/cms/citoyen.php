<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
      Base de données de citoyens       
      </h2>
      <ol class="breadcrumb">
        <li><i class="fa fa-table "></i> BDD citoyenne</li>
    </ol>      
    </section>
    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date de naissance</th>
                  <th>Adresse</th>
                  <th>Téléphone</th>
                  <th>Mail</th>
                </tr>
                </thead>
                <tbody>
                  
                  <?php
    foreach($citoyen as $c):
      echo "<tr><td>".$c['nom']."</td><td>".$c['prenom']."</td><td>".$c['date']."</td><td>".$c['adresse']."</td><td>".$c['tel']."</td><td>".$c['email']."</td></tr>";
    endforeach; ?>


</tbody>
<tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date de naissance</th>
                  <th>Adresse</th>
                  <th>Téléphone</th>
                  <th>Mail</th>
                </tr>
                </tfoot> 
</table> 
</div>           
    <?php
    foreach($citoyen as $c):
      echo "nom : ".$c['nom'].", prenom : ".$c['prenom'].", adresse : ".$c['adresse'].", email : ".$c['email']."<br>";
    endforeach;
    ?>
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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>