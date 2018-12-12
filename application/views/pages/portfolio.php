	<!-- #Content -->
	<div id="Content">
		<div class="content_wrapper clearfix" >
			<!-- .sections_group -->
			<div class="sections_group">

				<div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
							<div class="column one column_accordion">
								<div class="accordion">
									<h4 class="title" style="text-align : center;"><?php echo $title ?></h4>
									<div class="mfn-acc accordion_wrapper open1st">
                                    <?php      
                                             foreach ($bulle_item as $bulle):
                                               //récupère le nombre de bulle à mettre sur la page        
                                               for($i = 1; $i <= 10; $i++){
                                                   if(! empty($bulle['tx'.$i])){                
                                              ?>	
										<div class="question">
											<h5><span class="icon"><i class="icon-right-open"></i></span><?php echo $bulle['trt'.$i]; ?></h5>
											<div class="answer">
                                                <img src="<?php echo base_url().$bulle['photo'.$i]; ?>" alt="" style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;">
                                                <h6><?php echo $bulle['soustitre']; ?></h6>
                                                <?php echo $bulle['tx'.$i]; ?>
											</div>
                                        </div>
                                                   <?php }
                  } 
                  if (!empty($bulle['sup'])){?>
                    <div class="question">
                  <h5><span class="icon"><i class="icon-right-open"></i></span><?php echo $bulle['trtsup']; ?></h5>
                  <div class="answer">                      
                      <h6><?php echo $bulle['sup'];?></h6>
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
			<!-- .four-columns - sidebar -->
			
			<div class="four columns">
				<div class="widget-area clearfix">
					<aside id="widget_mfn_menu-2" class="widget widget_mfn_menu">
                    <h3>Recherches associées</h3>
					<ul class="menu">
						<li class="page_item page-item-116 current_page_item"><a href="accordion.html">Accordion &#038; FAQ</a></li>
						<li class="page_item page-item-10453"><a href="article-box.html">Article box</a></li>
						<li class="page_item page-item-38"><a href="blockquote.html">Blockquote</a></li>
						<li class="page_item page-item-10456"><a href="blog.html">Blog</a></li>
					</ul>
					</aside>
				</div>
			</div>
		</div>
	</div>
