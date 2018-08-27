<div class="container">  
  <?php
  //réorganize les données de la table histoire en fonction de l'ordre des articles
  $array=[];
  $taille = sizeof($histoire);  
  foreach($histoire as $histoire_item):
    for($i = 1; $i <= $taille; $i++){
        if($histoire_item["ordre"]==$i){
            $array[$i] = $histoire_item;
        }
    }
  endforeach;

  //affiche les données réorganizées
  $tailleArray = sizeof($array);
  for($a = 1;$a<=$tailleArray;$a++){?>
  <div class="text-center">
      <h3><?php echo $array[$a]["titre"]?></h3>
  </div><br>
     <div class="text-left">
      <p><?php echo $array[$a]["article"]?></p>
    </div><br>
    <br>
  <?php }
  ?></div>