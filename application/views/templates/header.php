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
  <style>
  .dropdown-submenu{position:relative;}
  .dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
  .dropdown-submenu:hover>.dropdown-menu{display:block;}
  .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
  .dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
  .dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
  </style>
</head>
<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
       id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger"
           href="#page-top">Acceuil</a> <button aria-controls="navbarResponsive"
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
          <li class="nav-item dropdown">
            <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="#services">Votre mairie</a>
            <div class="dropdown-menu dropright">
              <a class="nav-link dropdown-item"
                   href="<?php echo base_url();?>index.php/acceuil/">l'Acceuil de la Mairie</a>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#services">Démocratie locale</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/elus/">Vos élus</a> <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/ArretesMunicipaux/">Les arrêtés municipaux</a> <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/deliberations/">Les délibérations du conseil municipal</a>
                </div>
              </div>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#service">Vivre à Oignies</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/histoire/">Histoire locale</a> <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/environnement/">Environnement</a> <a class="dropdown-item"
                       href="<?php echo base_url();?>index.php/urbanisme-et-logement/">Urbanisme et logement</a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="#portfolio">Vos services</a>
            <div class="dropdown-menu dropright">
              <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Etat civil</a> <a class="nav-link dropdown-item"
                   href="<?php echo base_url();?>index.php/techniques/">Les services techniques</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">La police municipale</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Scolaire et périscolaire</a>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#services">Sociale et santé</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="">Le centre social d'action communale (CCAS)</a> <a class="dropdown-item"
                       href="">La maison d'acceuil et d'aide à l'insertion (MAI)</a> <a class="dropdown-item"
                       href="">La Roseraie foyer de personnes agées</a> <a class="dropdown-item"
                       href="">Le béguinage Camille Delabre</a> <a class="dropdown-item"
                       href="">Les locaux de quartier</a>
                </div>
              </div>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#service">Culture</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="shopping-cart-template.html">Le centre Mozart (école de musique)</a> <a class="dropdown-item"
                       href="shopping-cart-template.html">La bibliothèque municipale</a> <a class="dropdown-item"
                       href="shopping-cart-template.html">Le centre Denis Papin</a> <a class="dropdown-item"
                       href="shopping-cart-template.html">Le Métaphone</a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="#portfolio">Actualités</a>
            <div class="dropdown-menu">
              <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Le journal communal</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Les actus de la ville</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">La ville se modernise (nouvelle page Facebook)</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Abonnement newsletter</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="#portfolio">Vie locale</a>
            <div class="dropdown-menu dropright">
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#services">Vie associative</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="">Associations culturelles</a> <a class="dropdown-item"
                       href="">Associations sportives</a> <a class="dropdown-item"
                       href="">Associations loisirs et autres</a>
                </div>
              </div>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#service">Vie économique</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="shopping-cart-template.html">Les commerçants</a> <a class="dropdown-item"
                       href="shopping-cart-template.html">Professions médicales et paramédicales</a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false"
                class="nav-link display-4"
                data-toggle="dropdown"
                href="#portfolio">Infos patiques</a>
            <div class="dropdown-menu dropright">
              <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Transports en commun et scolaires</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Collecte des déchets</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">Location de salles</a> <a class="nav-link dropdown-item"
                   href="shopping-cart-template.html">En cas d'urgence...</a>
              <div class="dropdown-submenu">
                <a aria-expanded="false"
                     class="nav-link dropdown-item dropdown-toggle display-4"
                     data-toggle="dropdown"
                     href="#services">Sécurité, secours et santé</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item"
                       href="">L'opération tranquilité vacances</a> <a class="dropdown-item"
                       href="">Le centre des Hautois</a>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger"
                href="#contact">Nous contacter</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  


