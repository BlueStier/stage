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
                                    <?php foreach($folder2 as $i=>$f): ?>
										<div class="question" onclick="window.location.hash='<?php echo $i ?>';">
											<h5 class='textcenter' id="<?php echo $i ?>"><span class="icon"><i class="icon-right-open"></i></span><?php echo $f; ?></h5>
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