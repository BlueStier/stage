<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      <?php
    $a = 1;     
      foreach ($bulle_item as $bulle):
        //récupère le nombre de bulle à mettre sur la page
        $nbOfTx = 0;
        for($i = 1; $i <= 10; $i++){
            if(! empty($bulle['tx'.$i])){
                $nbOfTx ++;
            }
        }                  
        //affiche les données transmises par le controlleur
        ?>      
      <h2 class="section-heading text-uppercase"><?php echo $bulle['titre']; ?></h2>
        <h3 class="section-subheading text-muted"><?php echo $bulle['soustitre']; ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
        <?php      
        while($a <= $nbOfTx){
            if (($a % 2) == 0) {
                ?><li><?php
                } else {
                ?><li class="timeline-inverted"><?php
                }
            ?>        
            <div class="timeline-image"><img alt=""
                 class="rounded-circle img-fluid"
                 src="<?php echo base_url() . $bulle['photo'.$a]; ?>"></div>
            <div class="timeline-panel">
              <div class="timeline-body">                
                  <p class="text-muted"><?php echo $bulle['tx'.$a]; ?></p>
                </div>
              </div>            
          </li>
          <?php $a++;
        }
        ?>
        </ul>
        </div>
        </div>
        </div>
        <?php        
        //si il y a un texte suplémentaire
        if (!empty($bulle['sup'])){?>
            <br>
            <br>
            <br>
            <div class="text-center">
                <?php echo $bulle['sup']; ?>
            </div>
            <?php         
         }
     endforeach;?> 
     