<?php if($user_by_id['id_user'] == $id_user){
  $disab = "disabled";
  }else{ $disab ='';}?>
<div class="content-wrapper">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Modifier : <?php echo $user;?></h3>
      </div><!-- /.box-header -->
    </div>
    <div class="form-horizontal">
<div class="box-body">
<div class="form-group">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/validupUser/'.$user_by_id['id_user']);?>
                  <label class="col-sm-2 control-label" >Nom de l'utilisateur</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomUser" value="<?php echo $user_by_id['nom']; ?>" <?php echo $disab; ?> required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" >Prenom de l'utilisateur</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="prenomUser" value="<?php echo $user_by_id['prenom']; ?>" <?php echo $disab; ?> required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mot de passe</label>
                  <div class="col-sm-10">
                  <input type="password" class="form-control" name="mdpUser" placeholder="Entrez le nouveau mot de passe" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Confirmation du mot de passe</label>
                  <div class="col-sm-10">
                  <input type="password" class="form-control" name="mdp2User" placeholder="Confirmez le nouveau mot de passe" required>
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Concerver cette photo </label>
                <img class='col-sm-6' style="border: 1px solid #ddd;border-radius: 4px;padding: 1px;vertical-align: top;width:100px;" src='<?php echo base_url().$user_by_id['photo'] ?>'/>
                <div class="col-sm-2">
                <input type="radio" name='radioU' onClick='visibleP(true);' value="Non" >Non     
                </div>
                <div class="col-sm-2">
                <input type="radio" name='radioU' onClick='visibleP(false);' value="Oui"checked>Oui     
                </div>                                
                </div>
                <div id="photoU" class="form-group">
                  <label class="col-sm-2 control-label">Choisir une photo </label>
                  <div class="col-sm-10">
                  <input type="file" name="photoUser" id="exampleInputFile" value='Choisissez une photo'>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" <?php echo $disab; ?>>Type d'utilisateur :</label>
                <div class="col-sm-10">                
                <select id="selectTxt" name ="selectUser"  class="form-control select2" <?php echo $disab; ?> >
                <option selected>Administrateur</option>
                <option>Auteur</option>
                <option>Carte</option>
                <option>Modérateur</option>                
                </select>
                </div>
                </div>                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Adresse mail :</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="mail" value="<?php echo substr($user_by_id['mail'],0,-11); ?>" required>
                  </div>
                  <div class="col-sm-2">@oignies.fr</div>
                </div>
</div>
</div>
<div class="box-footer">
                <a class="btn btn-default" href="<?php echo base_url()?>cms/4">Annuler</a>
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
                </form>
              </div>
              </div>
    
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div><strong>Copyright &copy; 2018-BlueStier</strong> All rights reserved.
  </footer><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  <script>
  document.getElementById("photoU").style.display ='none';
  function visibleP(choix){
  (choix ? document.getElementById('photoU').style.display='block' : document.getElementById('photoU').style.display='none'); 
}
  </script>