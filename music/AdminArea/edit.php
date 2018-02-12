<?php
	include("../class/layout.php");
	$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
		redirect("404.html");
	if(isset($_POST['updatebtn']))
	{
		$_POST['updatebtn']='';
		if($_GET['cmd']=="music")
		{
			echo $_POST[$Music->image]=resize_and_save($_FILES[$Music->image],200,200);
			echo $Music->update_music($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="cat")
		{	
			echo $cat->update_cat($_POST,$_GET['id']);
		}
		
		elseif($_GET['cmd']=="gener")
		{
			echo $gener->update_gener($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="user")
		{
			echo $user->update_user($_POST,$_GET['id']);
		}
		
	}
			
			
?>
<div class="span3 thumbnail">
<h1 class="text-center">Update</h1><hr />
<?php 
if($_GET['cmd']=="music")
$Music->edit_form($_GET['id']);
elseif($_GET['cmd']=="gener")
$gener->edit_gener($_GET['id']);
elseif($_GET['cmd']=="cat")
$cat->edit_cate($_GET['id']);
elseif($_GET['cmd']=="user")
$user->edit_user($_GET['id']);
 ?>
</div>
</body>
</html>	