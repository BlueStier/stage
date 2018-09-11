<?php 
//récupère les infos de l'article
foreach($Article_item as $a):
    $id_article = $a['id_articles'];
    $id_page = $a['id_articlespage'];
    $jour = $a['jour'];
    $photo = $a['photo'];
    $titre = $a['titre'];
    $text = $a['text'];
    $alerte = $a['alerte'];
endforeach;    
?>
  <div class="content-wrapper">
  <?php //var_dump($page_item); ?>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Modifier l'article :<?php echo $titre ?></h3>
         <small> (article publier le <?php echo $jour ?> )    <i class="fa fa-exclamation-triangle text-red"></i> Tous changements entrainera la modification de la date de publication à aujourd'hui !</small>
      </div><!-- /.box-header -->
    </div>
    <div class="form-horizontal">
      <div class="box-body">
        <?php if(isset($error)){echo $error['error'];};
                             echo validation_errors();
                                  echo form_open_multipart('cms/validUpArticle/');?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Titre de l'article</label>
          <div class="col-sm-10">
            <input class="form-control"
                 name='titreArticle2'
                 placeholder="<?php echo $titre ?>">
          </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Souhaitez concervez cette photo ?</label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$photo ?>'/>
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
                 name="article2"
                 type="file"
                 value='Choisissez une image'>
          </div>
        </div>
         <!-- Choix de la page à lier -->               
    <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez à quelle page lier cet article :</label>
                <div class="col-sm-10">
                <select  name='selectArt2' class="form-control select2" >
                <?php foreach($page_item as $p):                
                  $verif = strcmp($p['type'],'article');                  
                  if($verif == 0){
                      if($p['id_pages'] == $id_page){?>
                <option selected><?php echo $p['nom']?></option>
                      <?php }else{
                 ?>
                 <option ><?php echo $p['nom']?></option>   
                            
                  <?php }
                  } endforeach; ?>
                </select>                
                </div>                
                </div>
                <?php if($alerte != null) {?>
                    <div class="form-group">
                    <label class="col-sm-5 control-label">L'alerte est prévu pour le : <?php echo $alerte; ?></label>
                    </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Souhaitez vous modifier l'alerte ?</label>
                <div class="col-sm-5">
                <input type="radio" name='radioA' onClick='visible(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm-5">
                <input type="radio" name='radioA' onClick='visible(true);' value="Oui">Oui     
                </div>                                
                </div>
           
                <div id="periode" class="form-group">
                <label class="col-sm-2 control-label">Choisissez le délai :</label>
                <div class="col-sm-10">
                <select  name='selectPeriodeA' class="form-control select2" >
                <option value='1'>Dans 3 mois</option>
                <option value='2'>Dans 6 mois</option>
                <option value='3'>Dans 1 ans</option>
                <option value='4'>Dans 18 mois</option>
                <option value='5'>Dans 2 ans</option>
                </select>                
                </div>                
                </div>
                <?php } else { ?>
                    <div class="form-group">
                <label class="col-sm-2 control-label">Souhaitez vous creer une alerte ?</label>
                <div class="col-sm-5">
                <input type="radio" name='radioB' onClick='visible(false);' value="Non" checked>Non     
                </div>
                <div class="col-sm-5">
                <input type="radio" name='radioB' onClick='visible(true);' value="Oui">Oui     
                </div>                                
                </div>
           
                <div id="periode" class="form-group">
                <label class="col-sm-2 control-label">Choisissez le délai :</label>
                <div class="col-sm-10">
                <select  name='selectPeriodeB' class="form-control select2" >
                <option value='1'>Dans 3 mois</option>
                <option value='2'>Dans 6 mois</option>
                <option value='3'>Dans 1 ans</option>
                <option value='4'>Dans 18 mois</option>
                <option value='5'>Dans 2 ans</option>
                </select>                
                </div>                
                </div>
                <?php } ?>
      </div>
    </div>
    <div class="box-body pad">
      <textarea class="ckeditor"
           cols="80"
           id="editor"
           name="text"
           rows="10"><?php echo $text ?></textarea>
    </div>
   
    <div class="box-footer">
      <a class="btn btn-default"
           href="<?php echo base_url()?>/cms/6">Annuler</a>
           <input type="hidden" name='id_article2' value="<?php echo $id_article ?>" />
            <button class="btn btn-info pull-right"
           type="submit">Enregistrer</button>
    </div>
  </div><!-- /.box-footer -->
  </form>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div><strong>Copyright &copy; 2018-BlueStier</strong> All rights reserved.
  </footer><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<script>
document.getElementById('periode').style.display='none';
document.getElementById('choixPhoto').style.display='none';

function visible($choix){
  ($choix ? document.getElementById('periode').style.display='block' : document.getElementById('periode').style.display='none'); 
}
function visibleP($choix){
  ($choix ? document.getElementById('choixPhoto').style.display='block' : document.getElementById('choixPhoto').style.display='none'); 
}
</script>

