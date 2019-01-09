<?php
$tab =[];
foreach($home_item as $home):
$intro = $home['intro'];
for($i = 1;$i<=5;$i++){
    if(!empty($home['photo'.$i])){
    $tab['slide'.$i] = [
                        'photo' => $home['photo'.$i],
                        'path' => $home['path'.$i],
                        'title' => $home['title'.$i],
                        'p' => $home['p'.$i]
                    ];

}
};
endforeach;
$size = sizeof($tab);
?>
			
<div id="Content">
	<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
						<div class="column one column_divider">
								<hr />
							</div>
						<div class="be-row"> 
							<div class="column one column_column" style="background-color : white; text-align : center">		
			<?php echo $intro; ?>
		</div>
		</div>
		</div>
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
					
					<li data-transition="slideleft" data-slotamount="10"  data-masterspeed="600"  data-saveperformance="off">
						<!-- MAIN IMAGE -->
						<a href="<?php echo base_url().$tab['slide'.$a]['path']; ?>">
						<img src="<?php echo base_url().$tab['slide'.$a]['photo']; ?>"  alt=""  data-bgfit="cover" data-bgposition="center center fixed" data-bgrepeat="no-repeat">
						
						<!-- LAYER  -->
						<div class="tp-caption tp-fade"						 
							data-x="center" 
							data-y="center"							
							data-speed="300" 
							data-start="1100" 
							data-easing="Power3.easeInOut" 
							data-elementdelay="0" 
							data-endelementdelay="0" 
							data-end="5700" 
							data-endspeed="300" 
							>														
							<h3><?php echo $tab['slide'.$a]['title']; ?></h3>
							<h5><?php echo $tab['slide'.$a]['p']; ?></h5> 						
						</div>
						</a>
					</li>
					
					<?php } ?>				
				</ul>
				<div class="tp-bannertimer tp-bottom" ></div>	
			</div>
			
		</div>
		<!-- END REVOLUTION SLIDER -->
		
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
</div>




	