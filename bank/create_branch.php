<?php
include("/class/require.php");
	$user->auth();
	if(isset($_POST["user_btn"]))
	{
		$_POST["user_btn"]='';
		//p_r(array_filter($_POST));
		echo $branch->new_branch($_POST);
	}
?>
<div class="span9 thumbnail">
<h1 class="text-center">Add Branch Name</h1><hr />

	<div class="row-fluid">
	<div class="span8 offset2">
	
	
	<form id='register' action="" method="post"
    accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>
<!--<input type='hidden' name='submitted' id='submitted' value='1'/>
-->
<label for='email' >Branch Id: </label>
<input type='text' required="required" name="<?php echo $branch->bid; ?>" />


<label for='name' >Branch Name: </label>
<input type='text' required="required" name="<?php echo $branch->name; ?>" />



<br/><br/>
<input type='submit' name="user_btn" class="btn" value="Add Branch" />
 
</fieldset>
</form>
	</div>
	</div>
	
	
    </div>
</body>
</html>