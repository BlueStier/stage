<?php //récupération des données à modif
foreach ($page_item as $p):
$id_page = $p['id_pages'];
$nom_page = $p['nom'];
$titre_page = $p['titre'];
$st_page = $p['soustitre'];
$back = $p['background'];
$type_page = $p['type'];
$path = 'pages/'.$p['nom'].'/';
endforeach;
?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier la page : <?php echo $nom_page; ?></h3>
              <small>   Page du type : <?php echo $type_page; ?></small>
            </div>
</div>
<?php //var_dump($text_item); ?>
<!-- Pour tous type de pages définition de la photo de background, titre et soustitre (facultatif) -->
<div class="form-horizontal">
<div class="box-body">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/validUpPage/'.$id_page);?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nom de la page</label>
                  <div class="col-sm-10">
                  <input type='hidden' name='selty' value="<?php echo $type_page; ?>"/>
                  <input type='hidden' name="nomPage" value="<?php echo $nom_page; ?>"/>
                  <input class="form-control" name="nomPage1" placeholder="<?php echo $nom_page; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrePage' placeholder="<?php echo $titre_page; ?>">
                  </div>
                  </div>
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Sous-titre</label>
                  <div class="col-sm-10">
                    <input class="form-control" name='soustitrePage' placeholder="<?php if($st_page != ''){ echo $st_page;}else{ ?>Entrez le sous-titre de la page (facultatif)<?php } ?>">
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Souhaitez concervez cette photo ?</label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$back ?>'/>
                <div class="col-sm-2">
                <input type="radio" name='radioP' onClick='visibleP(true);' value="Non" >Non     
                </div>
                <div class="col-sm-2">
                <input type="radio" name='radioP' onClick='visibleP(false);' value="Oui"checked>Oui     
                </div>                                
                </div>
        <div id="choixPhoto" class="form-group">
          <label class="col-sm-2 control-label">Choisir une autre image</label>
          <div class="col-sm-10">
            <input id="exampleInputFile"
                 name="back2"
                 type="file"
                 value='Choisissez une image'>
          </div>
        </div>
         <?php /*Si la page est du type text*/
         
         if($type_page == 'text'){ 
           /* on récupère le nb de paragraphe*/
         $nbParaf = 0;
         foreach ($text_item as $t):
            for ($i = 1;$i <= 10; $i++){
            if( !empty($t['pg'.$i])){
                $nbParaf++; 
            }
            }
         endforeach;  
             ?> 
         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Page du type text de <?php  echo $nbParaf; ?> paragraphe(s)</h3>              
            </div>
            </div>                     
                <?php  for($b = 1; $b <= $nbParaf; $b++){?>
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du paragraphe <?php  echo $b; ?></label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t<?php  echo $b; ?>' value='<?php echo $text_item[0]["t".$b]; ?>'>
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg<?php  echo $b; ?>" class="ckeditor" rows="10" cols="80">
                    <?php echo $text_item[0]["pg".$b]; ?>
                    </textarea>            
            </div>
            <?php  } ?>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Les paragraphes suivants sont facultatifs s'ils ne sont pas remplis ils n'apparaîtront pas sur le site</h3>              
            </div>
            </div>
            <?php  for($c = $nbParaf+1; $c <= 10; $c++){?>
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du paragraphe <?php  echo $c; ?></label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t<?php  echo $c; ?>' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg<?php  echo $c; ?>" class="ckeditor" rows="10" cols="80">                    
                    </textarea>            
            </div>
            <?php  } ?>        
          <?php } ?>
             
               <!-- fin Div text -->
               <?php /*Si la page est du type carroussel*/if($type_page == 'carroussel'){ ?>       
            <label class="col-sm-5 control-label">Page du type carroussel </label><br><br>
                
                <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de photos :</label>
                <div class="col-sm-10">                
                <select id="selectcar" name ="selectcar" onchange='addElement();' class="form-control select2" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                </select>
                </div>
                </div>
                <div id="car1">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisir une image </label>
                  <div class="col-sm-10">
                  <input type="file" name="photocar1" id="exampleInputFile" value='Choisissez une image'>
                </div>
                </div>
                </div>
                </div>
                <?php } ?>
                 <!-- Div pour création d'un page du type bulle -->
                 <?php /*Si la page est du type bulle*/
                 if($type_page == 'bulle'){ 
                    /* on récupère le nb de bulles*/
                    $nbBu = 0;
                    foreach ($bulle_item as $b):
                        for ($i = 1;$i <= 10; $i++){
                            if( !empty($b['tx'.$i])){
                                $nbBu++; 
                            }
                        }
                    endforeach;  
                     ?>       
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Page du type bulle de <?php  echo $nbBu; ?> bulle(s)</h3>              
            </div>
            </div>                          
                <div class="form-group">
                <input type="hidden" value="<?php echo $nbBu ?>" name="nbBu"/>
                  <label class="col-sm-2 control-label">Texte d'intro</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrebulle' placeholder="<?php if($bulle_item[0]['titre'] != ''){ echo $bulle_item[0]['titre'];}else{ ?>Entrez le texte d'intro (facultatif)<?php } ?>">
                  </div>
                  </div>
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Sous-texte d'intro</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='soustitrebulle' placeholder="<?php if($bulle_item[0]['soustitre'] != ''){ echo $bulle_item[0]['soustitre'];}else{ ?>Entrez le sous-texte d'intro (facultatif)<?php } ?>">
                  </div>
                </div>
                <?php  for($d = 1; $d <= $nbBu; $d++){
                  //si la bulle n'est pas la première on permet de la sup^
                    if($d != 1){
                    ?>               
                    <h4>bulle n° <?php  echo $d; ?>     <a type="button" class="marge btn btn-danger"  href="<?php echo base_url()?>cms/supBulle/<?php echo $d."/".$id_page?>"><i class="fa  fa-warning"></i> Supprimer</a>
                    <i class="fa fa-exclamation-triangle text-red"></i> Cette opération sera irréversible !</h4>
                    <?php } ?>
                  <div class="form-group">
                  <div class="col-sm-3">                                    
                <label>Souhaitez concervez cette photo ?</label>
                <div class="form-group">
                <div class='col-sm-2'></div>
                <img class='col-sm-8' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:50px;" src='<?php echo base_url().$bulle_item[0]["photo".$d] ?>'/>
                <div class="col-sm-1">
                <input type="radio" name='radio<?php  echo $d; ?>' onClick='visible<?php  echo $d; ?>(true);' value="Non" >Non     
                </div>
                <div class="col-sm-1">
                <input type="radio" name='radio<?php  echo $d; ?>' onClick='visible<?php  echo $d; ?>(false);' value="Oui"checked>Oui     
                </div>                                
                </div>
           <div id="photo<?php  echo $d; ?>">     
          <label class="col-sm-12 control-label">Choisir une autre image</label>
          <div class="col-sm-12">
            <input id="exampleInputFile"
                 name="photo<?php  echo $d; ?>"
                 type="file"
                 value='Choisissez une image'>
          </div>
                </div>
                </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte <?php  echo $d; ?></label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx<?php  echo $d; ?>" class="ckeditor" rows="10" cols="80">
                    <?php echo $bulle_item[0]["tx".$d]; ?>                                           
                    </textarea>
                    </div>
            </div>
          </div>         
          <script>
          document.getElementById('photo<?php  echo $d; ?>').style.display='none';
          function visible<?php  echo $d; ?>($choix){
                ($choix ? document.getElementById('photo<?php  echo $d; ?>').style.display='block' : document.getElementById('photo<?php  echo $d; ?>').style.display='none'); 
            }
          </script>
          <?php } ?>
          
          <div class="form-group">
          <label class="col-sm-3 control-label">Saisissez le texte supplémentaire (facultatif) </label>
          <br>          
          <div class="col-sm-12 box-body pad">            
                    <textarea id="editor" name="sup" class="ckeditor" rows="10" cols="80">
                    <?php echo $bulle_item[0]["sup"]; ?>                                            
                    </textarea>
                    </div>
          
          </div>
          
          <?php } ?>
                <!-- fin Div -->
                <!-- Div pour création d'un page sans type -->
                <?php /*Si la page est sans type */if($type_page == 'sans'){ ?>       
                <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Page sans type</h3>              
            </div>
            </div>
                <label class="center">Veuillez tapper votre texte</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="sans" class="ckeditor" rows="100" cols="80"> 
                    <?php echo $sans_item[0]["pg1"]; ?>
                    </textarea>
             
            </div>
            <?php } ?>
                 <!-- Div pour création d'un page d'articles -->
                 <?php /*Si la page est du type article*/if($type_page == 'article'){ ?>       
                    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Page du type article</h3>              
            </div>
            </div>
                 <label class="center">Veuillez tapper votre texte (facultatif)</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="article" class="ckeditor" rows="100" cols="80">
                    <?php echo $art_item[0]["text"]; ?>                                            
                    </textarea>
             
            </div>
            <?php } ?>
               <!-- fin Div -->
               <!-- fin Div -->
               <!-- table des menus -->
              <!-- box-header -->
              <div id="table"> 
               <div class="box">
            <div class="box-header">
              <h3 class="box-title">Choisissez le(s) menu(s) à liéer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les menus -->
                <thead>
                <tr>
                  <th>Menus</th>                                                     
                </tr>
                </thead>
                <tbody>
                <tr>                
                <?php foreach($header_item as $header): ?>
                <td><input type='checkbox' name="menu2[]" value="<?php /* affiche le nom du menu */ echo $header['nom'] ?>"
                <?php /* si menu lier à cette page on check */ if($header['path'] == $path){ echo "checked";} ?>>
                <?php /* affiche le nom du menu */ echo "  ".$header['nom'] ?></td>
              <?php endforeach; ?>                                  
                </tr>
                </tbody>                
              </table>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les sous-menus -->
                <thead>
                <tr>
                  <th>Sous-menus</th>                                                     
                </tr>
                </thead>
                <tbody>                               
                <?php
                $taille = sizeof($sub_item);                
                $b = 0;
                $d = 0;
                $c = $b+6;
                while($d < $taille){
                  ?><tr><?php 
                  while($b < $c){
                  ?><?php          
                  foreach($sub_item as $k=>$sub):
                                   
                    if($k == $b){
                ?>                
                <td><input type='checkbox' name="sousmenu2[]" value="<?php /* affiche le nom du sous-menu */ echo $sub['nom'] ?>"
                <?php /* si menu lier à cette page on check */ if($sub['path'] == $path){ echo "checked";} ?>>
                <?php /* affiche le nom du sous-menu */ echo "  ".$sub['nom'] ?></td>
                    <?php }          
              
                endforeach;
                $b++; }
                $c = $b+6;
                ?></tr><?php
                $d++; } ?> 
                                         
                </tbody>                
              </table>
              <table id="example1" class="table table-bordered table-striped">
                <!-- affiche les 3ème niveau -->
                <thead>
                <tr>
                  <th>3ème niveau</th>                                                     
                </tr>
                </thead>
                <tbody>                               
                <?php
                $taille1 = sizeof($sub_item);                
                $b1 = 0;
                $d1 = 0;
                $c1 = $b1+6;
                while($d1 < $taille){
                  ?><tr><?php 
                  while($b1 < $c1){
                  ?><?php          
                  foreach($third_item as $k1=>$thi):
                                   
                    if($k1 == $b1){
                ?>                
                <td><input type='checkbox' name="third2[]" value="<?php /* affiche le nom du 3ème niveau */ echo $thi['nom'] ?>" 
                <?php /* si menu lier à cette page on check */ if($thi['path'] == $path){ echo "checked";} ?>>
                <?php /* affiche le nom du 3ème niveau */ echo "  ".$thi['nom'] ?></td>
                    <?php }          
              
                endforeach;
                $b1++; }
                $c1 = $b1+6;
                ?></tr><?php
                $d1++; } ?> 
                                         
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->    
        </div>   
              

               <!-- /.box-body -->
               <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/4">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
              </div>
              </div>
               
              <!-- /.box-footer -->
</div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>
  
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>


<!-- ./wrapper -->
<script>
document.getElementById("choixPhoto").style.display ='none';


function addElement () {
 // crée un nouvel élément div 
 var newDiv = document.createElement("div"); 
  // et lui donne un peu de contenu 
  var newContent = document.createTextNode("Hi there and greetings!"); 
  // ajoute le noeud texte au nouveau div créé
  newDiv.appendChild(newContent);  

  // ajoute le nouvel élément créé et son contenu dans le DOM 
  var currentDiv = document.getElementById("div1"); 
  document.body.insertBefore(newDiv, currentDiv); 
}



function visibleP($choix){
  ($choix ? document.getElementById('choixPhoto').style.display='block' : document.getElementById('choixPhoto').style.display='none'); 
}


</script>