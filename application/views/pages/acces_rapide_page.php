
	<!-- #Content -->
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
                            <?php foreach($page_item as $page): ?>
							<div class="column one-third column_article_box">
								<div class="article_box">
									<a class="has_hover" href="<?php echo base_url().'pages/'.$page['nom']; ?>">
									<div class="photo_mask">
										<img class="scale-with-grid"  src="<?php echo base_url().$page['background']; ?>" alt="Mauris placerat eleifend leo"/>
										<div class="mask">
										</div>
										<span class="button_image more"><i class="icon-link"></i></span>
									</div>
									<div class="desc_wrapper">
										<h4 class="title"><?php echo $page['titre']; ?></h4>
										<hr>
										<div class="desc">
                                        <?php echo $page['soustitre']; ?>
										</div>
									</div>
									</a>
								</div>
                            </div>
<?php endforeach; ?>						
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
		</div>
	</div>
