<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AduanMJII <?=$short_version?> | <?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=$url?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=$url?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=$url?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=$url?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$url?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=$url?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=$url?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=$url?>/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style type="text/css">
	.custom-pre {
		font-family: "Source Sans Pro";
		white-space: pre-wrap;       /* Since CSS 2.1 */
		white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
		white-space: -pre-wrap;      /* Opera 4-6 */
		white-space: -o-pre-wrap;    /* Opera 7 */
		word-wrap: break-word; 
	}
	.announcement-text table {
		border-collapse: collapse;
	}
	.announcement-text table th, .announcement-text table td {
		padding: 5px;
		border: 1px solid black;
	}
	.announcement-text table th {
		background-color: #ddd;
		text-align: center;
	}
	.se-table-size-100 {
		width:100%;
	}
  </style>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=$url?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <?php require_once "../app/views/navbar.php";
	?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php require_once "../app/views/main-sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <?php $i=1; foreach($navigations as $nav){
				  if($i >= count($navigations)){
					  ?><li class="breadcrumb-item active"><?=$nav['title']?></li><?php
				  }
				  else{
					?><li class="breadcrumb-item"><a href="<?=$nav['url']?>"><?=$nav['title']?></a></li><?php  
				  }
				  $i++;
			  } ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->