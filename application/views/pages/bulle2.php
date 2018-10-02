<div class="elements page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1><?php echo $title ?></h1>
					</div>
				</div>
			</div>		
			<div class="elements_accordions">

			  <?php        
      foreach ($bulle_item as $bulle):
        //récupère le nombre de bulle à mettre sur la page        
        for($i = 1; $i <= 10; $i++){
            if(! empty($bulle['tx'.$i])){                
       ?>	
							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"><h2><?php echo $bulle['tx'.$i]; ?></h2></div>
								<div class="accordion_panel">
									<div class="row align-items-center">
										<div class = "col-md-4 ">
								<img src="<?php echo base_url().$bulle['photo'.$i]; ?>"/></div>
								<div class="col-md-8"><h3><?php echo $bulle['soustitre']; ?></h3>
									<?php echo $bulle['tx'.$i]; ?></div>
								</div>
							</div>						
			</div>
			 <?php       
						}					
					} 
					if (!empty($bulle['sup'])){?>
					<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center"><h2>Les Conseillers délégués et les Conseillers municipaux  </h2></div>
								<div class="accordion_panel">
								<?php echo $bulle['sup'];?>
							</div>						
			</div>
						
						<?php         
				 }
					
					endforeach; ?>
			</div>
		</div>		
	</div>