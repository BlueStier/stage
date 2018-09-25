<?php
$tab =[];
foreach($home_item as $home):
$intro = $home['intro'];

for($i = 1;$i<=5;$i++){
    if(!empty($home['photo'.$i])){
    $tab['slide'.$i] = [
                        'photo' => $home['photo'.$i],
                        'path' => $home['path'.$i],
                        'title' => $home['title'.$i],
                        'p' => $home['p'.$i]
                    ];

}
};
endforeach;
$size = sizeof($tab);
?>
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
      <?php echo $intro ?>
      </div>
      </div>
<div class="row justify-content-center">
<div class="col-lg-6 col-sm-12 ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">  
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <?php /*on affiche le nombre de slide*/ 
    for($a = 1; $a < $size; $a++){?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a; ?>"></li>
    <?php } ?>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="<?php echo base_url().$tab['slide1']['path']; ?>"><img class="d-block w-100" src="<?php echo base_url().$tab['slide1']['photo']; ?>" alt="First slide"></a>
      <div class="carousel-caption d-none d-md-block">
      <h5><?php echo $tab['slide1']['title']; ?></h5>
      <p><?php echo $tab['slide1']['p']; ?></p>
  </div>
    </div>
    <?php /*on affiche les autres slides*/ 
    for($b = 2; $b <= $size; $b++){?>
    <div class="carousel-item">
        <a href="<?php echo base_url().$tab['slide'.$b]['path']; ?>"><img class="d-block w-100" src="<?php echo base_url().$tab['slide'.$b]['photo']; ?>" alt="First slide"></a>
        <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $tab['slide'.$b]['title']; ?></h5>
        <p><?php echo $tab['slide'.$b]['p']; ?></p>
  </div>
    </div>
    <?php } ?>   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
</div>
</div>
</div>
<br>
  
   
  
    
 