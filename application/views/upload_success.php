<html>
 <head>
 <title> Upload Form </title>
 </head>
 <body>

 <h3> Your file was successfully uploaded !</h3>

 <?php 
 echo $id;
 if(sizeof($menu)>0){
 foreach($menu as $nom):
 echo $nom."<br>";
 endforeach; }?>

 </body>
 </html>