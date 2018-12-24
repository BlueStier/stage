<?php
foreach($doc_item as $doc):
$path = $doc['path'];
$text = $doc['text'];
endforeach;
$folder2 = array_reverse($folder);
?>
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
									<h5 class="title textcenter" ><?php echo $text;?></h5>
									<div class="mfn-acc accordion_wrapper open1st">
                                    <?php foreach($folder2 as $f): ?>
										<div class="question">
											<h5 class='textcenter'><span class="icon"><i class="icon-right-open"></i></span><?php echo $f; ?></h5>
											<div class="answer ">
                                            <?php foreach($file[$f] as $n):?>
                                            <a href="<?php echo base_url().$path.'/'.$f.'/'.$n;?>" target=_blank><?php echo $n ?></a>
                                            <br>
<?php endforeach;?>
											</div>
                                        </div>
                                                   
<?php         
 
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
		</div>
	</div>