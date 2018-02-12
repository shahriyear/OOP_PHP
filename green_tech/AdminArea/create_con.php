<?php
include("../class/layout.php");
$user->auth();	
	if(isset($_POST["cat_btn"]))
	{
		$_POST["cat_btn"]='';
		echo $contact->new_con($_POST);
			}
			
			
?>




<h1 class="text-center">Contact Item</h1><hr />
<div class="span6 offset3">
	<form action="" method="post">
    	
    	Item Name <input type="text" class="" required="required" name="<?php echo $contact->name; ?>" />
       <input type="submit" name="cat_btn" class="btn" value="Create" />
    </form>
    </div>
	
	
	
</body>
</html>