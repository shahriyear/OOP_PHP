<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
</head>
<body>
<div class="row-fluid">
<div class="container">
<div class="row-fluid">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div style="width: auto; padding: 0 20px;" class="container"> <a href="#" class="brand">Money</a>
				<ul class="nav">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="create_user.php">Create User</a></li>
					<li><a href="user_print.php">User Details</a></li>
					<li>
						<h5 style="text-align:right;">Welecome <?php echo $user->user_by_id($_SESSION['LOGINUID'],'name') ?></h5>
					</li>
				</ul>
				<div class="btn-group"> 
				<div class="btn">
				<a id="notifi" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="icon-globe" style="font-weight:bold; margin-left:20px;">
				<div id="not_read">
				<?php if($notifi->total_not()>0): ?>
				<strong style="margin-left:-25px; background:rgba(255,0,0,0.6); color:#fff;">
				<?php echo $notifi->total_not(); ?>
				</strong>
				<?php endif;?>
                </div>
				</span><span class="caret"></span> </a>
				<ul id="disply_not" class="dropdown-menu">
						<?php echo $notifi->desplay_not(); ?>
						</ul>
					</div>
				<div class="btn">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="text-decoration:none;"> Action <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br />
<div class="row-fluid" style="margin-top:50px;">
<div class="span2 thumbnail" >
	<ul class="nav nav-list">
		<li class="nav-header">List header</li>
		<li ><a href="send.php">Transction</a></li>
		<li><a href="tran_print.php">Transction Details</a></li>
        <li><a href="no_print.php">Painding</a></li>
        <li><a href="yes_print.php">Completed</a></li>
        <li><a href="reject_print.php">Rejected</a></li>
        <li><a href="calculation.php">Calculation</a></li>
        <li><a href="calculation_my.php">Get Calculation</a></li>
		<li><a href="branch_Print.php">Branch Details</a></li>
		<li><a href="create_branch.php">Add Branch</a></li>

        
        
	</ul>
</div>
<script>
	$(function() {
        $("#notifi").click(function(){
			$.ajax({
				url:"ajex.php",
				type:"POST" ,
				cache:false,
				data:{id:"Read"},
				success: function(OK){
					$("#not_read").html(OK)
					}
				});
			
			})
			setInterval(function(){
				$.ajax({
				url:"total_not.php",
				type:"POST" ,
				cache:false,
				data:{id:"Read"},
				success: function(OK){
					$("#not_read").html(OK)
					}
				});
				
				$.ajax({
				url:"disply_not.php",
				type:"POST" ,
				cache:false,
				data:{id:"Read"},
				success: function(OK){
					$("#disply_not").html(OK)
					}
				});
				},3000);
	    });
</script>