<header class="masthead">
    <div class="environnement">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in text-white">
            Environnement
          </div>
        </div>
      </div>
    </div>
  </header>
  <br>
  <div class="container">
  <?php
  //réorganize les données de la table environnement en fonction de l'ordre des articles
  $array=[];
  $taille = sizeof($environnement);  
  foreach($environnement as $environnement_item):
    for($i = 1; $i <= $taille; $i++){
        if($environnement_item["ordre"]==$i){
            $array[$i] = $environnement_item;
        }
    }
  endforeach;
  //affiche les données réorganizées
  $tailleArray = sizeof($array);
  for($a = 1;$a<=$tailleArray;$a++){
      //vérifie que le titre de l'article est "titre" pour afficher l'intro
      if(strcmp($array[$a]["titre"],"titre")==0){
        ?>
        <div class="text-center">
    <p><?php echo $array[$a]["article"]?></p><br><br></div>
        <?php 
      }
      else{?>
      <div class="text-center">
      <h3><?php echo $array[$a]["titre"]?></h3>
    </div><br>
    <div class="text-left">
      <p><?php echo $array[$a]["article"]?><br></p>
    </div><br>
    <br>
      <?php }
      ?>
    
    <?php }
    ?></div>