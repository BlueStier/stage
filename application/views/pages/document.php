<?php
foreach($doc_item as $doc):
$path = $doc_item['path'];
endforeach;
?>
<div class=container>
<nav class="navbar">
    <div class="container">
    <?php foreach($folder as $f): ?>            
   <div class="nav-item dropdown "> 
    <div class="col-lg-4 col-sm-6 ">
            <a aria-expanded="false"
                class="text-center display-4"
                data-toggle="dropdown"
                href="#"><?php echo $f ?></a>                               
                <div class="dropdown-menu">                               
   <?php
   foreach($file[$f] as $n):
        ?><a class=" dropdown-item"
                   href="<?php echo base_url().$path.'/'.$n;?>"><?php echo $n ?></a><?php
    
   endforeach;
   ?></div></div></div>
   <?php
endforeach;?>
</div></nav></div></div><br><br><br><br>
  