<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer une page :</h3>
            </div>
</div>
<div class="form-horizontal">
<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Nom de la page</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le nom de la page">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre de la page">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Sous-titre</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le sous-titre de la page (facultatif)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Choisir une image </label>
                  <div class="col-sm-10">
                  <input type="file" id="exampleInputFile">
                </div>
                </div>               
                <div class="form-group">
                <label class="col-sm-2 control-label">Choisissez un type de page :</label>
                <div class="col-sm-10">
                <select id="select" onchange='choix();' class="form-control select2" >
                <option selected="selected">sans</option>
                <?php foreach($type_item as $type):?>
                <option><?php echo $type['type']?></option>
                <?php
                endforeach;
                ?>
                </select>                
                </div>                
                </div>
                <div id='text'>
                <div class="form-group">
                <label class="col-sm-2 control-label">Nombre de paragraphe :</label>
                <div class="col-sm-10">                
                <select id="selectTxt" onchange='addElement();' class="form-control select2" >
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
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt2">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 2ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt3">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 3ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt4">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 4ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt5">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 5ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt6">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 6ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt7">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 7ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt8">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 8ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt9">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 9ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          <div id="txt10">
                  <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Titre du 10ème paragraphe</label>
                  <div class="col-sm-10">
                  <input class="form-control" placeholder="Entrez le titre du paragraphe">
                  </div>
                  </div>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="10" cols="80">                                            
                    </textarea>
              </form>
            </div>
          </div>
          </div>    
               
                <div id='carroussel'>ca</div>
                <div id='bulle'>bu</div>
                <div id='sans'>
                <label class="center">Veuillez tapper votre texte</label>
                  <div class="box-body pad">
              <form>
                    <textarea id="editor" name="editeur" class="ckeditor" rows="100" cols="80">                                            
                    </textarea>
              </form>
            </div></div>
                </div>
               
              
              
              <!-- /.box-body -->

               <!-- /.box-body -->
               <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/3">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
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
  var x = document.getElementById("selectTxt").selectedIndex;
  var y = document.getElementById("selectTxt").options;
  var choix = y[x].text;
  invisible();
  for(var a = 2;a<=choix;a++){
    document.getElementById("txt"+a).style.display ='block';
  }
}


</script>