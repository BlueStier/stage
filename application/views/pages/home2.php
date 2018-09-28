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
			
<div class="row">
	<div class="col">
		<div class="text-center" >
			<?php echo $intro; ?>
		</div>
	</div>
</div>

		<br>
		<div class="home">
		<!-- Hero Slider -->
		<div class="hero_slider_container">
			<div class="hero_slider owl-carousel">
				<?php  /*on affiche le nombre de slide*/ 
    for($a = 1; $a < $size; $a++){?>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url(<?php echo base_url().$tab['slide'.$a]['photo']; ?>)"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><?php echo $tab['slide'.$a]['title']; ?></h1>
							<h2 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"><?php echo $tab['slide'.$a]['p']; ?></h2>
						</div>
					</div>
				</div>
	<?php } ?>		
			</div>

			<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
			<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
		</div>

	</div>



	