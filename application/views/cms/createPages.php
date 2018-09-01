<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer une page :</h3>
            </div>
</div>
<!-- Pour tous type de pages définition de la photo de background, titre et soustitre (facultatif) -->
<div class="form-horizontal">
<div class="box-body">
<?php if(isset($error)){echo $error;};
             echo validation_errors();
                  echo form_open_multipart('cms/validatePage');?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nom de la page</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomPage" placeholder="Entrez le nom de la page">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrePage' placeholder="Entrez le titre de la page">
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
                <?php foreach($type_item as $type):?>
                <option><?php echo $type['type']?></option>
                <?php
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
                  <input class="form-control" name='t1' placeholder="Entrez le titre du paragraphe">
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
                <div id='carroussel'>ca</div>
                 <!-- Div pour création d'un page sans type -->
                <div id='bulle'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de bulles :</label>
                <div class="col-sm-10">                
                <select id="selectBulle" name ="selectparaf" onchange='addElement();' class="form-control select2" >
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
          
          <div id="bulle3">
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
          
          </div>
                <!-- fin Div -->
                <!-- Div pour création d'un page sans type -->
                <div id='sans'>
                <label class="center">Veuillez tapper votre texte</label>
                  <div class="box-body pad">
              
                    <textarea id="editor" name="sans" class="ckeditor" rows="100" cols="80">                                            
                    </textarea>
             
            </div></div>
                </div>
               <!-- fin Div -->
               <!-- table des menus -->
              <!-- box-header --> 
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
            
              

               <!-- /.box-body -->
               <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/3">Annuler</a>
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
document.getElementById("sans").style.display ='block';

document.body.onload = invisible;

function invisible(){
  for(var i=2;i<=10;i++){
     document.getElementById("txt"+i).style.display ='none';    
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
    break;
    case "carroussel":
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='block';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='none';
    break;
    case "bulle":
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='block';
      document.getElementById("sans").style.display ='none';
    break;
    case "sans":
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='block';
    break;
    default:
      document.getElementById("text").style.display ='none';
      document.getElementById("carroussel").style.display ='none';
      document.getElementById("bulle").style.display ='none';
      document.getElementById("sans").style.display ='block';
    break;   
  }  
    
}
function addElement () {
  //pour le nombre de paragraphe d'une page type text 
  var x = document.getElementById("selectTxt").selectedIndex;
  var y = document.getElementById("selectTxt").options;
  var choix = y[x].text;
  invisible();
  for(var a = 2;a<=choix;a++){
    document.getElementById("txt"+a).style.display ='block';
  }

  //pour le nombre de paragraphe d'une page type bulle 
  var w = document.getElementById("selectBulle").selectedIndex;
  var z = document.getElementById("selectBulle").options;
  var choix1 = z[w].text;
  invisible();
  for(var a = 2;a<=choix1;a++){
    document.getElementById("bulle"+a).style.display ='block';
  }
}


</script>