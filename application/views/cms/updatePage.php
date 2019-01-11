<?php //récupération des données à modif
foreach ($page_item as $p):
$id_page = $p['id_pages'];
$nom_page = $p['nom'];
$titre_page = $p['titre'];
$st_page = $p['soustitre'];
$back = $p['background'];
$type_page = $p['type'];
$path = 'pages/'.$p['nom'].'/';
$path_doc = $p['path_doc'];
$intro_doc = $p['intro_doc'];
endforeach;
$year = date('Y');
?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Modifier la page : <?php echo $nom_page; ?></h3>
              <small>   Page du type : <?php echo $type_page; ?></small>
            </div>
</div>
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
                <label class="col-sm-2 control-label">Concerver cette photo ?</label>
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
               <?php /*Si la page est du type carroussel*/if($type_page == 'carroussel'){ 
                 //récupération des infos
                 foreach($car_item as $car):
                  $intro = $car['text'];
                  $text = $car['text2'];
                  $path = $car['path'].'/';
                  $path0 = $car['path'];                  
                 endforeach;
                 $size = sizeof($photo);
                 ?>       
            <label class="col-sm-5 control-label">Page du type carroussel </label><br><br>                
            <div class="form-group">
            <input type=hidden name='oldPath' value='<?php echo $path0 ?>'/>
                <label class="col-sm-2 control-label">Texte d'intro (facultatif)</label>
                  <div class="col-sm-10">
                  <textarea id="editor" name="textcar" class="ckeditor" rows="10" cols="80">
                    <?php echo $intro; ?>                                            
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Texte (facultatif) </label>
                  <div class="col-sm-10">
                  <textarea id="editor" name="textsupfac" class="ckeditor" rows="10" cols="80">
                  <?php echo $text; ?>                                             
                    </textarea>
                  </div>
                </div>
                  <br>
                  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Photos présentent dans le carroussel</h3>              
            </div>
                </div>
                  <?php foreach($photo as $p):?>
                  <div class='col-sm-3'>
                   <img style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:200px;" src='<?php echo base_url().$path.$p ?>'/><br>
                    <?php if($size > 1){ ?>
                   <a type="button" class="text-center btn btn-danger"  href="<?php echo base_url()?>cms/supPhoto/<?php echo $id_page.'/'.$p?>"><i class="fa  fa-warning"></i> Supprimer la photo</a>
                    <?php } ?>
                </div> 
                  <?php endforeach; ?>
                </div>              
                <br>
                <div class="form-group">
                <label class="col-sm-4 control-label">Souhaitez ajouter des photos ?</label>                
                <div class="col-sm-4">
                <input type="radio" name='radioC' onClick='visibleC(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm-4">
                <input type="radio" name='radioC' onClick='visibleC(true);' value="Oui">Oui     
                </div>                                
                </div>                
                <br>
                <div id='ajoutCar'>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos images </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="car2[]" id="exampleInputFile" value='Choisissez des images' multiple='multiple'>
                </div>
                </div>  
                </div>
                <script>
                document.getElementById("ajoutCar").style.display ='none';
                </script>          
                <?php } 
                ?>
                 <!-- Div pour update d'un page du type bulle -->
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
                <input type="hidden" value="<?php echo $nbBu ?>" name="nbBu" />
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
                    <?php } else {?>
                      <h4>bulle n° <?php  echo $d; ?></h4>
                      <?php } ?>
                      <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle n° <?php  echo $d; ?></label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt<?php  echo $d; ?>' value="<?php echo $bulle_item[0]["trt".$d]; ?>">
                  </div>
                </div>
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
          <div class="box box-info">
            <div class="box-header with-border">
            <div class='container'><div class='form-group'>
                   <div class="col-sm-6"><h3 class='box-title'>Souhaitez-vous ajouter des bulles ?</h3></div>
                   <div class="col-sm-3">
                <input type="radio" name='radioPlusBulle' onClick='visibleBulle(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm">
                <input type="radio" name='radioPlusBulle' onClick='visibleBulle(true);' value="Oui">Oui     
                </div> 
                  </div></div>              
            </div>
            </div>
            <div id='plusbulle'>
            <input id="nbBu" type='hidden' value="<?php echo $nbBu+1; ?>" name='nbBui'/> 
            <div id="bulle2">
            <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 2</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt2' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 2 </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx2" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 2 </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo2" id="exampleInputFile" value='Choisissez une image'>
                  </div>
          </div>
          </div>
          <div id="bulle3">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 3</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt3' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 3</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo3" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 3 </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx3" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle4">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 4</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt4' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 4</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx4" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 4</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo4" id="exampleInputFile" value='Choisissez une image'>
                  </div>
          </div>
          </div>
          <div id="bulle5">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 5</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt5' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 5</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo5" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 5</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx5" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle6">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 6</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt6' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 6</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx6" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 6</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo6" id="exampleInputFile" value='Choisissez une image'>
                  </div>
          </div>
          </div>
          <div id="bulle7">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 7</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt7' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 7</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo7" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 7</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx7" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle8">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 8</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt8' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 8</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx8" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 8</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo8" id="exampleInputFile" value='Choisissez une image'>
                  </div>
          </div>
          </div>
          <div id="bulle9">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 9</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt9' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 9</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo9" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 9</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx9" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle10">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la bulle 10</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='strt10' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le texte 10</label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="stx10" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            <div class="col-sm-3">
                  <label class="control-label">Choisir l'image 10</label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo10" id="exampleInputFile" value='Choisissez une image'>
                  </div>
          </div>
          </div>
          <div id='plusBu' type="button" class="btn btn-default" onClick="addBulle(true);">Ajouter une bulle</div>
                <div id='moinsBu' type="button" class="btn btn-default" onClick="addBulle(false);">Enlever une bulle</div>
            </div>
            <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la zone de texte supplémentaire</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trtsup' value="<?php echo $bulle_item[0]["trtsup"]; ?> ">
                  </div>
                </div>            
          <div class="form-group">
          <label class="col-sm-3 control-label">Saisissez le texte supplémentaire (facultatif) </label>
          <br>          
          <div class="col-sm-12 box-body pad">            
                    <textarea id="editor" name="sup" class="ckeditor" rows="10" cols="80">
                    <?php echo $bulle_item[0]["sup"]; ?>                                            
                    </textarea>
                    </div>
          
          </div>
          <script>
                document.getElementById("plusbulle").style.display ='none';                
                </script>
          <?php } ?>
                <!-- fin Div -->
                <!-- Div pour update d'un page sans type -->
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
                 <!-- Div pour update d'un page d'articles -->
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
               <?php if($type_page == 'document'){
                  foreach($doc_item as $doc):
                    $intro = $doc['text'];
                    $path = $doc['path'].'/';
                    $path0 = $doc['path'];                  
                   endforeach;
                   $nbY = sizeof($folder);
                ?>                                
                <div class="form-group">
                <label class="col-sm-2 control-label">Texte d'intro (facultatif)</label>
                  <div class="col-sm-10">
                  <textarea id="editor" name="textdoc" class="ckeditor" rows="10" cols="80">
                  <?php echo $intro; ?>                                            
                    </textarea>
                  </div>
                </div>
                <input type='hidden' name='sizeinitiale' value='<?php echo $nbY ?>'/>
                <?php foreach($folder as $f):?>
                <div class="box box-info">
            <div class="box-header with-border">
            <div class='container'><div class='form-group'>
                   <div class="col-sm-6"><h3 class='box-title'>Année : <?php echo $f ?></h3></div><a type="button" class="col-sm-6 btn btn-danger"  href="<?php echo base_url()?>cms/supDoc/<?php echo $id_page.'/'.$f ?>"><i class="fa  fa-warning"></i> Supprimer l'année et tous ses documents</a>
                  </div></div>              
            </div>
            </div>
            <div class='container'>
            <?php foreach($file[$f] as $n):
              $nom = utf8_encode($n);?>
                   <div class='form-group'>
                   <div class="col-sm-6">
                  <?php echo $nom;?>
                  </div>
                  <input type=hidden name='oldPath' value='<?php echo $path0 ?>'/>
                  <div class="col-sm-2"></div>
                  <a type="button" class="col-sm-2 btn btn-danger"  href="<?php echo base_url()?>cms/supDoc/<?php echo $id_page.'/'.$f.'/'.$n?>"><i class="fa  fa-warning"></i> Supprimer le document</a>
                  </div>                  
                 <?php endforeach;?>
                 <div class="row"> 
                 <label class="col-sm-6">Souhaitez vous rajouter des documents à cette année ?</label>
                 <div class="col-sm-3">
                <input type="radio" name='radio<?php echo $f; ?>' onClick='visible<?php echo $f; ?>(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm-3">
                <input type="radio" name='radio<?php echo $f; ?>' onClick='visible<?php echo $f; ?>(true);' value="Oui">Oui     
                </div>
                </div>
                <br>                
                <div class="row"  id="file<?php echo $f; ?>"> 
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc<?php echo $f; ?>[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                  </div>
                </div> 
                </div>                                            
                 <br>
                 <script>
                      document.getElementById('file<?php echo $f; ?>').style.display='none';
                      function visible<?php echo $f; ?>($choix){
                        ($choix ? document.getElementById('file<?php  echo $f; ?>').style.display='block' : document.getElementById('file<?php  echo $f; ?>').style.display='none'); 
            }
          </script>
             <?php endforeach; ?>
             <div class="box box-info">
            <div class="box-header with-border">
            <div class='container'><div class='form-group'>
                   <div class="col-sm-6"><h3 class='box-title'>Souhaitez-vous ajouter des années ?</h3></div>
                   <div class="col-sm-3">
                <input type="radio" name='radioPlusAn' onClick='visibleAn(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm">
                <input type="radio" name='radioPlusAn' onClick='visibleAn(true);' value="Oui">Oui     
                </div> 
                  </div></div>              
            </div>
            </div>
            <div id="an">
             <input id="nbY" type='hidden' value="<?php echo $nbY+1 ?>" name='nbY'/>                           
                <div id='doc2'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear2" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc2[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc3'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear3" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc3[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc4'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear4" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc4[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc5'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear5" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc5[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc6'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear6" class="form-control select2" >
                <?php 
                  for($e = 2000; $e <= 2050; $e++){
                    if(!in_array($e,$folder)){?>                
                    <option><?php echo $e; ?></option>
                  <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc6[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc7'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear7" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc7[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc8'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear8" class="form-control select2" >
                <?php 
                  for($e = 2000; $e <= 2050; $e++){
                    if(!in_array($e,$folder)){?>                
                    <option><?php echo $e; ?></option>
                  <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc8[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc9'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear9" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if(!in_array($e,$folder)){?>                
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc9[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc10'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear10" class="form-control select2" >
                <?php 
                  for($e = 2000; $e <= 2050; $e++){
                    if(!in_array($e,$folder)){?>                
                    <option><?php echo $e; ?></option>
                  <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc10[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>                
                <div id='plusAn' type="button" class="btn btn-default" onClick="addYear(true);">Ajouter une année</div>
                <div id='moinsAn' type="button" class="btn btn-default" onClick="addYear(false);">Enlever une année</div>
                </div>
                </div>
                <script>
                document.getElementById("an").style.display ='none';
                var nbY = parseInt(document.getElementById("nbY").value,10);
                var initial = nbY;
                var An = nbY+1;                
                </script>
                <?php }
                if($type_page == 'formulaire'){ ?>
                  <label class="center">Veuillez tapper votre texte d'intro (facultatif)</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="intro_form" class="ckeditor" rows="100" cols="80">
                    <?php echo $intro; ?>                                            
                    </textarea>
                    </div>
                    <input type="hidden" name='nbform2' id='nbform' value="<?php echo $nb_champ; ?>"/>
            <div class="box box-info">            
            <div class="box-header with-border">
              <h3 class="box-title">Champs présents dans le formulaire :</h3><br><br>
              
            </div>
                    
                    <?php for($i = 1; $i <= $nb_champ; $i++){ ?>
                        <div class="form-group" id ="formulaire<?php echo $i; ?>">
                     <?php switch($form['type'.$i]){
                        case"nom" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="nom">
                        <label class="col-sm-2 control-label">Champ NOM</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>" <?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                  <?php break;
                        case"prenom" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="prenom">
                        <label class="col-sm-2 control-label">Champ PRENOM</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                  <?php break;
                        case"adresse" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="adresse">
                        <label class="col-sm-2 control-label">Champ ADRESSE</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"email" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="email">
                        <label class="col-sm-2 control-label">Champ EMAIL</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"area" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="area">
                        <label class="col-sm-2 control-label">Champ ZONE DE TEXTE</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"nb" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="nb">
                        <label class="col-sm-2 control-label">Champ NOMBRE</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"file" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="file">
                        <label class="col-sm-2 control-label">Champ FICHIER</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"date" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="date">
                        <label class="col-sm-2 control-label">Champ DATE</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $form['champ'.$i]; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <?php break;
                        case"liste" :?>
                        <input type="hidden" name="input<?php echo $i; ?>" value="liste">
                        <label class="col-sm-2 control-label">Champ LISTE</label>
                        <div class="col-sm-2 ">
                        <label class="control-label">Obligatoire?</label>
                        <input class="col-sm-2" type="checkbox" name="ch<?php echo $i; ?>"<?php if($form['ob'.$i]){echo 'checked';}?>>
                        </div>
                        <label class="col-sm-2 control-label">nom du champ :</label>
                        <input required="required" value="<?php echo $liste['nom_champ']; ?>" class="col-sm-2" name="champ<?php echo $i; ?>">
                        <div class="col-sm-1 "></div>
                        <a class="btn btn-danger col-sm-2" href="<?php echo base_url()?>cms/supChamp/<?php echo $i."/".$id_page?>" >Supprimer ce champ</a>
                        <div class="col-sm-1 "></div>
                        <br>
                        <br>
                        <div class="col-sm-1 "></div>
                        <div id="liste<?php echo $i; ?>" style="border-style: double;" class="col-sm-10">
                        <span>Propiétés de la liste :  </span>                        
                        <a class="btn btn-info pull-right" onclick="liste(<?php echo $i; ?>)">Ajouter un item</a>
                        <input id="nbitembyliste<?php echo $i; ?>" name="nbitembyliste<?php echo $i; ?>" value="<?php echo $nb_item; ?>" type="hidden">
                        <?php for( $a = 1; $a <= $nb_item; $a++){?>
                        <div class="form-group" id='<?php echo $i; ?>item<?php echo $a; ?>'>
                        <label class="col-sm-2 control-label">Titre de l'item </label>
                        <div class="col-sm-3">
                        <input class="form-control" name="<?php echo $i; ?>titreitem<?php echo $a; ?>" value="<?php echo $liste['titreitem'.$a] ?>">
                        </div>
                        <label class="col-sm-2 control-label">Adresse mail destinataire</label>
                        <div class="col-sm-3">
                        <input class="form-control" name="<?php echo $i; ?>mailitem<?php echo $a; ?>" value="<?php echo $liste['mailitem'.$a] ?>">
                        </div>
                        <?php if($a > 1){ ?>
                        <a class="btn btn-warning" href="<?php echo base_url()?>cms/supItem/<?php echo $a."/". $liste['id_liste']."/".$id_page?>" id="<?php echo $i.'butsup'.$a;?>">Supprimer l'item</a>
                        <?php } ?>
                        </div>                        
                        <?php } ?>
                        </div>
                        <?php break;
                  ?>
                               
                <?php } ?>
                </div>              
                <?php } ?>
                
                <div class="box-header with-border">
              <h3 class="box-title">Choissisez un type de champ à rajouter :</h3><br><br>
              <a class='btn btn-default' onClick="javascript:nom(1);">Nom</a><a class='btn btn-default' onClick="nom(2)">Prenom</a>
              <a class='btn btn-default' onClick="nom(3)">Adresse</a><a class='btn btn-default' onClick="nom(4)">Date</a>
              <a class='btn btn-default' onClick="nom(9)">Liste déroulante</a><a class='btn btn-default' onClick="nom(5)">Email</a><a class='btn btn-default' onClick="nom(6)">Zone de texte</a>
              <a class='btn btn-default' onClick="nom(7)">Nombre</a><a class='btn btn-default' onClick="nom(8)">Fichier</a>
              <a class='btn btn-default' onClick="nom(10)">Checkbox</a>
              
            </div>
            <div id="form">
            </div>
                <div class="box box-info">
            <div class="box-header with-border" id='destinataire' >
              <h3 class="box-title">Transmettre le formulaire : </h3>
              <input type="hidden" id='nbmail' name='nbmail' value='<?php echo $nb_mail; ?>'/>
                            <a onClick="ajoutmail();" class="btn btn-info pull-right">Ajouter une adresse mail</a><br><br><br>
                <?php for($b = 1; $b <= $nb_mail; $b++){?>
                <div class="form-group" id="grpmail<?php echo $b; ?>">
                <label class="col-sm-2 control-label">Entrez l'adresse mail</label>
                <div class="col-sm-6">
                <input type="text" name="mail_dest<?php echo $b; ?>" value="<?php echo substr($form['mail_dest'.$b],0,-11); ?>">@oignies.fr</div>
                <?php if($b > 1){ ?>
                <a class="col-sm-2 btn btn-warning" href="<?php echo base_url()?>cms/supMail/<?php echo $b."/".$id_page?>" >Supprimer</a>
                <?php } ?>
                </div>
                <?php }?>
                </div>                
                </div>
                
                <?php }?>
              
                
               </div> 
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
             <?php if($path_doc != ''){ ?> 
              <div class="box box-info">
            <div class="box-header with-border" >
              <h3 class="box-title">Joindre un (ou des) document(s)</h3>              
              Cette section permet aux utilisateurs de télécharger un document en lien avec la page          
              </div>
              </div>
              <div class="form-horizontal">
              <div class="box-body">
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Texte d'intro du document</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='intro_doc' value ="<?php echo $intro_doc; ?>"/>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Concerver ce document ?</label>
                <label class='col-sm-6 control-label'><?php echo $path_doc;?></label>
                <div class="col-sm-2">
                <input type="radio" name='radio_doc' onClick='visible_doc(true);' value="Non" >Non     
                </div>
                <div class="col-sm-2">
                <input type="radio" name='radio_doc' onClick='visible_doc(false);' value="Oui"checked>Oui     
                </div>                                
                </div>
                <div >
                <div class="form-group" id="choix_doc">
                  <label  class="col-sm-2 control-label">Texte d'intro du document</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='intro_doc' value="<?php echo $intro_doc;?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-sm-2 control-label">Choisir un document </label>
                  <div class="col-sm-10">
                  <input type="file" name="doc_a_telecharger" id="exampleInputFile" value='Choisissez un document'>
                </div>
                </div>
                </div>
                </div>
                </div>
                               
<?php }else{ ?>
  <div class="box box-info">
            <div class="box-header with-border" >
              <h3 class="box-title">Joindre un (ou des) document(s)</h3>              
              Cette section permet aux utilisateurs de télécharger un document en lien avec la page          
              </div>
              </div>
              <div class="form-horizontal">
              <div class="box-body">
              <div class="form-group">
                  <label  class="col-sm-2 control-label">Texte d'intro du document</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='intro_doc' placeholder="ex : Cliquez pour télécharger le document"/>
                  </div>
                </div>
              <div class="form-group">
                  <label class="col-sm-2 control-label">Choisir un document </label>
                  <div class="col-sm-10">
                  <input type="file" name="doc_a_telecharger" id="exampleInputFile" value='Choisissez un document'>
                </div>
                </div>
                </div>
                </div>
  <?php } ?> 
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
<script src="<?php echo base_url();?>/assets/cms/updatePages.js"></script>
<script>
<?php if($type_page == 'document'){
  echo "document.body.onload = invisible('doc');";
}?>
<?php if($type_page == 'bulle'){
  echo "document.body.onload = invisible('bulle');";
}?>
</script>