<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DUBA | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      padding-left: 0;
      height: auto;
      margin-top: -3px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 18px;
    }

    .form-control {
      height: initial;
    }
    
    .user-panel img {
    height: 30px;
    width: 30px;
}
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  session_name('admin_session');
  session_start();
  if (!isset($_SESSION['yonetici_id']) && !isset($_SESSION["kullanici_adi"])) {
    header("Location: admin-login.php");
    exit();
  }
  ?>
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="admin.php" class="nav-link">Home</a>
        </li>
      </ul>

      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="admin-logout.php">Çıkış Yap
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
