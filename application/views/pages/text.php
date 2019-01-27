<br>
<div id="Content">
		<div class="content_wrapper clearfix" >
			<!-- .sections_group -->
			<div class="sections_group"> 
      <div class="section pad0" >
					<div class="section_wrapper clearfix">
						<div class="items_group clearfix">
            <div class="column one column_column">
  <?php
  $a = 1;  
  foreach($text_item as $text):
      //récupère le nombre de paragraphe à mettre sur la page
      $nbOfp = 0;
      for($i = 1; $i <= 10; $i++){
          if(!empty($text['pg'.$i])){
              $nbOfp ++;
          }
      }      
      while($a <= $nbOfp){
          if(empty($text['t'.$a])){
            ?>
            <div class="textcenter">
        <?php echo $text['pg'.$a];?></div>
            <?php 
          }else{
            ?>
            <div class="textcenter">
            <h4><?php echo $text['t'.$a];?></h4>
          </div><br>         
            <?php echo $text['pg'.$a];?>          
          <br>
    <?php }
      $a++;}
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
      </div>
	</div>
  </div>
  