<?php 
include("/class/My_require.php");

$error='';
if(isset($_POST['loginbtn']))
	$error=$user->login($_POST['user'],$_POST['pass']);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"/>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<title>Login</title>
</head>


<style type="text/css">
body { background:rgba(215,215,215,1);}
.mar .control-group { margin-left:-52px  !important;}
.sty { background:#878787; color:rgba(255,255,255,1);}

</style>
<body>
    <div class="row-fluid">
	<div class="offset2">
    	<div class="span5 thumbnail offset2 sty" style="margin-top:150px !important;">
        <div class="row-fluid">
        	<h3 style="margin:0 !important; text-align:center">Login Panel</h3>
            <hr style="margin:0 !important;" />
        </div>
		
        <div class="row-fluid">
        	<div class="span12 offset4" style="padding:10px !important;">

            <span class="text-warning">
             <?php echo $error; ?></span>
                       </div>
        </div>
		
<div class="row-fluid">

    <form class="form-horizontal mar" action="" method="post">
        <div class="control-group">
        <label class="control-label" for="inputEmail">User Name</label>
        <div class="controls">
        <input type="text" name="user" id="inputEmail" placeholder="User Name">
        </div>
        </div>
		
		
        <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
        <input type="password" name="pass" id="inputPassword" placeholder="Password">
        </div>
        </div>
		
		
        <div class="control-group">
        <div class="controls">
        <button type="submit" name="loginbtn" class="btn">Sign in</button>
        </div>
        </div>
    </form>

	</div>
        </div>
    </div>
	</div>
	

</body>
</html>