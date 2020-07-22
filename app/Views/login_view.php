<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/template/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/template/fonts/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Vali</h1>
      </div>

      <!-- MENSAJES DE ERROR -->
      <?php if(session('error')){?>
      <div class="bs-component">
        <div class="alert alert-dismissible alert-danger">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <?php echo session('error'); ?>
        </div>
      </div>
      <?php } ?>
      <!-- / MENSAJES DE ERROR -->

      <div class="login-box">
        <?php echo form_open('login', array('class'=>'login-form')); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN</h3>

          <!-- MENSAJES DE VALIDACION -->
          <?php $validation = \Config\Services::validation(); ?>
          <!-- / MENSAJES DE VALIDACION -->

          <div class="form-group has-danger">
            <?php echo form_label('USUARIO', 'txtUsername', ['class'=>'control-label']); ?>
            <?php echo form_input(array(
                'id' => 'txtUsername',
                'name' => 'username',
                'value' => set_value('username'),
                'placeholder' => 'Ingrese el nombre de usuario',
                'class' => $validation->getError('username')?'form-control is-invalid':'form-control',
                'autofocus' => 'true',
            )); ?>
            <div class="form-control-feedback"><?php echo $validation->getError('username') ?></div>
          </div>
          
          <div class="form-group <?php echo $validation->hasError('password')?'has-danger':''; ?>>">
            <?php echo form_label('CONTRASEÑA', 'txtPassword', ['class'=>'control-label']); ?>
            <?php echo form_password(array(
                'id' => 'txtPassword',
                'name' => 'password',
                'value' => set_value('password'),
                'placeholder' => 'Ingrese su contraseña',
                'class' => $validation->getError('password')?'form-control is-invalid':'form-control',
                'autofocus' => 'true',
            )); ?>
            <div class="form-control-feedback"><?php echo $validation->getError('password') ?></div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        <?php echo form_close(); ?>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url();?>/template/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>/template/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>/template/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/template/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url();?>/template/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>