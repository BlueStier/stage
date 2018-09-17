<?php
foreach($car_item as $car):
  $text = $car["text"];
endforeach;
$size = sizeof($photo_item);
?>

<div class="container">
<div class='text-center'>
<?php echo($text); ?>
</div>
<br>
<div class="row justify-content-center">
      <div class="col-lg-6 col-sm-12 ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php for($a = 1; $a <= $size; $a++){?>
    
  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a ?>" <?php if($a == 1) { ?>class="active" <?php } ?>></li>
    
  <?php } ?>
  </ol>
  <div class="carousel-inner">
  <?php foreach($photo_item as $k=>$p):
  if($k == 1){
    ?>
    <div class="carousel-item active">
    <img class="d-block w-100 " src="<?php echo base_url().$path.'/'.$p?>" alt="photo <?php echo $k; ?>">    
  </div>
  <?php } else{
     ?>
     <div class="carousel-item">
     <img class="d-block w-100 " src="<?php echo base_url().$path.'/'.$p?>" alt="photo <?php echo $k; ?>">    
   </div>
   <?php }    
    endforeach; ?>
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
<div class="row justify-content-center">
      <div class="col-lg-3 col-sm-12 ">
<button id = 'v' class='btn btn-primary' onClick='voir(true);'>Voir toutes les photos</button>
<button id = 'c' class='btn btn-primary' onClick='voir(false);'>Cacher les photos</button>
</div>
</div>
<br>
<div id='photo'>
<br>
<div class='row'>
<?php foreach($photo_item as $k=>$p): ?>
<div class="col-lg-2 col-sm-3 ">
<a href="<?php echo base_url().$path.'/'.$p?>" onclick="window.open(this.href); return false;"><img class="d-block w-100 bordure" src="<?php echo base_url().$path.'/'.$p?>" alt="photo <?php echo $k; ?>"></a><br>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
<script>
  document.getElementById('photo').style.display='none';
  document.getElementById('c').style.display='none';
  function voir(voir){
    if(voir) {
      document.getElementById('photo').style.display='block';
    document.getElementById('c').style.display='block';
    document.getElementById('v').style.display='none';
    }else{
      document.getElementById('photo').style.display='none';
    document.getElementById('c').style.display='none';
    document.getElementById('v').style.display='block';
    }      
  } 
</script>