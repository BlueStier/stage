<div class="content-wrapper">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Créer un utilisateur :</h3>
      </div><!-- /.box-header -->
    </div>
    <div class="form-horizontal">
<div class="box-body">
<div class="form-group">
<?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('cms/createUser');?>
                  <label class="col-sm-2 control-label">Nom de l'utilisateur</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="nomUser" placeholder="Entrez le nom de l'utilisateur" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Prenom de l'utilisateur</label>
                  <div class="col-sm-10">
                  <input class="form-control" name="prenomUser" placeholder="Entrez le prénom de l'utilisateur" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mot de passe</label>
                  <div class="col-sm-10">
                  <input type="password" class="form-control" name="mdpUser" placeholder="Entrez le mot de passe" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Confirmation du mot de passe</label>
                  <div class="col-sm-10">
                  <input type="password" class="form-control" name="mdp2User" placeholder="Confirmez le mot de passe" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Choisir une photo </label>
                  <div class="col-sm-10">
                  <input type="file" name="photoUser" id="exampleInputFile" value='Choisissez une photo'>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label">Type d'utilisateur :</label>
                <div class="col-sm-10">                
                <select id="selectTxt" name ="selectUser" onchange='addElement();' class="form-control select2" >
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
                  <input type="text" class="form-control" name="mail" placeholder="ex: nom.prenom" required>
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