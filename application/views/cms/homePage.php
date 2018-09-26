<?php
$nbCarroussel = 0; 
foreach($home_item as $h):
  $intro = $h['intro'];
  for($e = 1; $e <= 5; $e++){    
  if(!empty($h['photo'.$e])){
    $nbCarroussel++;
  }
  }
endforeach;

$titre = $homepage['titre'];
$soustitre = $homepage['soustitre'];
$image = $homepage['background'];
?>
<div class="content-wrapper">
<section class="content-header">
      <h2>
      Home Page        
      </h2>
      <ol class="breadcrumb">
        <li><i class="glyphicon glyphicon-th text-red"></i>Apparence</li>
        <li class="active">Home page</li>
      </ol>      
    </section>
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Paramètres généraux :</h3>              
            </div>
            </div>
            <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/updateGenHome');?>
            <div class="form-horizontal">
<div class="box-body">
<div class="form-group">
                  <label class="col-sm-2 control-label">Titre de la page :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name='titrePage' value="<?php echo $titre; ?>">
                  </div>
                  </div>
                  <div class="form-group">
                  <label  class="col-sm-2 control-label">Sous-titre de la page :</label>
                  <div class="col-sm-10">
                    <input class="form-control" name='soustitrePage' value="<?php echo $soustitre; ?>">
                  </div> 
                  </div> 
                  <div class="box-body">                 
                  <div class="form-group">
                <label class="col-sm-2 control-label">Concerver cette photo ?</label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$image ?>'/>
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
</div>
</div>
<div class='row'>
                <input type='hidden'  value=''/>                               
                <button type='submit' class="col-md-12 btn btn-warning">Valider le changement des paramètres généraux </button>                                
                </div>
                </form>
                <br>
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">La Home page permet d'afficher un titre, un soustitre (tous deux facultatifs) suivi d'un carroussel de 5 photos maximum (une au minimum).<br> En cliquant sur une photo de ce dernier, l'internaute pourra accéder à une page particulière du site.<br> Vous pouvez donc choisir 5 articles (ou pages) à lier au carroussel.
              <br>Chaque photo peu avoir un titre et un sous-titre.</h3>              
            </div>
            </div>
            <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/updateIntroHome');?>
            <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">Texte d'intro de la Home page (facultatif)</label>
                  <div class="col-sm-10">
                  <textarea id="editor" name='textintro' class="ckeditor" rows="10" cols="80">
                  <?php echo $intro ?>                                            
                    </textarea>
                  </div>
                </div>
                <div class='row'>               
                <button type='submit' class="col-md-12 btn btn-warning">Valider le changement du texte d'introduction</button>                                
                </div>
                </form>
                <br>
                </div>
            <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Il y a actuellement <?php echo $nbCarroussel; ?> lien(s) présent(s) dans le carroussel de la Home page </h3>              
            </div>
            </div>            
            <?php
            foreach($home_item as $h):
              for($e = 1; $e <= 5; $e++){ ?>
              <div class="box box-info">
            <div class="box-header with-border">
            <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/updateLienHome/'. $e);?>
              <h2 class="box-title">Lien numéro : <?php echo $e; ?></h3>              
            </div>
            </div> 
           
             
                <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Titre :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="title<?php echo $e; ?>" <?php 
                  if(!empty($h['title'.$e])){
                    echo 'value="'.$h['title'.$e].'"';
                    }else{
                      echo 'placeholder="Entrez le texte"';} ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Sous-titre :</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="p<?php echo $e; ?>" <?php 
                  if(!empty($h['p'.$e])){
                    echo 'value="'.$h['p'.$e].'"';
                    }else{
                      echo 'placeholder="Entrez le texte"';} ?>>
                  </div>
                </div>
                </div>
                <?php
                if(!empty($h['path'.$e])){ 
                  $str = substr($h['path'.$e],6);
                  $aff = substr($str,0,-1);?>                
                <div class="form-horizontal">
                   <div class="form-group">
                <label class="col-sm-2 control-label">Page en cour : </label>
                <label class="col-sm-2 control-label"><?php echo $aff; ?></label>
                <label class="col-sm-2 control-label">Photo :</label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$h['photo'.$e] ?>'/>                           
                </div>
                </div>
                <?php
                }
                ?>
                <div class="form-horizontal">
                <div class="form-group">
               <h4 class="col-sm-2">Choisir : </h4>
                <div class="col-sm-4 btn btn-success" onClick='pageOrArticle(true,<?php echo $e; ?>)'>une page</div>
                <div class="col-sm-1"></div>
                <div class="col-sm-4 btn btn-success" onClick='pageOrArticle(false,<?php echo $e; ?>)'>un article</div>
                <div class="col-sm-1"></div>
               </div> 
               </div>              
              <div id='page<?php echo $e?>' class='row'>
               <?php
               $size = sizeof($pages_item);               
               foreach($pages_item as $nu=>$page):
                $compare = strcmp($page['nom'],'home');
                if($compare != 0){ ?>               
<div class='col-md-4'>
     <!-- Widget: user widget style 1 -->
     <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $page['nom'];?></h3>
              <h5 class="widget-user-desc">Page du type : <?php echo $page['type'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url().$page['background'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                  <div id='achoisir<?php echo $e.$nu;?>'>
                    <h5 class="description-header"><div onClick='select(<?php echo $e.$nu;?>,<?php echo $page['id_pages'];?>);'  class='btn btn-primary'>Choisir<?php echo $e.$nu;?></div></h5>                    
                  </div>
                  <div id='choisi<?php echo $e.$nu;?>'>
                    <h1 class="description-header"><i class="fa fa-check text-green"></i></h1>                    
                  </div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
              <!-- /.row -->
            </div>
          </div>
          </div>
          
    <?php
            }           
              endforeach;            
              ?>
              </div>
              <div id='article<?php echo $e?>' class='row'>
              <?php foreach($Articles_item as $h=>$art):
                $sizeart = sizeof($Articles_item);?>
              
              <div class='col-md-4'>
     <!-- Widget: user widget style 1 -->
     <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $art['titre'];?></h3>
              <h5 class="widget-user-desc">Date d'enregistrement : <?php echo $art['jour'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo base_url().$art['photo'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                  <div id='atchoisir<?php echo $e.$h;?>'>
                    <h5 class="description-header"><div onClick='selectart(<?php echo $e.$h;?>,<?php echo $art['id_articles'];?>);'  class='btn btn-primary'>Choisir<?php echo $e.$h;?></div></h5>                    
                  </div>
                  <div id='tchoisi<?php echo $e.$h;?>'>
                    <h1 class="description-header"><i class="fa fa-check text-green"></i></h1>                    
                  </div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
              <!-- /.row -->
            </div>
          </div>
          </div>
                
              <?php endforeach;   ?>
              </div>
                <div class='row'>
                <input type='hidde' name='pageselected<?php echo $e; ?>' id='pageselected<?php echo $e; ?>' value=''/> 
                <input type='hidde' name='type<?php echo $e; ?>' id='type<?php echo $e; ?>' value=''/>                              
                <button type='submit' class="col-md-12 btn btn-warning">Valider le changement du lien numéro : <?php echo $e; ?> </button>                                
                </div>
                </form>
                <br>
                
             <?php
              }
            endforeach;?>
 
 </div>            
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </footer>

<script>
document.getElementById("choixPhoto").style.display ='none';

document.body.onload = invisible("page");
document.body.onload = invisible("article");

function invisible(txt){
  for(a = 1; a <= 5; a++){
 document.getElementById(txt+a).style.display ='none';
  }
}

var size = <?php echo $size; ?>;
var sizeart = <?php echo $sizeart; ?>;

function choisiInvisible(choix,boolean){
  if(boolean){
  for(r = 1; r < size; r++){
    document.getElementById(choix+r).style.display ='none';
  }
}else{
  for(r = 1; r < size; r++){
    document.getElementById(choix+r).style.display ='block';
  }
}
}
function choisiInvisibleart(choix,boolean){
  if(boolean){
  for(r = 0; r < sizeart; r++){
    document.getElementById(choix+r).style.display ='none';
  }
}else{
  for(r = 0; r < sizeart; r++){
    document.getElementById(choix+r).style.display ='block';
  }
}
}
var choix;
var achoix;
var selected;
var type;
function pageOrArticle(bool,b){
  if(bool){
    for(c = 1; c <= 5; c++){
      if(c != b){
        document.getElementById("page"+c).style.display ='none';        
      } else {
        invisible("article");
        document.getElementById("page"+c).style.display ='block';
        choix = 'choisi'+c;
        achoix = 'achoisir'+c;
        selected = 'pageselected'+c;
        type = 'type'+c;        
        choisiInvisible(choix,true);
      }
    }
  }else{
    for(c = 1; c <= 5; c++){
      if(c != b){
        document.getElementById("article"+c).style.display ='none';        
      } else {
        invisible("page");
        document.getElementById("article"+c).style.display ='block';
        choix = 'tchoisi'+c;
        achoix = 'atchoisir'+c;
        selected = 'pageselected'+c;
        type = 'type'+c;
        choisiInvisibleart(choix,true)
      }
    }
  }
  
  
}

function select(choice,id){  
  choisiInvisible(choix,true);
  choisiInvisible(achoix,false);
  document.getElementById('choisi'+choice).style.display ='block';
  document.getElementById('achoisir'+choice).style.display ='none';
  document.getElementById(selected).value = id;
  document.getElementById(type).value = 1;
}

function selectart(choice,id){  
  choisiInvisibleart(choix,true);
  choisiInvisibleart(achoix,false);
  document.getElementById('tchoisi'+choice).style.display ='block';
  document.getElementById('atchoisir'+choice).style.display ='none';
  document.getElementById(selected).value = id;
  document.getElementById(type).value = 2;
}

function visibleP(chx){
  (chx ? document.getElementById('choixPhoto').style.display='block' : document.getElementById('choixPhoto').style.display='none'); 
}
</script> 
  