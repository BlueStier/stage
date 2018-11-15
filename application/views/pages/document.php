<?php
foreach($doc_item as $doc):
$path = $doc['path'];
$text = $doc['text'];
endforeach;
$nb = 12/sizeof($folder);
?>
<div class = "container">
<?php echo $text;?>

<div class="row">				
    <?php foreach($folder as $f): ?>
    <a class="col-lg-3 col-md-6 col-xs-12"href="" onmouseover="seeDoc(<?php echo $f; ?>);" ><h1><?php /* affiche le nom du menu */ echo $f; ?></h1></a>
	                
   <?php
    endforeach;  
   ?>
         </div>            
           <?php foreach($folder as $f):
           ?> <div class="back_menu" id='<?php echo $f; ?>'> 
           <div class="container">		
		<div class="row">		
           <?php 
   foreach($file[$f] as $n):
    ?><a class="col-md-3 text_center text-white " 
    href="<?php echo base_url().$path.'/'.$f.'/'.$n;?>" target=_blank><?php echo $n ?></a><?php
    
   endforeach;
   ?> </div></div></div><?php
endforeach;
   ?>
		</div>
<script>
function invisibledoc(){
 <?php foreach($folder as $f):
 echo "document.getElementById(".$f.").style.display = 'none';";
  endforeach;
  ?>
}
document.body.onload = invisibledoc();

function seeDoc(id){
		invisibledoc();
		document.getElementById(id).style.display='block' ;
	}
</script>
       

  