<?php	$size = [];
//pour chaque menu de la bdd
foreach ($header_item as $header):
    //vérifie si le menu doit être affiché
    if ($header['visible']) {
        $size_pour_ce_menu = 0;
        foreach ($sub_item as $sub):
            $compare = strcmp($sub['menu'], $header['nom']);
            //on vérifie que le sous menu doit être affiché et qu'il correspond au menu parent
            if ($sub['visible'] && ($compare == 0)) {
                $size_pour_ce_menu++;
            }
        endforeach;
        $size[$header['nom']] = $size_pour_ce_menu;
    }
endforeach;
?>



<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en-US"> <!--<![endif]-->
<head>
<!-- head -->

<!-- meta -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>
Oignies
</title>


<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/site/img/logos/logo2.ico" type="image/x-icon" />
<script>
//<![CDATA[
window.mfn_slider_vertical	= { autoplay:0 	};
window.mfn_slider_portfolio 	= { autoPlay:0 };
//]]>
</script>

<link rel='stylesheet' id='contact-form-7-css'  href='<?php echo base_url(); ?>assets/cake/css/cform.css' type='text/css' media='all' />
<link rel='stylesheet' id='tp_twitter_plugin_css-css'  href='<?php echo base_url(); ?>assets/cake/css/tp_twitter_plugin.css' type='text/css' media='screen' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='<?php echo base_url(); ?>assets/cake/rs-plugin/css/settings.css' type='text/css' media='all' />

<link rel='stylesheet' id='select2-css'  href='<?php echo base_url(); ?>/assets/cake/css/select.css' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo base_url(); ?>assets/cake/css/woocommerce-layout.css' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo base_url(); ?>assets/cake/css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo base_url(); ?>assets/cake/css/woocommerce.css' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='<?php echo base_url(); ?>assets/cake/css/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='prettyPhoto-css'  href='<?php echo base_url(); ?>assets/cake/css/prettyPhoto.css' type='text/css' media='all' />
<link rel='stylesheet' id='owl-carousel-css'  href='<?php echo base_url(); ?>/assets/cake/js/owl-carousel/owl.carousel.css' type='text/css' media='all' />
<link rel='stylesheet' id='owl-theme-css'  href='<?php echo base_url(); ?>assets/cake/js/owl-carousel/owl.theme.css' type='text/css' media='all' />
<link rel='stylesheet' id='jplayer-css'  href='<?php echo base_url(); ?>assets/cake/css/blue.monday/jplayer.blue.monday.css' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-ui-css'  href='<?php echo base_url(); ?>assets/cake/css/ui/jquery.ui.all.css' type='text/css' media='all' />
<link rel='stylesheet' id='responsive-css'  href='<?php echo base_url(); ?>assets/cake/css/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' id='style-colors-php-css'  href='<?php echo base_url(); ?>assets/cake/css/style-colors.css' type='text/css' media='all' />
<link rel='stylesheet' id='style-php-css'  href='<?php echo base_url(); ?>assets/cake/css/style-2.css' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-woo-css'  href='<?php echo base_url(); ?>assets/cake/css/woocommerce.css' type='text/css' media='all' />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/cake/css/fonts/mfn-icons.css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/cake/css/custom.css" media="all" />
<link rel='stylesheet' id='images-blue-css'  href='<?php echo base_url(); ?>assets/cake/css/skins/sea/images.css' type='text/css' media='all' />
<link rel='stylesheet' id='blue-css'  href='<?php echo base_url(); ?>assets/cake/css/skins/sea/style.css' type='text/css' media='all' />


<link rel='stylesheet' id='Ubuntu-css'  href='http://fonts.googleapis.com/css?family=Ubuntu%3A100%2C300%2C400%2C400italic%2C700&amp;ver=4.2' type='text/css' media='all' />

<style>
.page-id-3716 h2 { word-wrap: break-word; }
.page-id-4311 .icon_box .desc_wrapper .desc { padding: 0 40px; }
.page-id-10459 .icon_box h4.title { word-wrap: break-word; }
.page-id-10756 #Footer { display:none;}
.page-id-10772 #Content { padding-top:0 !important;}
#Top_bar.is-sticky #logo img { max-height:40px; width:auto !important;}

#Subheader {
  background: url(<?php echo $background; ?>) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height : 400px;
}
</style>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>

<!-- body -->
<body class="<?php echo $css; ?>">
<!-- #Wrapper -->
<div id="Wrapper">

	<!-- #Header -->
	<header id="Header">
	<!-- .header_placeholder 4sticky  -->
	<div class="header_placeholder">
	</div>
	<div id="Top_bar">
		<div class="container">
			<div class="column one">
				<!-- .logo -->
				<div class="logo">
					<h1><a id="logo" href="<?php echo base_url(); ?>" title="Cake"><img class="scale-with-grid" src="<?php echo base_url(); ?>assets/site/img/logo2_retina.jpg" alt="Cake"/></a></h1>
				</div>
				<!-- .menu_wrapper -->
				<div class="menu_wrapper">
					<!-- #searchform -->
					<form method="get" id="searchform" action="#">
						<a class="icon_search icon" href="#"><i class="icon-search-line"></i></a>
						<a class="icon_close icon" href="#"><i class="icon-cancel"></i></a>
						<input type="text" class="field" name="search" id="search" placeholder="Rechercher"/>
						<input type="submit" class="submit" value="" />
					</form>

					<!-- #menu -->
					<nav id="menu" class="menu-main-menu-container">
					<ul id="menu-main-menu" class="menu">
                    <?php
//pour chaque menu de la bdd
foreach ($header_item as $header):
    //vérifie si le menu doit être affiché
    if ($header['visible']) {
        ?>
							<li class="menu-item  current-menu-item page_item page-item-4311 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children"><a href="<?php /*construction du lien en fonction du chemin en bdd*/echo base_url() . $header['path']; ?>"><span><?php /* affiche le nom du menu */echo $header['nom'] ?></span></a>
	                        <ul class="sub-menu mfn-megamenu mfn-megamenu-5">
	                        <?php
    foreach ($sub_item as $sub):
            $compare = strcmp($sub['menu'], $header['nom']);
            //on vérifie que le sous menu doit être affiché et qu'il correspond au menu parent
            if ($sub['visible'] && ($compare == 0)) {
                ?>

									<li class="menu-item  menu-item-has-children mfn-megamenu-cols-<?php echo $size[$header['nom']]; ?>"><a class="mfn-megamenu-title" href="<?php /*construction du lien en fonction du chemin en bdd*/echo base_url() . $sub['path']; ?>"><span><h5><?php echo $sub['nom']; ?></h5></span></a>
		                            <ul class="sub-menu mfn-megamenu mfn-megamenu-5">
		                            <?php //pour chaque sous menu de 3eme niveau :
                foreach ($third_item as $thi):
                    //on vérifie que le 3eme niveau doit être affiché et qu'il correspond au sousmenu parent
                    $compare2 = strcmp($thi['sousmenu'], $sub['nom']);
                    if ($thi['visible'] && ($compare2 == 0)) {?>

			                              <li class="menu-item "><a href="<?php /*construction du lien en fonction du chemin en bdd*/echo base_url() . $thi['path']; ?>"><span><?php echo $thi['nom']; ?></span></a></li>
					<?php }
                endforeach;?>
		                            </ul>
		                            </li>

		    <?php
        }?>
		    <?php endforeach;?>
	    </ul>
	    </li>
							<?php }
endforeach;?>
                        </ul>
					</nav>
					<a class="responsive-menu-toggle" href="#"><i class='icon-menu'></i></a>
				</div>
			</div>
		</div>
		</div>
		<div id="Subheader" >
		<div class="container">
		<div class="column one column_divider">
								<hr />
							</div>
		<div class="column one-third column_column"></div>
			<div class="column one-third column_column textcenter" style="background-color : white;">
				<h1 class="title"><?php echo $title; ?></h1>
				<h4><?php echo $subtitle; ?></h4>
			</div>
			<div class="column one-third column_column"></div>
		</div>
		<?php if (isset($personnaes_item)) {?>
		<div class="container textcenter personnae_large">
		<div id="Content">
		<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section pad1" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
						<?php
foreach ($personnaes_item as $personnaes):
        if ($personnaes['visible']) {?>
			<div class="column one-third column_column">
				<a class="button button_blue button_large textcenter" href="<?php /*construction du lien en fonction du chemin en bdd*/echo base_url() . 'pages/acces_rapide/' . $personnaes['id_personnae']; ?>" style="width:130px"><?php echo $personnaes['nom']; ?></a>
				</div>
	<?php }
    endforeach;?>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>

				<div class="container textcenter personnae_mini">
				<div class="column one-third column_column"></div>
				<div class="column one-third column_column">
				<a class=" button button_blue button_large textcenter" href="<?php /*construction du lien en fonction du chemin en bdd*/echo base_url() . 'pages/acces_rapide/-1' ?>" >Accès rapide</a>
				</div>
				<div class="column one-third column_column"></div>
				</div>
				<?php }?>
	</div>
	</div>
	</div>
	</header>
