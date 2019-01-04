
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
                            <?php foreach($personnaes_item as $person): ?>
							<div class="column one column_article_box">
								<div class="article_box" style='width:100%'>
									<a class="has_hover" style='width:100%' href="<?php echo base_url().'pages/acces_rapide/'.$person['id_personnae']; ?>">
									<div class="photo_mask">
										<img class="scale-with-grid" style='width:100%' src="<?php echo base_url().$person['background']; ?>" alt=""/>
										<div class="mask" >
										</div>
										<span class="button_image more"><i class="icon-link"></i></span>
									</div>
									<div class="desc_wrapper" >
										<h4 class="title" ><?php echo $person['nom']; ?></h4>
										<hr>
										
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
