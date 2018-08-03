<header class="masthead">
    <div class="elus">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">
            Les Elus
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
<?php
$i = 0;
//affiche les élus avec photos, nom,prénom et fonction en alternance droite/gauche 1 sur 2
foreach ($elus as $elus_item):
    if (($elus_item['delegue'] == false) && ($elus_item['municipaux'] == false)) {
        if (($i % 2) == 0) {
            ?><li><?php
    } else {
            ?><li class="timeline-inverted"><?php
    }
        ?>
				                <div class="timeline-image"><img alt="<?php echo $elus_item['prenom'] . " " . $elus_item['nom']; ?>"
				                 class="rounded-circle img-fluid"
				                 src="<?php echo base_url() . $elus_item['path_photo']; ?>"></div>
				                <div class="timeline-panel">
				                <div class="timeline-body">
				                <h2 class="timeline-heading"><?php echo $elus_item['prenom'] . " " . $elus_item['nom']; ?></h2>
				                <h4 class="text-muted"><?php echo $elus_item['fonction']; ?></h4>
				                </div>
				                </div>
				          </li>
				<?php
    $i++;}
endforeach;?>
            </ul>
        </div>
        </div>
  </div>
  <br>
  <br>
  <br>
  <div class="text-center">
    <h3>Les conseillers délégués :</h3>
    <br>
    <div class="row">
<?php
//affiche les délégués nom, prénom et fonction en 3 colonnes
$a = 0;
foreach ($elus as $elus_item):
    if (($elus_item['delegue'] == true)) {
        if ($a < 3) {            
            ?>
				                <div class="col-lg-4">
				        <h6><?php echo $elus_item['prenom'] . " " . $elus_item['nom']; ?></h6><?php echo $elus_item['fonction']; ?>
				      </div><?php
    $a++;            
        } ?><br><?php
    $a = 0;                  
    }
endforeach;?>
</div>
</div>
<br>
  <br>
  <br>
  <div class="text-center">
    <h3>Les conseillers municipaux :</h3>
    <br>
    <div class="row">
    <?php
//affiche les conseilliers municipaux nom et prénom par trois en 3 colonnes
$b=0;
foreach ($elus as $elus_item):
    if (($elus_item['municipaux'] == true)) {
        ?><div class="col-lg-4"><?php
        if($b < 4){
            ?><?php echo $elus_item['prenom'] . " " . $elus_item['nom']; ?><br><?php
            $b++;
        }?></div><?php
       $b=0; 
    }    
endforeach;?>    
</div>
</div>

