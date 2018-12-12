<?php
foreach($car_item as $car):
  $text = $car["text"];
endforeach;
$size = sizeof($photo_item);
?>
<div id="Content">
	<div class="content_wrapper clearfix">
			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
						<div class="be-row"> 
							<div class="column one column_column" style="background-color : white; text-align : center">		
			<?php echo $text;?>
		</div>
		</div>
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
	
	</div>