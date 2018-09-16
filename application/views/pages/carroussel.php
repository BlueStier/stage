<?php
foreach($car_item as $car):
  $text = $car["text"];
endforeach;
$size = sizeof($photo_item);
$tab = [];

?>

<div class="container">
<?php echo($text.'<br>'.$path) ; ?> 
<div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12 ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php for($a = 0; $a < $size; $a++){?>
    
  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a ?>" <?php if($a == 0) { ?>class="active" <?php } ?>></li>
    
  <?php } ?>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/site/img/carroussel/test-sans-ttype/pont.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
      <h5>Loïc se prend la tête</h5>
      <p>le dev c vraiment enervant quand ce que l'on veut ne fonctionne pas !!! </p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/site/img/carroussel/pense.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
      <h5>Loïc pense et c effrayant</h5>
      <p>Faut réfléchir fort !!!</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/site/img/carroussel/semimolle.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
      <h5>Loïc est content</h5>
      <p>Semimolle quand on a réussi !!</p>
  </div>
    </div>
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