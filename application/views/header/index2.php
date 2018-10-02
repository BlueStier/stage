<!DOCTYPE html>
<html lang="fr">
<head>
<title>Ville de oignies</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url();?>/assets/site/course-master/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/site/course-master/styles/elements_responsive.css">
<link href="<?php echo base_url();?>/assets/site/img/logos/logo2.jpg" rel="icon" type="image/jpg">
</head>
<body>

<div class="super_container">

	<!-- Header -->
	<header class="header flex-row" onmouseleave="invisibleMenu();">
			<div class=" flex-row align-items-center">
				<div class="d-flex align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<a href="<?php echo base_url();?>" title="Acceuil"><img src="<?php echo base_url();?>/assets/site/course-master/images/logo2.png" alt="">
					<span href="<?php echo base_url();?>">Oignies</span></a>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="d-flex flex-row">
				<div class=" main_nav">
					<ul class="main_nav_list">
					<?php
					$sizeHeader = 0;
					$tabHeader = [];
					//pour chaque menu de la bdd
						foreach($header_item as $a=>$header):
     						//vérifie si le menu doit être affiché
    							if($header['visible']){
									$tabHeader[] = $header; 
									$sizeHeader++; ?>
						<li class="main_nav_item"><a onmouseover="seeMenu(<?php echo $a; ?>);" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$header['path'];?>"><?php /* affiche le nom du menu */ echo $header['nom'] ?></a>
					</li>
						<?php } endforeach; ?>
										     
					</ul> 
					                   
				</div>
				<div class="header_side main_nav"> 
				<form action="Search.php" method="post">
		<div class="justify-content-md-center">        
          <div class="input-group">         
            <input class="form-control"
                 id="example-search-input"
                 type="search"
                 placeholder="Rechercher"/>
                 <span class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>                 
          </div>          
        </div>
		</form>	
		</div> 
		</div>             
			</nav>
		
		</div>			
			<?php 
			foreach ($tabHeader as $b=>$menu):?>
			<br>
		<div class="back_menu" id='<?php echo $b; ?>'>
		<h1 class="text-center text-white"><?php echo $menu['nom']; ?></h1>
		<div class="container">		
		<div class="row">				
		<?php 
		foreach($sub_item as $sub):                  
			$compare = strcmp($sub['menu'],$menu['nom']);            
			//on vérifie que le sous menu doit être affiché et qu'il correspond au menu parent
			if($sub['visible'] && ($compare == 0)){?>
					
	<?php if($sub['no3level']){	?>
		<div class="col-md-3 text_center text-white ">	
	<u><a class="text-white" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$sub['path'];?>"><?php echo $sub['nom']; ?></a></u>
	</div>
	<?php } else { ?>
		<div class="col-md-3 text_center text-white ">	
	<u><?php echo $sub['nom']; ?></u>
	<div class="row">
	<?php //pour chaque sous menu de 3eme niveau :
                        foreach($third_item as $thi):
                              //on vérifie que le 3eme niveau doit être affiché et qu'il correspond au sousmenu parent
                              $compare2 = strcmp($thi['sousmenu'],$sub['nom']);
							  if($thi['visible'] && ($compare2 == 0)){?>
							  <div class="col-md-12">
						<a class="text-white" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$thi['path'];?>"><?php echo $thi['nom']; ?></a>
						</div>	  
		<?php }  endforeach;?>
		</div>					  
	</div>
<?php } } endforeach;?>
</div>
	</div>
	</div>

<?php endforeach; ?>
		</div>
			
		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>					
	</header>
	

	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
			<form action="Search.php" method="post">
		<div class="row justify-content-md-center">        
          <div class="input-group col-lg-12">         
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
				<ul class="menu_list menu_mm">
				<?php
					$d = 0;
					$sizeThi = 0;				
					//pour chaque menu de la bdd
						foreach($header_item as $c=>$header):							
     						//vérifie si le menu doit être affiché
    							if($header['visible']){																
								?>
						<li class="menu_item menu_mm"><a onmouseover="seeSubMenu(<?php echo $c; ?>);" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$header['path'];?>"><?php /* affiche le nom du menu */ echo $header['nom'] ?></a>
						<ul id="sub<?php echo $c; ?>">
						<?php foreach($sub_item as $sub):						                 
			$compare = strcmp($sub['menu'],$header['nom']);            
			//on vérifie que le sous menu doit être affiché et qu'il correspond au menu parent
			if($sub['visible'] && ($compare == 0)){ 
				
				?>
				<li class="back_sub_menu"><a onmouseover="seeThiMenu(<?php echo $d; ?>);" href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$sub['path'];?>"><?php echo $sub['nom']; ?></a>
				<ul id="thi<?php echo $d; ?>">
				<?php //pour chaque sous menu de 3eme niveau :
                        foreach($third_item as $thi):
                              //on vérifie que le 3eme niveau doit être affiché et qu'il correspond au sousmenu parent
                              $compare2 = strcmp($thi['sousmenu'],$sub['nom']);
							  if($thi['visible'] && ($compare2 == 0)){?>
							  <li class="sub"><a href="<?php /*construction du lien en fonction du chemin en bdd*/ echo base_url().$thi['path'];?>"><?php echo $thi['nom'];?></a></li>
							  <?php } endforeach; ?>
							  </ul>
				</li> 
				<?php $d++;
					$sizeThi++; } endforeach; ?>
			</ul>
					</li>
						<?php				
					} endforeach; ?>										
				</ul>
				

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home1">	
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo $background;?>)"></div>
		</div>		
		<div class="home_content">	
			<h1><?php echo $title; ?></h1>
			<br>			
			<h2 class="text-center"><?php echo $subtitle; ?></h2>		
		</div>
		
	</div>
	<script>
	var sizethi = <?php echo $sizeThi; ?>;
	var size = <?php echo $sizeHeader; ?>;	
	document.body.onload = invisibleMenu();	
	document.body.onload = invisibleSubMenu();
	document.body.onload = invisibleThiMenu();	
	function invisibleMenu(){
		for (b = 0; b < size; b++){
			document.getElementById(b).style.display = 'none';
		}

	}
	function invisibleSubMenu(){
		for (b = 0; b < size; b++){
			document.getElementById('sub'+b).style.display = 'none';
		}

	}
	function invisibleThiMenu(){
		for (b = 0; b < sizethi; b++){
			document.getElementById('thi'+b).style.display = 'none';
		}

	}
	function seeMenu(id){
		invisibleMenu();
		document.getElementById(id).style.display='block' ;
	}

	function seeSubMenu(id){
		invisibleSubMenu();
		document.getElementById('sub'+id).style.display='block' ;
	}

	function seeThiMenu(id){
		invisibleThiMenu();
		document.getElementById('thi'+id).style.display='block' ;
	}																	
	</script>