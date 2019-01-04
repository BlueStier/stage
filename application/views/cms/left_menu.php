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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <?php if($typeuser=='Administrateur'){ ?>
        <li class="header">Tableau de bord</li>
        <li id='a0' class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard text-green"></i> <span>Tableau de bord</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='-1'><a href="<?php echo base_url()?>cms" ><i class="fa fa-circle-o text-green"></i> Voir le site</a></li>
            <li id='-2'><a href="<?php echo base_url()?>cms/-1" ><i class="fa fa-circle-o text-green"></i> Barre de recherche</a></li>
           </ul>
           </li>
        <li class="header">Gestion du site</li>
        <li id='a1' class="active treeview menu-open">
          <a href="#">
            <i class="glyphicon glyphicon-th text-red"></i> <span>Apparence </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='0'><a href="<?php echo base_url()?>cms/0"><i class="fa fa-circle-o text-red"></i> Général</a></li>
            <li id='1'><a href="<?php echo base_url()?>cms/1"><i class="fa fa-circle-o text-red"></i> Menus</a></li>
            <li id='2'><a href="<?php echo base_url()?>cms/2"><i class="fa fa-circle-o text-red"></i> Personnaes</a></li>
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
        <li id="a3" class="treeview">
          <a href="#">
            <i class="fa fa-envelope text-blue"></i>
            <span>Formulaires</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='7'><a href="<?php echo base_url()?>cms/7"><i class="fa fa-circle-o text-blue"></i> Créer un formulaire</a></li>
            <li id='8' ><a href="<?php echo base_url()?>cms/8"><i class="fa fa-circle-o text-blue"></i> Voir tous</a></li>
        </ul>
        </li>            
        <li id="a4" class="treeview">
          <a href="#">
            <i class="fa fa-map-marker text-red"></i>
            <span>Carte interactive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='9'><a href="<?php echo base_url()?>cms/9"><i class="fa fa-circle-o text-red"></i> Consultvox</a></li>            
          </ul>
        </li>
        <li id="a5" class="treeview">
          <a href="#">
            <i class="fa fa-comments text-yellow"></i>
            <span>Forums</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='10'><a href="<?php echo base_url()?>cms/10"><i class="fa fa-circle-o text-yellow"></i> Créer un forum</a></li>
            <li id='11'><a href="<?php echo base_url()?>cms/10"><i class="fa fa-circle-o text-yellow"></i> Voir tous</a></li>
            <li id='12'><a href="<?php echo base_url()?>cms/10"><i class="fa fa-circle-o text-yellow"></i> Commentaires</a></li>            
          </ul>
        </li>       
        <li class="header">Gestion des utilisateurs</li>
        <li id="a6" class="treeview">
          <a href="#">
            <i class="fa fa-user text-green"></i> <span>Utilisateurs </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='13' ><a href="<?php echo base_url()?>cms/13"><i class="fa fa-circle-o text-green"></i> Creer</a></li>
            <li id='14'><a  href="<?php echo base_url()?>cms/14"><i class="fa fa-circle-o text-green"></i> Voir tous</a></li>
          </ul>
        </li>
        <li id="a7" class="treeview">
          <a href="#">
            <i class="fa fa-table text-blue"></i> <span>BDD Citoyenne</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id='15'><a href="<?php echo base_url()?>cms/15"><i class="fa fa-circle-o text-blue"></i> Voir</a></li>            
          </ul>
        </li>
      <?php } ?>  
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
    if(nb <= -1){
      document.getElementById('a0').className = 'active treeview menu-open';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview ';
      document.getElementById('a3').className = 'treeview ';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb > -1 && nb < 5){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'active treeview menu-open';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'treeview ';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb > 4 && nb < 7){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'active treeview menu-open';
      document.getElementById('a3').className = 'treeview ';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb > 6 && nb < 9){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'active treeview menu-open ';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';      
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb == 9){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'treeview';
      document.getElementById('a4').className = 'active treeview menu-open ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb > 9 && nb < 13){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'treeview';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'active treeview menu-open ';
      document.getElementById('a6').className = 'treeview ';      
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb > 12 && nb < 15){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'treeview';
      document.getElementById('a4').className = 'treeview ';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'active treeview menu-open ';      
      document.getElementById('a7').className = 'treeview ';
    }
    if(nb == 15){
      document.getElementById('a0').className = 'treeview';
      document.getElementById('a1').className = 'treeview';
      document.getElementById('a2').className = 'treeview';
      document.getElementById('a3').className = 'treeview';
      document.getElementById('a4').className = 'treeview';
      document.getElementById('a5').className = 'treeview ';
      document.getElementById('a6').className = 'treeview ';
      document.getElementById('a7').className = 'active treeview menu-open ';
    }
    document.getElementById(nb).className = 'active';
  }
  </script>