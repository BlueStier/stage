<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no"
        name="viewport">
  <meta content=""
        name="description">
  <meta content="BlueStier"
        name="author">
  <title>Site de Oignies</title><!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>/assets/site/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet"><!-- Custom fonts for this template -->
  <link href="<?php echo base_url();?>/assets/site/vendor/font-awesome/css/font-awesome.min.css"
        rel="stylesheet"
        type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
        rel="stylesheet"
        type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script'
        rel='stylesheet'
        type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'
        rel='stylesheet'
        type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
        rel='stylesheet'
        type='text/css'>
  <link href="<?php echo base_url();?>/assets/site/img/logos/logo.jpg"
        rel="icon"
        type="image/png"><!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>/assets/site/css/agency.min.css"
        rel="stylesheet">
 
  
</head>
<?php
//récupère tous les nom de menu présent dans les sous menus
$yAv = [];
foreach($sub_item as $sub):
if(!in_array($sub['menu'],$yAv)){
      $yAv[]=$sub['menu'];
      }
endforeach;
?>
<body id="page-top" >
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
       id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger"
           href="<?php echo base_url();?>">Acceuil</a> <button aria-controls="navbarResponsive"
           aria-expanded="false"
           aria-label="Toggle navigation"
           class="navbar-toggler navbar-toggler-right"
           data-target="#navbarResponsive"
           data-toggle="collapse"
           type="button">Menu</button>
      <div class="collapse navbar-collapse"
           id="navbarResponsive">
        <ul class="navbar-nav nav-dropdown"
            data-app-modern-menu="true">
<?php
//pour chaque menu de la bdd
foreach($header_item as $header):
     //vérifie si le menu doit être affiché
    if($header['visible']){
            //si le menu n'a pas de sous menu oon affiche un lien  
          $no2level = in_array($header['nom'],$yAv); 
      if(!$no2level){?>
<li class="nav-item dropdown">
<a class="nav-link display-4" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$header['path'];?>"><?php /* affiche le nom du menu */ echo $header['nom'] ?></a>
</li>
      <?php }/*sinon on affiche un menu*/else {
?>
         <li class="nav-item dropdown">         
         <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$header['path'];?>"><?php /* affiche le nom du menu */ echo $header['nom'] ?></a>
                <div class="dropdown-menu dropright">
                <?php //pour chaque sous menu
            foreach($sub_item as $sub):                  
                  $compare = strcmp($sub['menu'],$header['nom']);            
                  //on vérifie que le sous menu doit être affiché et qu'il correspond au menu parent
                  if($sub['visible'] && ($compare == 0)){                        
                      //Si le sous menu ne contient pas de 3eme niveau on affiche :
                   if($sub['no3level']){     
                        ?><a class="nav-link dropdown-item"
                   href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$sub['path'];?>"><?php /* affiche le nom du sous menu */ echo $sub['nom'] ?></a>
                 <?php }
                 //sinon on affiche :
                 else{?>
                  <div class="dropdown-submenu">
                  <a aria-expanded="false"
                       class="nav-link dropdown-item dropdown-toggle display-4"
                       data-toggle="dropdown"
                       href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$sub['path'];?>"><?php /* affiche le nom du sous menu */ echo $sub['nom'] ?></a>
                  <div class="dropdown-menu"><?php
                  //pour chaque sous menu de 3eme niveau :
                        foreach($third_item as $thi):
                              //on vérifie que le 3eme niveau doit être affiché et qu'il correspond au sousmenu parent
                              $compare2 = strcmp($thi['sousmenu'],$sub['nom']);
                              if($thi['visible'] && ($compare2 == 0)){?>
                    <a class="dropdown-item"
                         href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$thi['path'];?>"><?php /* affiche le nom du 3eme menu */ echo $thi['nom'] ?></a> 
                         <?php } endforeach;?>                         
                  </div>
                </div><?php
                 }                
            }
            endforeach;
            ?>
                </div>
         </li>
       <?php }
    }
      endforeach;?> 
        </ul>
      </div>
    </div>
  </nav>
  <header id="entete" class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">
        <?php echo $title; ?>
          
        </div>
        <div class="intro-heading text-uppercase">
        <?php if(isset($subtitle)){echo $subtitle;} ?>
        </div>
        <form action="Search.php" method="post">
        <div class="row justify-content-md-center">        
          <div class="input-group col-lg-4">         
            <input class="form-control py-2"
                 id="example-search-input"
                 type="search"
                 placeholder="Rechercher">
                 <span class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>                 
          </div>          
        </div>
        </form> 
        <br>
        <br>
        <div class='container'>
        <button aria-controls="navbarResponsive"
           aria-expanded="false"
           aria-label="navbarSupportedContent" 
           class="btn btn-secondary btn-lg "
           data-target="#menu_rapide"
           data-toggle="collapse"
           type="button">Menu rapide</button>
           <div class="collapse navbar-collapse"
           id="menu_rapide"><br><br>
      <ul class="navbar-nav mr-auto">
        <div class="row justify-content-md-center ">
        <?php $sizeRapide = sizeof($rapide_item);
        foreach($rapide_item as $rapide):
            if($rapide['visible']){
        ?>
          <li class="nav-item">
          <a class="btn btn-secondary btn-lg" href="<?php /* affiche le chemin de la page */ echo base_url().$rapide['path'] ?>"><?php /* affiche le nom du sous menu */ echo $rapide['nom'] ?></a>
</li><div class="col-md-1"></div><br><br><br><br>
<?php } endforeach; ?>  
        </ul>
      </div>
    </div>
</div>
</div>
   </header>
   
  
    
 



