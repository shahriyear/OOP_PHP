<?php
include("/class/require.php");
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

<label for='username' >User name:</label>
<input type='text' required="required" name="<?php echo $user->uname; ?>" />
 
  
<label for='pass' >Password:</label>
<input type='password' required="required" name="<?php echo $user->pass; ?>" />

<label for='email' >Branch Name: </label>
<select name="<?php echo $user->bid; ?>">
		<option value="" >Select One</option>
		<?php echo $branch->get_banAsOption(); ?>
	</select>


<br/><br/>
<input type='submit' name="user_btn" class="btn" value="Create User" />
 
</fieldset>
</form>
	</div>
	</div>
	
	
    </div>
</body>
</html>