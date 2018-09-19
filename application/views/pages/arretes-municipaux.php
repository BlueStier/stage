<div class=container>
<nav class="navbar">
    <div class="container">
             
  <?php
//récupère dans un array les année présente dans la liste de délibérations sans accepter de doublon
$array = [];
foreach ($arretes as $arretes_item):
    if (!in_array($arretes_item['annee'], $array)) {
        $array[] = $arretes_item['annee'];
    }
endforeach;
$taille = sizeof($array);
for($i = 0;$i < $taille;$i++){        
    ?>

    <div class="nav-item dropdown ">
    
    <div class="col-lg-4 col-sm-6 ">
            <a aria-expanded="false"
                class="text-center display-4"
                data-toggle="dropdown"
                href="#"><?php echo $array[$i] ?></a>                               
                <div class="dropdown-menu">                               
   <?php
   foreach ($arretes as $arretes_item):
    if (strcmp($arretes_item["annee"], $array[$i]) == 0) {
        $str = substr($arretes_item["path"],28);
        ?><a class=" dropdown-item"
                   href="<?php echo base_url().$arretes_item["path"];?>"><?php echo $str ?></a><?php
    }
   endforeach;
   ?></div></div></div><?php
}?></ul></div></nav></div></div><br><br><br><br>