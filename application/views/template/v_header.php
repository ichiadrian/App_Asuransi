<?php

  switch ($this->session->userdata['role']) {
    case 1:
      $ctrl = "c_admin";
      $title = "Admin";
      break;
    case 2:
      $ctrl = "c_helpdesk";
      $title = "Helpdesk";
      break;
    case 3:
      $ctrl = "c_agency";
      $title = "Agency";
      break;
      
    default:
      # code...
      break;
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asuransi | <?php echo $title; ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jqvmap/jqvmap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/adminlte.min.css'?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/summernote/summernote-bs4.css'?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- css datatables -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTables/datatables.css' ?>"> -->
  <!-- js datatables -->
  <!-- <script type="text/javascript" src="<?php echo base_url().'assets/DataTables/datatables.js' ?>"></script> -->
  <!-- jquery dan bootstrap js -->
  <!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url().'assets/dist/img/AdminLTELogo.png'?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin <?php echo $title; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().'assets/dist/img/user2-160x160.jpg'?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata['username'];  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().$ctrl;?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
           
            </ul>
          </li>

          <!-- ADMIN ROLE -->
          <?php if($this->session->userdata['role'] == 1) {?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Daftar User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url().$ctrl.'/daftar_user' ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Delete User</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php }?>
          <!-- END OF ADMIN ROLE -->



          <!-- HELP DESK ROLE -->
          <?php if($this->session->userdata['role'] == 2) {?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Polis Asuransi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pengajuan Asuransi Baru</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pengajuan Perpanjangan Polis</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pengajuan Klaim</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php }?>
          <!-- END OF HELP DESK ROLE -->



          <!-- AGENCY ROLE -->
          <?php if($this->session->userdata['role'] == 3) {?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Polis Asuransi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url().$ctrl.'/pengajuan_baru'?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Asuransi Baru</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url().$ctrl.'/pengajuan_perpanjangan'?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Perpanjangan Polis</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="<?php echo base_url().$ctrl.'/pengajuan_klaim'?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan Klaim</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php }?>
          <!-- END OFAGENCY ROLE -->
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Action
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().$ctrl;?>/change_password" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().$ctrl;?>/logout" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
            </ul>
          </li>>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
