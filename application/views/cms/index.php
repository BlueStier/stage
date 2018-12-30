  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de bord
        <small>Le site</small>        
      </h1>
      <ol class="breadcrumb">      
        <li><i class="fa fa-dashboard text-green"></i> Tableau de bord</li>
        <li class="active">Voir le site</li>        
      </ol>
    </section>    
    <!-- Main content -->
    <section >
    <div class="box box-info">
            <div class="box-header with-border">
            <h2>
                <a onClick="size_frame(1);"><i id='tel' class="fa fa-mobile"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a onClick="size_frame(2);"><i id='tablet' class="fa fa-tablet"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a onClick="size_frame(3);"><i id='ordi' class="fa fa-laptop text-red"></i></a>
</h2>             
            </div>
            </div>
    <iframe id="frame" width="1150" height="475"
    src="<?php echo base_url(); ?>">
</iframe>

    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <script>
    function size_frame(nb){     
      var frame = document.getElementById('frame');
      var tel = document.getElementById('tel');
      var tablet = document.getElementById('tablet');
      var ordi = document.getElementById('ordi');
      
      switch(nb){
        case 1 :
        frame.style.width = "479px";
        tel.className = 'fa fa-mobile text-red';
        tablet.className = 'fa fa-tablet ';
        ordi.className = 'fa fa-laptop';
        break;
        case 2 :
        frame.style.width = "767px";
        tel.className = 'fa fa-mobile ';
        tablet.className = 'fa fa-tablet text-red';
        ordi.className = 'fa fa-laptop';
        break;
        case 3 :
        frame.style.width = "1150px";
        tel.className = 'fa fa-mobile';
        tablet.className = 'fa fa-tablet ';
        ordi.className = 'fa fa-laptop text-red';
        break;
      }
    }
  </script> 

 
