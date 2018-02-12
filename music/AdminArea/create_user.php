<?php
include("../class/layout.php");
	$user->auth();
	if(isset($_POST["user_btn"]))
	{
		$_POST["user_btn"]='';
		//p_r(array_filter($_POST));
		echo $user->new_user($_POST);
	}
?>
<div class="span9 thumbnail">
<h1 class="text-center">Sing Up</h1><hr />
<!--	<form action="" method="post">
    	name: <input type="text" name="<?php echo $user->name; ?>" /><br />
        Email: <input type="text" name="<?php echo $user->email; ?>" /><br />
        username: <input type="text" name="<?php echo $user->uname; ?>" /><br />
        Pass: <input type="password" name="<?php echo $user->pass; ?>" /><br />
        user_type: <input type="text" name="<?php echo $user->utype; ?>" /><br />
       <input type="submit" name="user_btn" class="btn" value="create User" /><br />
    </form>-->
	<div class="row-fluid">
	<div class="span8 offset2">
	
	
	<form id='register' action="" method="post"
    accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>
<!--<input type='hidden' name='submitted' id='submitted' value='1'/>
-->
<label for='name' >Name: </label>
<input type='text' required="required" name="<?php echo $user->name; ?>" />

<label for='email' >Email: </label>
<input type='text' required="required" name="<?php echo $user->email; ?>" />


<label for='username' >User name:</label>
<input type='text' required="required" name="<?php echo $user->uname; ?>" />
 
  
<label for='pass' >Password:</label>
<input type='pass' required="required" name="<?php echo $user->pass; ?>" />

<br/><br/>
<input type='submit' name="user_btn" class="btn" value="Create User" />
 
</fieldset>
</form>
	</div>
	</div>
	
	
    </div>
</body>
</html>