<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NDC Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-light">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>" target="_blank"><img src="<?=base_url()?>assets/images/logo.png" height="80" alt="Ramraj Services Logo"></a> <br>
      <b>Admin</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body shadow">
      <p class="login-box-msg">Log in</p>

      
      <form method="post" action="<?php echo base_url('Login/authenticate'); ?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="uname" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pwd" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In →</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!-- 
      <p class="mb-1 mt-3">
        <a href="#">Forgot password ?</a>
      </p> -->
      <?php if(isset($errors)) : ?>
        <h6 class="alert alert-danger mt-4"><?= $errors ?></h6>
      <?php endif; ?>

    </div>
    <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->

</body>
</html>
