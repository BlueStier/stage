  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$photouser;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user;?></p>
          <a href="<?php echo base_url()?>cms/dodo"><i class="fa fa-circle text-success"></i> Mettre en veille</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Rechercher...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Gestion du site</li>
        <li id='a1' class="active treeview menu-open">
          <a href="#">
            <i class="glyphicon glyphicon-th text-red"></i> <span>Apparence </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='1'class="active"><a href="<?php echo base_url()?>cms/1"><i class="fa fa-circle-o text-red"></i> Menus</a></li>
            <li id='2'><a href="<?php echo base_url()?>cms/2"><i class="fa fa-circle-o text-red"></i> Menu rapide</a></li>
            <li id='3'><a href="<?php echo base_url()?>cms/3"><i class="fa fa-circle-o text-red"></i> Home page</a></li>
            <li id='4'><a href="<?php echo base_url()?>cms/4"><i class="fa fa-circle-o text-red"></i> Pages</a></li>
          </ul>
        </li>
        <li id='a2' class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o text-yellow"></i>
            <span>Gestions des Articles</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='5' ><a href="<?php echo base_url()?>cms/5"><i class="fa fa-circle-o text-yellow"></i> Créer un article</a></li>
            <li id='6'><a href="<?php echo base_url()?>cms/6"><i class="fa fa-circle-o text-yellow"></i> Voir tous</a></li>            
         </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope text-blue"></i>
            <span>Contact</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href=""><i class="fa fa-circle-o text-blue"></i> Créer une page de contact</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o text-blue"></i> Voir tous</a></li>
        </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gestion des catégories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Créer un catégoirie</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Voir tous</a></li>
        </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Travaux</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Créer </a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Voir tous</a></li>            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Chatter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="header">Gestion des utilisateurs</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-green"></i> <span>Utilisateurs </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='7' class="active"><a href="<?php echo base_url()?>cms/7"><i class="fa fa-circle-o text-green"></i> Creer</a></li>
            <li id='8'><a  href="<?php echo base_url()?>cms/8"><i class="fa fa-circle-o text-green"></i> Voir tous</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>BDD Citoyenne</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <script>
  window.onload = active(<?php echo $nb;?>);
  function active(nb){
    for(var i=1;i<6;i++){
      document.getElementById(i).className = '';
    }
    if(nb>4){
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'active treeview menu-open';
    }
    document.getElementById(nb).className = 'active';
  }
  </script>