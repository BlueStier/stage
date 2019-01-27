<?php
foreach($car_item as $car):
  $text = $car["text"];
  $text2 = $car["text2"];
endforeach;
$size = sizeof($photo_item)-1;
?>
<div id="Content">
	<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
						<div class="be-row"> 
							<div class="column one column_column textcenter">		
			<?php echo $text;?>
		</div>
		</div>
		</div>
<div id="mfn-rev-slider">
		<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullscreen-container pd0">
		<!-- START REVOLUTION SLIDER 4.6.9 fullscreen mode -->
			<div id="rev_slider_4_1" class="rev_slider fullscreenbanner dnone">
				<ul>
				<?php  /*on affiche le nombre de slide*/ 
    for($a = 1; $a <= $size; $a++){?>	
					<!-- SLIDE  -->
					<li data-transition="notransition" data-slotamount="1" data-masterspeed="100"  data-saveperformance="off" >
						<!-- MAIN IMAGE -->
						<img src="<?php echo base_url().$path.'/'.$photo_item[$a];?>"  alt=""  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
					</li>
					<?php } ?>				
				</ul>
				<div class="tp-bannertimer tp-bottom" ></div>	
			</div>
			
		</div>
		<!-- END REVOLUTION SLIDER -->
		
		<br>
		<?php echo $text2;?>
	</div>		
		</div>
</div>
	<div class="section the_content">
					<div class="section_wrapper">
						<div class="the_content_wrapper">
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($sidebar)){?>
			<!-- .four-columns - sidebar -->
			<div class="four columns">
				<div class="widget-area clearfix">
					<aside id="widget_mfn_menu-2" class="widget widget_mfn_menu">
					<h3>Vous pourriez être intéressé par : </h3>
					<ul class="menu">
					<?php foreach($page_lier as $pl): 
						if($pl['titre'] != $title){?>
						<li class="page_item page-item-771"><a href="<?php echo base_url().'pages/'.$pl['nom'].'/'.$pers_id; ?>"><?php echo $pl['titre'];?></a></li>
			<?php } endforeach; ?>						
					</ul>
					</aside>
				</div>
			<?php } ?>		
			<div class="column one column_divider">
								<hr />
							</div>
							<?php if($consult){ ?>
								<div class="column one column_column textcenter">
								<?php echo $consultvox['intro']; ?>
								<div class="column one column_divider">
								<hr />
							</div>
								<?php echo $consultvox['balise']; ?>
							</div>
							<?php } ?>		
		</div>
	</div>