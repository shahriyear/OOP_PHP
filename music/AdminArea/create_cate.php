<?php
include("../class/layout.php");
	$user->auth();
	
	if(isset($_POST["cat_btn"]))
	{
		$_POST["cat_btn"]='';
		echo $cat->new_cate($_POST);
			}
			
			
?>



<div class="span9 thumbnail">
<h1 class="text-center">Category</h1><hr />
	<form action="" method="post">
    	Name: <input type="text" class="span9" required="required" name="<?php echo $cat->name; ?>" />
       <input type="submit" name="cat_btn" class="btn" value="create Cate" />
    </form>
    </div>
	
	
	
</body>
</html>