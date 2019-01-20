<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Oignies cms</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/dist/css/AdminLTE.min.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/plugins/bootstrap-slider/slider.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/site/img/logos/logo2.ico" type="image/x-icon" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <meta http-equiv='refresh' content="900; URL=<?php echo base_url().'cms/dodo'?> ">
</head id="tete">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>O</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Oignies</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          </li>
          <?php 
          $alert = sizeof($alerte);
          if($typeuser=='Administrateur'&& $alert > 0){ ?>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Alertes">
              <i class="fa fa-bell-o" ></i>
              <span class="label label-warning"><?php echo $alert;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Il y a <?php echo $alert;?> alerte à valider</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php foreach($alerte as $a):?>
                  <li>
                    <a href="<?php echo base_url(); ?>cms/updateArticle/<?php echo $a['id_articles']; ?>">
                      <h3><i class="fa fa-newspaper-o text-yellow"></i> <?php echo $a['titre'].'</h3> alerte pour le : '.$a['alerte'];?>
                    </a>
                  </li>
          <?php endforeach; ?>
                </ul>
              </li>              
            </ul>
          </li>
          <?php } ?>        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().$photouser;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().$photouser;?>" class="img-circle" alt="User Image">

                <p>
                <?php echo $user;?>
                  <small><?php echo $typeuser;?></small>
                </p>
              </li>             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url().'cms/updateUser/'.$id_user;?>"  class="btn btn-default btn-flat">Gérer son Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>cms/destroy" class="btn btn-default btn-flat">Déconnexion</a>
                </div>
              </li>
            </ul>
          </li>
         </ul>
      </div>
    </nav>
  </header>
        
              
              
        