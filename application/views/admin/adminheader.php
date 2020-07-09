<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NDC Admin | <?=isset($title)?$title:''?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/images/fav-icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/images/fav-icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/images/fav-icon/favicon-16x16.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="<?=base_url('<?=base_url()?>/assets/plugins/fontawesome-free/css/all.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- jQuery -->
  <script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
  
  
</head>
<body class="hold-transition sidebar-collapse layout-fixed" style="font-size:85% !important">

<a href="<?=base_url('Admin/rootFileUpload')?>" accesskey="r" target="_blank" hidden></a>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('Admin')?>" class="nav-link">Home</a>
      </li>
    </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown mr-5 mb-2">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle fa-2x"></i> <i class="fas fa-caret-down fa-md ml-1"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="<?=base_url('Admin/adminProfile')?>" class="dropdown-item">
          <i class="far fa-user mr-2"></i>Admin Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?=base_url("Login/logout"); ?>" class="dropdown-item text-danger">
          <i class="fa fa-sign-out-alt mr-2"></i> Logout
        </a>
      </div>
    </li>
  </ul>
  </nav>
  <!-- /.navbar -->

