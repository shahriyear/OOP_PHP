<?php
	include("/class/require.php");
	$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
		redirect("404.html");
	if(isset($_POST['updatebtn']))
	{
		$_POST['updatebtn']='';
		if($_GET['cmd']=="user")
		{
			echo $user->update_user($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="branch")
		{	
			echo $branch->update_branch($_POST,$_GET['id']);
		}
		

		
	}
			
			
?>
<div class="span3 thumbnail">
<h1 class="text-center">Update</h1><hr />
<?php 

if($_GET['cmd']=="user")
$user->edit_user($_GET['id']);
elseif($_GET['cmd']=="branch")
$branch->edit_branch($_GET['id']);
 ?>
</div>
</body>
</html>	