<?php
ob_start();
session_start();
if($_SESSION['status_login']==1){
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ruang Admin</title>
        <link rel='icon' href='../assets/img/Tampilan/xe.png'>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
        <style>
        body {
        position: relative; 
          }

        </style>
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<!--header-->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Menu Admin</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
        </ul>
        </div>
</nav>
<!--end header-->
        <?php include "../admin/fungsi/fungsi_infotgl.php";
        include '../koneksi.php';

        ?>
<div class="row" style="margin-top: 50px;">
	<div class="col-md-3 col-xs-3 col-sm-3 col-lg-3">
        <nav class="navbar navbar-inverse" style="height: 1000px;margin-bottom: 0px">
			<aside style="position: fixed;width: 22%">
        <ul class="nav nav-pills nav-stacked">
        	<li class="<?php if($_GET['module']=='home'){echo'active';} ?>" >
                            <a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                        <li class="<?php if($_GET['module']=='mahasiswa'){echo'active';} ?>">
                            <a href="?module=mahasiswa"><i class="glyphicon glyphicon-user"></i> Kelola Mahasiswa</a>
                        </li>
                        <li class="<?php if($_GET['module']=='nilai'){echo'active';} ?>">
                            <a href="?module=nilai"><i class="glyphicon glyphicon-list"></i> Kelola Nilai</a>
                        </li>
        </ul>
    </aside>
</nav>
	</div>

	<div class="col-md-9 col-sm-9 col-lg-9">
		<div class="container-fluid">
            <div >
                <?php include "konten.php"; ?>
            </div>
        </div>
	</div>
</div>
		<!-- jQuery -->
		<script src="../js/jquery-1.11.2.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="../js/jquery.min.js"></script>
 		<script src="../js/bootstrap.js"></script>
	</body>
</html>
    <?php
}else{
    header("location:../admin/login.php");
}
?>