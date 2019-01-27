	
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
												echo $bulle['titre'].'<br>'.$bulle['soustitre'];
                                               //récupère le nombre de bulle à mettre sur la page        
                                               for($i = 1; $i <= 10; $i++){
                                                   if(! empty($bulle['tx'.$i])){                
                                              ?>	
										<div class="question" onclick="window.location.hash='<?php echo $i ?>';" id="<?php echo $i ?>">
											<h5 class='textcenter' ><span class="icon"><i class="icon-right-open"></i></span><?php echo $bulle['trt'.$i]; ?></h5>
											<div class="answer" >
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
                  endforeach; 
  if($path_doc != ''){ ?>
  <div class="column one column_divider">
								<hr />								
							</div>
<a href="<?php echo base_url().$path_doc;?>" target="blank"><?php echo $intro_doc;?> </a>
<div class="column one column_divider">
								<hr />								
							</div>
<?php
  }
  ?>
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
	
