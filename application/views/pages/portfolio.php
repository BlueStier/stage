	<!-- #Content -->
	<div id="Content">
		<div class="content_wrapper clearfix" >
			<!-- .sections_group -->
			<div class="sections_group">

				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
						<div class="column one column_divider">
								<hr />
							</div>
							<div class="column one column_accordion">
								<div class="accordion">
									<h4 class="title textcenter" ><?php echo $title ?></h4>
									<div class="mfn-acc accordion_wrapper open1st">
                                    <?php      
                                             foreach ($bulle_item as $bulle):
                                               //récupère le nombre de bulle à mettre sur la page        
                                               for($i = 1; $i <= 10; $i++){
                                                   if(! empty($bulle['tx'.$i])){                
                                              ?>	
										<div class="question">
											<h5 class='textcenter'><span class="icon"><i class="icon-right-open"></i></span><?php echo $bulle['trt'.$i]; ?></h5>
											<div class="answer">
											<?php if($bulle['photo'.$i] != ''){?>
                                                <img src="<?php echo base_url().$bulle['photo'.$i]; ?>" alt="" style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;">
											<?php } ?>    
												<h6 id='b<?php echo $i; ?>'><?php echo $bulle['soustitre']; ?></h6>
                                                <?php echo $bulle['tx'.$i]; ?>
											</div>
                                        </div>
                                                   <?php }
                  } 
                  if (!empty($bulle['sup'])){?>
                    <div class="question">
                  <h5 class='textcenter'><span class="icon"><i class="icon-right-open"></i></span><?php echo $bulle['trtsup']; ?></h5>
                  <div class="answer">                      
                      <?php echo $bulle['sup'];?>
                  </div>
              </div>
<?php         
} 
                  endforeach; ?>
 
									</div>
								</div>
							</div>
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
