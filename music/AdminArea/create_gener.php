<?php
	include("../class/layout.php");
	$user->auth();
	if(isset($_POST["gener_btn"]))
	{
		$_POST["gener_btn"]='';
		echo $gener->new_gener($_POST);
			}
?>
<div class="span9 thumbnail">
<h1 class="text-center">Gener</h1><hr />
	<form action="" method="post">
    	Name: <input type="text" class="span9" required="required" name="<?php echo $gener->name; ?>" />
       <input type="submit" name="gener_btn" class="btn" value="create Gener" />
    </form>
    </div>
	
</body>
</html>