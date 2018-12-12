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
									<h4 class="title" style="text-align : center;"><?php echo $intro; ?></h4>
									<div class="mfn-acc accordion_wrapper open1st">
                                    <?php    
                                        foreach($article_item as $article): 
                                            if($article['visible']){
                                                $id = str_replace(' ','-',$article['titre']);?>
										<div class="question">
											<h5><span class="icon"><i class="icon-right-open"></i></span><?php echo $article['titre']?></h5>
											<div class="answer">
                                                <img src="<?php echo base_url().$article['photo']?>" alt="" style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:160px;">
                                                <h6><?php echo $article['jour']?></h6>
                                                <?php echo $article['text']?>
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
