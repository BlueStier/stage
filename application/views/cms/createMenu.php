<script >

var ancien;
//fonction remplissant la table de couleur
function makeArray(q){

for(i=1 ; i <= q ; i++){this[i]=0}}

Colors = new makeArray(7);

Colors[1] = "00";

Colors[2] = "33";

Colors[3] = "66";

Colors[4] = "99";

Colors[5] = "CC";

Colors[6] = "FF";

//fonction récupérant la valeur de la couleur choisie et metant un X dans la case correspondante
function copyref(thiscolor){
if(ancien != null){
    document.getElementById(ancien).innerHTML='';   
}    
document.getElementById(""+ thiscolor + "").innerHTML="X";
document.getElementById("couleur").value = thiscolor;
ancien=""+ thiscolor + "";
}


</script>
<?php if($case == 1){?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer un  <?php echo $type;?> :</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo validation_errors(); 
                  echo form_open('cms/validateMenu/1');?>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputnom" class="col-sm-2 control-label">Nom du <?php echo $type;?></label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nom" placeholder="Nom">
                  </div>
                </div>
                <div class="form-group">
                <label for="inputnom" class="col-sm-2 control-label">Choisissez la couleur du <?php echo $type;?></label>
                <div class=" col-sm-10 ">
                <table>
	<tr>
<script language="JavaScript">
//affiche le nuancier des couleurs
for(i=1 ; i <= 6 ; i++){

for(j=1 ; j <= 6 ; j++){

for(k=1 ; k <= 6; k++){

var thiscolor = Colors[i] + Colors[j] + Colors[k];

document.writeln("<td id=\"#" + thiscolor + "\" bgcolor = \"#" + thiscolor + "\" align = center><a href= javascript:copyref(" + "\"#" + thiscolor + "\")");

document.writeln("style='color: transparent'>" + '___' + "</a></td>");

}}document.writeln("<TR>");}
</script>
<table >
	<tr>
		<td></td>
	</tr>
</table>  
</div>
<input type='hidden' name="couleur" id="couleur"></div>
</div>             
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/1">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
<?php }
if($case == 2){?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer un <?php echo $type;?> :</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo validation_errors(); 
                  echo form_open('cms/validateMenu/2');?>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputnom" class="col-sm-2 control-label">Nom du <?php echo $type;?></label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nom" placeholder="Nom">
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Joindre au menu :</label>
                <div class="col-sm-10">
                <select name="select" class="form-control select2" >
                <option selected="selected">sans</option>
                <?php foreach($header_item as $key=>$header): ?>
                <option><?php echo $header['nom'] ?></option>
<?php endforeach; ?>
                </select>
                </div>
              </div>


</div>             
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>index.php/cms/1">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 
<?php }
if($case == 3){?>
<div class="content-wrapper">
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Créer un <?php echo $type;?> :</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo validation_errors(); 
                  echo form_open('cms/validateMenu/3');?>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputnom" class="col-sm-2 control-label">Nom du <?php echo $type;?></label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nom" placeholder="Nom">
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Joindre au sousmenu </label>
                <div class="col-sm-10">
                <select name="select1" class="form-control select2" >
                <option selected="selected">sans</option>
                <?php foreach($sub_item as $sub): ?>                
                <option><?php echo $sub['nom'] ?></option>
<?php endforeach; ?>
                </select>
                </div>
              </div>


</div>             
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>index.php/cms/1">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
<?php }?>         
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