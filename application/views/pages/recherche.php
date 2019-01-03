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
								<h1>Résultat pour la recherche : <?php echo $search; ?></h1>
							</div>
							<?php if(empty($pages_item)){ ?>
<div class="column one column_column textcenter">
<h3> Désolé, nous n'avons pas trouvé de correspondance avec les critères de recherches.</h3>
</div>
<?php }else{ ?>
						<div class="column one column_blog">
							<div class="blog_wrapper isotope_wrapper masonry">                            
								<div class="posts_group isotope">
<?php foreach($pages_item as $pages) : ?>
									<!-- blog Post -->
									<div class="post-item isotope-item clearfix post-519 post type-post status-publish format-standard has-post-thumbnail hentry category-motion tag-css3 tag-framework tag-wordpress">
										<div class="post-meta-modern">											
											<div class="button-comments">
												<a href="#"><span class="icons-wrapper"><i class="icon-comment-empty-fa"></i><i class="icon-comment-fa"></i></span><span class="label">4</span></a>
											</div>
											
										</div>
										<div class="post-photo-wrapper">
											<div class="post-photo">
												<img width="366" height="250" src="<?php echo base_url().$pages['background']?>" class="scale-with-grid wp-post-image" alt="1"/>
											</div>
										</div>
										<div class="post-desc-wrapper">
											<div class="post-desc">
												<div class="post-title">
													<h4><a href="#"><?php echo $pages['titre'];?></a></h4>
												</div>
												<div class="post-meta">
													<div class="author">
                                                    <?php echo $pages['soustitre'];?>
													</div>													
													<hr class="hr_narrow hr_left"/>
												</div>											
												<div class="post-footer">
													<a href='<?php echo base_url()."pages/".$pages['nom']?>' class="post-more">En savoir plus</a>													
												</div>
											</div>
										</div>
                                    </div>
                                    <?php endforeach; ?>
								</div>
							</div>
						</div>
							<?php } ?>
					</div>
				</div>
			</div>
