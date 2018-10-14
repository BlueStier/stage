<?php $year = date('Y');?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer une page :</h3>
            </div>
</div>
<!-- Pour tous type de pages définition de la photo de background, titre et soustitre (facultatif) -->
<div class="form-horizontal">
<div class="box-body">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/validatePage');?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nom de la page</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le nom de la page" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrePage' placeholder="Entrez le titre de la page" required>
                  </div>
                  </div>
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Sous-titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='soustitrePage' placeholder="Entrez le sous-titre de la page (facultatif)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisir une image </label>
                  <div class="col-sm-10">
                  <input type="file" name="backgroundImg" id="exampleInputFile" value='Choisissez une image'>
                </div>
                </div>
                <!-- Choix du type de page à créer -->               
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez un type de page :</label>
                <div class="col-sm-10">
                <select id="select" onchange='choix();' name='selectType' class="form-control select2" >                
                <?php foreach($type_item as $type):
                $selected = strcmp($type['type'],'sans');
                $eject = strcmp($type['type'],'home');
                if($eject != 0){
                if($selected == 0 ){
                  ?>
                  <option selected><?php echo $type['type']?></option>
                  <?php
                }else{
                ?>
                <option><?php echo $type['type']?></option>
                <?php }
                }
                endforeach;
                ?>
                </select>                
                </div>                
                </div>
                <!-- Div pour création d'un page de type text -->
                <div id='text'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de paragraphe :</label>
                <div class="col-sm-10">                
                <select id="selectTxt" name ="selectparaf" onchange='addElement();' class="form-control select2" >
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
                <div id="txt1">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 1er paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t1' placeholder="Entrez le titre du paragraphe" required>
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg1" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
            
            </div>
          </div>
          <div id="txt2">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 2ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t2' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg2" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt3">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 3ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t3' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg3" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt4">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 4ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t4' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg4" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt5">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 5ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t5' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg5" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt6">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 6ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t6' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg6" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt7">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 7ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t7' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
             
                    <textarea id="editor" name="pg7" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt8">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 8ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t8' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg8" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt9">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 9ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t9' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="pg9" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              
            </div>
          </div>
          <div id="txt10">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 10ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='t10' placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
             
                    <textarea id="editor" name="pg10" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
             
            </div>
          </div>
          </div>    
               <!-- fin Div text -->
               <!-- Div pour création d'un page du type carroussel -->
                <div id='carroussel'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Texte d'intro (facultatif)</label>
                  <div class="col-sm-10">
                  <textarea id="editor" name="textcar" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                  </div>
                </div>              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos images </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="car1[]" id="exampleInputFile" value='Choisissez des images' multiple='multiple'>
                </div>
                </div>
                </div>
                <!-- fin Div carroussel -->
                 <!-- Div pour création d'un page du type document -->
                 <div id='document'>                
                <div class="form-group">
                <label class="col-sm-2 control-label">Texte d'intro (facultatif)</label>
                  <div class="col-sm-10">
                  <textarea id="editor" name="textdoc" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                  </div>
                </div>
                <input id="nbY" type='hidden' value="1" name='nbY'/>                                
                <div id='doc1'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear1" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
                  <option><?php echo $e; ?></option>
                <?php } } ?>
                </select>
                </div>
                </div>                              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisissez vos fichiers </label>
                  <div class="col-sm-10">                  
                  <input type="file" name="doc1[]" id="exampleInputFile" value='Choisissez des fichiers' multiple='multiple'>
                </div>
                </div>
                </div>
                <div id='doc2'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez l'année :</label>
                <div class="col-sm-10">                
                <select name ="selectyear2" class="form-control select2" >
                <?php 
                 for($e = 2000; $e <= 2050; $e++){
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                  if($e == $year){?>
                <option selected><?php echo $e; ?></option>
                <?php } else { ?>
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
                <!-- fin Div document -->
                 <!-- Div pour création d'un page du type bulle -->
                <div id='bulle'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de bulles :</label>
                <div class="col-sm-10">                
                <select id="selectBulle" name ="selectbulle" onchange='addElement();' class="form-control select2" >
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
                <div id="bulle1">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Texte d'intro</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrebulle' placeholder="Entrez un texte d'introduction (facultatif)">
                  </div>
                  </div>
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Sous-texte d'intro</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='soustitrebulle' placeholder="Entrez un sous-texte d'introduction (facultatif)">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 1ère bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt1' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                  <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir la 1ère image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo1" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 1er texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx1" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          
          <div id="bulle2">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 2ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt2' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label">Choisir la 2ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo2" id="exampleInputFile" value='Choisissez une image'>
                  </div>                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 2ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx2" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>           
          </div>
          </div>
          <div id="bulle3">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 3ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt3' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir la 3ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo3" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 3ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx3" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle4">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 4ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt4' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label">Choisir la 4ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo4" id="exampleInputFile" value='Choisissez une image'>
                  </div>                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 4ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx4" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>            
          </div>
          </div>
          <div id="bulle5">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 5ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt5' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir la 5ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo5" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 5ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx5" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle6">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 6ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt6' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label">Choisir la 6ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo6" id="exampleInputFile" value='Choisissez une image'>
                  </div>                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 6ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx6" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>            
          </div>
          </div>
          <div id="bulle7">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 7ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt7' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir la 7ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo7" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 7ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx7" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle8">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 8ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt8' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label">Choisir la 8ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo8" id="exampleInputFile" value='Choisissez une image'>
                  </div>                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 8ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx8" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
            
          </div>
          </div>
          <div id="bulle9">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 9ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt9' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
                  <div class="col-sm-3">
                  <label class="control-label">Choisir la 9ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo9" id="exampleInputFile" value='Choisissez une image'>
                  </div>
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 9ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx9" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
          </div>
          </div>
          <div id="bulle10">
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la 10ème bulle</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trt10' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
                 <div class="form-group">
                 <div class="col-sm-3">
                  <label class="control-label">Choisir la 10ème image </label>
                  <br>
                  <br>
                  <br>                  
                  <input type="file" name="photo10" id="exampleInputFile" value='Choisissez une image'>
                  </div>                  
                  <div class="col-sm-9">
                  <label class="control-label">Saisissez le 10ème texte </label>
                  <br>
                  <div class="box-body pad">            
                    <textarea id="editor" name="tx10" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
            </div>
           
          </div>
          </div>
          <div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de la zone de texte supplémentaire</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='trtsup' placeholder="Entrez un titre (obligatoire)">
                  </div>
                </div>
          <div class="form-group">
          <label class="col-sm-3 control-label">Saisissez le texte supplémentaire (facultatif) </label>
          <br>          
          <div class="col-sm-12 box-body pad">            
                    <textarea id="editor" name="sup" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
                    </div>
          
          </div>
          </div>
                <!-- fin Div -->
                <!-- Div pour création d'un page sans type -->
                <div id="sans">
                <label class="center">Veuillez tapper votre texte</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="sans" class="ckeditor" rows="100" cols="80">                                            
                    </textarea>
             
            </div>
                </div>
                 <!-- Div pour création d'un page d'articles -->
                 <div id="article">
                 <label class="center">Veuillez tapper votre texte (facultatif)</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="article" class="ckeditor" rows="100" cols="80">                                            
                    </textarea>
             
            </div>
                </div>
                 <!-- Div pour création d'un page d'articles -->
                 <div id="formulaire">
                 <label class="center">Veuillez tapper votre texte d'intro (facultatif)</label>
                  <div class="box-body pad">              
                    <textarea id="editor" name="article" class="ckeditor" rows="100" cols="80">                                            
                    </textarea>             
            </div>
            <input type="hidden" name='nbform' id='nbform'/>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Choissisez un type de champ :</h3><br><br>
              <a class='btn btn-default' onClick="nom(1)">Nom</a><a class='btn btn-default' onClick="nom(2)">Prenom</a>
              <a class='btn btn-default' onClick="nom(3)">Adresse</a><a class='btn btn-default' onClick="nom(4)">Date</a>
              <a class='btn btn-default' onClick="nom(9)">Liste déroulante</a><a class='btn btn-default' onClick="nom(5)">Email</a><a class='btn btn-default' onClick="nom(6)">Zone de texte</a>
              <a class='btn btn-default' onClick="nom(7)">Nombre</a><a class='btn btn-default' onClick="nom(8)">Fichier</a>
              <button>Checkbox</button><button>Bouton radio</button>
            </div>
            <div id='form'>
            <div id='liste1' style="border-style: double;">
<span>Propiétés de la liste :</span><a class='btn btn-primary'>ajouter un item</a><br><br>
<div class="form-group">
                  <label  class="col-sm-2 control-label">Titre de l'item</label> 
                  <div class='col-sm-3'>                
                  <input class="form-control " name='trt10' placeholder="obligatoire">
                  </div>                  
                  <label  class="col-sm-2 control-label">Adresse mail destinataire</label> 
                  <div class='col-sm-3'>                 
                  <input class="form-control col-sm-4" name='trt10' placeholder="facultatif">
                  </div>
                  <a class='btn btn-warning'>Supprimer</a>
                  </div>   
            </div>
            </div>
</div>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transmettre le formulaire :</h3><br><br>
              Vous pouvez transmettre le mail directement à un ou plusieurs services en cliquant <a>ici</a><br><br>
              Pour permettre à l'usager de transmettre son formulaire selon une liste déroulante cliquez <a>ici</a><br><br>
                </div>
                </div>
                </div>
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
                <td><input type='checkbox' name="menu[]" value="<?php /* affiche le nom du menu */ echo $header['nom'] ?>"><?php /* affiche le nom du menu */ echo "  ".$header['nom'] ?></td>
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
                <td><input type='checkbox' name="sousmenu[]" value="<?php /* affiche le nom du sous-menu */ echo $sub['nom'] ?>"><?php /* affiche le nom du sous-menu */ echo "  ".$sub['nom'] ?></td>
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
                <td><input type='checkbox' name="third[]" value="<?php /* affiche le nom du 3ème niveau */ echo $thi['nom'] ?>"><?php /* affiche le nom du 3ème niveau */ echo "  ".$thi['nom'] ?></td>
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
document.getElementById("text").style.display ='none';
document.getElementById("carroussel").style.display ='none';
document.getElementById("bulle").style.display ='none';
document.getElementById("article").style.display ='none';
document.getElementById("document").style.display ='none';
document.getElementById("formulaire").style.display ='none';
document.getElementById("sans").style.display ='block';

document.body.onload = invisible('txt');
document.body.onload = invisible('bulle');
document.body.onload = invisible('doc');


function invisible(txt){
  for(var i=2;i<=10;i++){
     document.getElementById(txt+i).style.display ='none';    
  }
}
function choix() {
  var x = document.getElementById("select").selectedIndex;
  var y = document.getElementById("select").options;
  var choix = y[x].text;  
 
  switch(choix){
    case "text":
      document.getElementById("text").style.display ='block';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("table").style.display ='block';
      document.getElementById("formulaire").style.display ='none';
    break;
    case "carroussel":
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='block';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("table").style.display ='block';
      document.getElementById("formulaire").style.display ='none';
    break;
    case "bulle":
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='block';
      document.getElementById("sans").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("table").style.display ='block';
      document.getElementById("formulaire").style.display ='none';
    break;
    case "sans":    
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("sans").style.display ='block';
      document.getElementById("table").style.display ='block';
      document.getElementById("formulaire").style.display ='none';
    break;
    case "article":    
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("article").style.display ='block';
      document.getElementById("table").style.display ='block';
      document.getElementById("formulaire").style.display ='none';
    break;
    case "document":    
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("formulaire").style.display ='none';
      document.getElementById("moinsAn").style.display ='none';
      document.getElementById("document").style.display ='block';
      document.getElementById("table").style.display ='block';      
    break;
    case "formulaire":    
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("formulaire").style.display ='block';
      document.getElementById("document").style.display ='none';
      document.getElementById("table").style.display ='block';      
    break;
    default:
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("article").style.display ='none';
      document.getElementById("document").style.display ='none';
      document.getElementById("sans").style.display ='block';
      document.getElementById("table").style.display ='block';
    break;   
  }  
    
}
function addElement () {
  //pour le nombre de paragraphe d'une page type text 
  var x = document.getElementById("selectTxt").selectedIndex;
  var y = document.getElementById("selectTxt").options;
  var choix = y[x].text;
  invisible('txt');
  for(var a = 2;a<=choix;a++){
    document.getElementById("txt"+a).style.display ='block';
  }

  //pour le nombre de paragraphe d'une page type bulle 
  var w = document.getElementById("selectBulle").selectedIndex;
  var z = document.getElementById("selectBulle").options;
  var choix1 = z[w].text;
  invisible('bulle');
  for(var a = 2;a<=choix1;a++){
    document.getElementById("bulle"+a).style.display ='block';
  }
}

var nbY = document.getElementById("nbY");
var An = 2;
function addYear(bool){ 
  if(An >= 10){
    document.getElementById("plusAn").style.display ='none';
  }else{
    document.getElementById("plusAn").style.display ='inline';
  }
  if(bool){    
    document.getElementById("nbY").value = An ;
  document.getElementById("doc"+An).style.display ='block';
  An++;
  } else {
    An--;
    document.getElementById("doc"+An).style.display ='none';
    document.getElementById("nbY").value = An-1 ;        
  }
  if(An > 2){
    document.getElementById("moinsAn").style.display ='inline';
  }else{
    document.getElementById("moinsAn").style.display ='none';
  }
}

var nb_liste = 0;
var old_num = 0;
var numero = 1;
function nom(nb) {
	var insert =document.getElementById("form");
    var div = document.createElement("div");
    div.setAttribute('class','form-group');
    div.setAttribute('id','formulaire'+numero);    
    var hidden = document.createElement("input");
    hidden.setAttribute('type','hidden');
    hidden.setAttribute('name','input'+numero);
    var input2 = document.createElement("input");
    switch(nb){
      case 1 :
      hidden.setAttribute('value','nom');
      var t = document.createTextNode("Champ NOM");
      input2.setAttribute('placeholder','ex:Votre nom');
      break;
      case 2 :
      hidden.setAttribute('value','prenom');
      var t = document.createTextNode("Champ PRENOM");
      input2.setAttribute('placeholder','ex:Votre prenom');
      break;
      case 3 :
      hidden.setAttribute('value','adresse');
      var t = document.createTextNode("Champ ADRESSE");
      input2.setAttribute('placeholder','ex:Votre adresse');
      break;
      case 4 :
      hidden.setAttribute('value','date');
      var t = document.createTextNode("Champ DATE");
      input2.setAttribute('placeholder','ex:date de naissance');
      break;
      case 5 :
      hidden.setAttribute('value','email');
      var t = document.createTextNode("Champ EMAIL");
      input2.setAttribute('placeholder','ex:Votre Email');
      break;
      case 6 :
      hidden.setAttribute('value','area');
      var t = document.createTextNode("Champ ZONE DE TEXTE");
      input2.setAttribute('placeholder','ex:Votre message');
      break;
      case 7 :
      hidden.setAttribute('value','nb');
      var t = document.createTextNode("Champ NOMBRE");
      input2.setAttribute('placeholder','ex:Nombre de participants');
      break;
      case 8 :
      hidden.setAttribute('value','file');
      var t = document.createTextNode("Champ FICHIER");
      input2.setAttribute('placeholder','ex:Joindre une photo');
      break;
      case 9 :
      hidden.setAttribute('value','liste');
      var t = document.createTextNode("Champ LISTE");
      input2.setAttribute('placeholder','ex:Choisir le service');

      var liste = document.createElement('div');
      liste.setAttribute('id','liste'+numero);

      break;
    }
   
    var label = document.createElement("label");
    label.setAttribute('class','col-sm-2 control-label');
    
    label.appendChild(t);
    
    var input = document.createElement("input");
    input.setAttribute('class','col-sm-2');
    input.setAttribute('type','checkbox');
    input.setAttribute('name','ch'+numero);
    var label2 = document.createElement("label");
    label2.setAttribute('class','control-label');
    var t2 = document.createTextNode("Obligatoire?");
    var div_check = document.createElement("div");
    div_check.setAttribute('class','col-sm-2 ');
    label2.appendChild(t2);
    div_check.appendChild(label2);
    div_check.appendChild(input);
    
    var label3 = document.createElement("label");
    label3.setAttribute('class','col-sm-2 control-label');
    var t3 = document.createTextNode("nom du champ :");
    label3.appendChild(t3);    
    
    input2.setAttribute('class','col-sm-2');
    
    input2.setAttribute('name','champ'+numero);
    
    var div_at1 = document.createElement("div");
    div_at1.setAttribute('class','col-sm-1 ');
    
    var div_at2 = document.createElement("div");
    div_at2.setAttribute('class','col-sm-1 ');
    
    var a = document.createElement("a");
    a.setAttribute('class','btn btn-danger col-sm-2');
    a.setAttribute('onClick','supthis();');
    a.setAttribute('id','this'+numero);
    
    var t4 = document.createTextNode("Supprimer ce champ");
    a.appendChild(t4);
    div.appendChild(hidden);
    div.appendChild(label);
    div.appendChild(div_check);
    div.appendChild(label3);
    div.appendChild(input2);
    div.appendChild(div_at1);
    div.appendChild(a);
    div.appendChild(div_at2);
    insert.appendChild(div);

    document.getElementById('nbform').value = numero;
  
  if(numero > 1){
    document.getElementById('this'+old_num).style.display ='none';}
    old_num++;
    numero++;
}

function supthis(){
  numero--;
  old_num--;
  var form = document.getElementById("form");
  var formulaire =  document.getElementById('formulaire'+numero);
  form.removeChild(formulaire);
  if(numero > 1){
    document.getElementById('this'+old_num).style.display ='initial';
    }
  document.getElementById('nbform').value = old_num;
  
}
</script>