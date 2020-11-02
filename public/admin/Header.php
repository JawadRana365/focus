<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Netsuite-Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin/dist/css/skins/_all-skins.min.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.css">
<style type="text/css">
  .tabless th, td {
    padding: 5px;
}
.loader1{position:fixed;display:block;top:0;right:0;bottom:0;left:0;z-index:99999;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}.loader{position:absolute;top:50%;left:45%;border:10px solid #f3f3f3;border-top:10px solid red;border-radius:50%;width:100px;height:100px;animation:spin 2s linear infinite}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
.preload { width:100px;
    height: 100px;
    position: fixed;
    z-index:99999;
    top: 50%;
    left: 50%;}.orderlist{font-size: 80%;}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- <div class="loader1">
    <div class="loader"></div>
</div> -->
<div class="preload"><img src="<?php echo base_url();?>assets/loader.gif">
</div>
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-list"></i>
            <span>Class</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-right"></i>Create Class</a></li> 
            <li><a href="<?php echo base_url('Home/classList');?>"><i class="fa fa-angle-right"></i>Class List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-list"></i>
            <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Home/createStudent');?>"><i class="fa fa-angle-right"></i>Create Student</a></li> 
            <li><a href="<?php echo base_url('Home/studentList');?>"><i class="fa fa-angle-right"></i>Student List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-list"></i>
            <span>Videos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-down pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Home/uploadVideo');?>"><i class="fa fa-angle-right"></i>Upload Video</a></li> 
            <li><a href="<?php echo base_url('Home/videolList');?>"><i class="fa fa-angle-right"></i>Videos List</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  