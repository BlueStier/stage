
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Oignies CMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/cms/dist/css/AdminLTE.min.css">
  <link href="<?php echo base_url();?>/assets/site/img/logos/logo2.jpg" rel="icon" type="image/jpg">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php if($user != NULL){ ?>
  <body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="<?php echo base_url();?>"><b>Admin</b>Oignies</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $user ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url().$photouser;?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Mot de passe">

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Entrer votre mot de passe pour réactiver votre session
  </div>
  <div class="text-center">
    <a href="login.html">Se connecter avec un autre utilisateur</a>
  </div>
  <div class="lockscreen-footer text-center">
  <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </div>
</div>
<!-- /.center -->
<?php } else { ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>Admin</b>Oignies</a>
  </div> 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connexion pour démarrer une session</p>

    <?php echo $user; ?>
    <?php if(isset($error)){echo $error['error'];};
             echo validation_errors();
                  echo form_open_multipart('login/connect');?>
      <div class="form-group has-feedback">
        <input type="name" class="form-control" name="nom" placeholder="Nom" required>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="name" class="form-control" name="prenom" placeholder="Prenom" required>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>    

    <a href="#">Mot de passe oublié</a><br>    
    <strong>Copyright &copy; 2018-BlueStier</strong> All rights
    reserved.
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php } ?>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/cms/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/cms/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

