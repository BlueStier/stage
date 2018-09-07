<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="content-wrapper">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Créer un article :</h3>
      </div><!-- /.box-header -->
    </div>
    <div class="form-horizontal">
      <div class="box-body">
        <?php if(isset($error)){echo $error['error'];};
                             echo validation_errors();
                                  echo form_open_multipart('cms/validateArticle');?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Titre de l'article</label>
          <div class="col-sm-10">
            <input class="form-control"
                 name='titreArticle'
                 placeholder="Entrez le titre de l'article">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Choisir une image</label>
          <div class="col-sm-10">
            <input id="exampleInputFile"
                 name="article"
                 type="file"
                 value='Choisissez une image'>
          </div>
        </div>
      </div>
    </div>
    <div class="box-body pad">
      <textarea class="ckeditor"
           cols="80"
           id="editor"
           name="text"
           rows="10"></textarea>
    </div>
    <div class="box-footer">
      <a class="btn btn-default"
           href="<?php echo base_url()?>/cms/1">Annuler</a> <button class="btn btn-info pull-right"
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
</body>
</html>
