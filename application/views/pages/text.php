<br>
  <div class="container">
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
<a href="<?php echo base_url().$path_doc;?>" target="blank"><?php echo $intro_doc;?> </a>
<?php
  }
  ?>

  </div>