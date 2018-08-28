<div class="container">
    <?php
//récupère dans un array les année présente dans la liste de délibérations sans accepter de doublon
$array = [];
foreach ($deliberations as $deliberations_item):
    if (!in_array($deliberations_item['annee'], $array)) {
        $array[] = $deliberations_item['annee'];
    }
endforeach;
$taille = sizeof($array);
for ($i = 0; $i < $taille; $i++) {
    //On affiche chaque année
    ?>
    <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="section-heading text-uppercase"><?php echo $array[$i]; ?></h1>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
      <?php
//on affiche les infos des délibérations si l'année est égale à celle définie
    foreach ($deliberations as $deliberations_item):
        if (strcmp($deliberations_item["annee"], $array[$i]) == 0) {
            ?>
	           
	        <div class="col-md-4 col-sm-6 portfolio-item">
	          <a class="portfolio-link"
	               href="<?php echo base_url() . $deliberations_item["path_cr"]; ?>">
	          <div class="portfolio-hover">
	            <div class="portfolio-hover-content"></div>
	          </div><img alt="mars 2018"
	               class="img-fluid"
	               src="<?php echo base_url() . $deliberations_item["path_photo"]; ?>"></a>
	          <div class="portfolio-caption text-center">
	            <h5><?php echo $deliberations_item["date"];?></h5>
	          </div>
	        </div>          	      
	          <?php
    }
    
    endforeach;
    ?></div><br><br><br><?php
}?>

</div></div>