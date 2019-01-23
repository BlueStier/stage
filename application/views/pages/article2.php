<!-- #Content -->
<div id="Content">
		<div class="content_wrapper clearfix">

			<!-- .sections_group -->
			<div class="sections_group">
				<div class="section">
					<div class="section_wrapper clearfix">
                    <div class="column one column_divider">
								<hr />
							</div>
							<div class="column one column_column textcenter">
								<h1><?php echo $intro; ?></h1>
							</div>
							
						<div class="column one column_blog">
							<div class="blog_wrapper isotope_wrapper masonry">                            
								<div class="posts_group isotope">
<?php foreach($article_item as $article):  if($article['visible']){?>
									<!-- blog Post -->
									<div class="post-item isotope-item clearfix post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
										<div class="post-meta-modern">											
											<div class="button-comments">
												<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">4</span></a>
											</div>
											
										</div>
										<div class="post-photo-wrapper">
											<div class="post-photo">
												<img width="366" height="250" src="<?php echo base_url().$article['photo']?>" class="scale-with-grid wp-post-image" alt="1"/>
											</div>
										</div>
										<div class="post-desc-wrapper">
											<div class="post-desc">
												<div class="post-title">
													<h4><a href="#"><?php echo $article['titre']?></a></h4>
												</div>
												<div class="post-meta">
													<div class="author">                                                    
                                                    <?php echo $article['jour']?>
													</div>													
													<hr class="hr_narrow hr_left"/>
                                                    <div class="post-excerpt">
													Proin ullamcorper iaculis elit vel faucibus. Suspendisse condimentum quis lectus nec consectetur. Aliquam erat volutpat. Maecenas nec iaculis turpis, eget congue massa. Ut ultrices consectetur eleifend. [&hellip;]
												</div>
												</div>											
												<div class="post-footer">
													<a href='<?php echo base_url()."pages/"?>' class="post-more">En savoir plus</a>													
												</div>
											</div>
										</div>
                                    </div>
                                    <?php } endforeach; ?>
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

