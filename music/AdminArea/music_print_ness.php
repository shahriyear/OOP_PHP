<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css"/>
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
<div class="row-fluid">
<div class="container">
<div class="row-fluid">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div style="width: auto; padding: 0 20px;" class="container"> <a href="#" class="brand">Music4You.com</a>
				<ul class="nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="create_user.php">Creat User</a></li>
					<li><a href="user_print.php">User Details</a></li>
					<li><h5 style="text-align:right;">Welecome <?php echo $user->user_by_id($_SESSION['LOGINUID'],'uname') ?></h5></li>
				</ul>	
				<div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Action <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div><br />
<div class="row-fluid" style="margin-top:50px;">
<div class="span3 thumbnail" >
	<ul class="nav nav-list">
		<li class="nav-header">List header</li>
		<li ><a href="music_print.php">All Music</a></li>
		<li><a href="gener_print.php">Print Gener</a></li>
		<li><a href="cate_Print.php">Print Category</a></li>
		<li><a href="music_add.php">Add Music</a></li>
		<li><a href="create_gener.php">Add Gener</a></li>
		<li><a href="create_cate.php">Add Category</a></li>
		<li><a href=""></a></li>
		<li><a href=""></a></li>
	</ul>
</div>
