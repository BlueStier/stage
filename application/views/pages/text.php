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
            <div class="text-center">
        <p><?php echo $text['pg'.$a];?></p><br><br></div>
            <?php 
          }else{
            ?>
            <div class="text-center">
            <h3><?php echo $text['t'.$a];?></h3>
          </div><br>
          <div class="text-left">
            <p><?php echo $text['pg'.$a];?><br></p>
          </div><br>
          <br>
    <?php }
      $a++;}
  endforeach;
  ?>
  </div>