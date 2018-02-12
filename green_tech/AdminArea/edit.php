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
			echo $dInfo->update_cat($_POST,$_GET['id']);
		}
		
		elseif($_GET['cmd']=="tran")
		{
			echo $tran->update_tran($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="user")
		{
			echo $user->update_user($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="book")
		{
			echo $book->update_book($_POST,$_GET['id']);
		}
		elseif($_GET['cmd']=="con")
		{
			echo $contact->update_con($_POST,$_GET['id']);
		}
		
		elseif($_GET['cmd']=="conta")
		{
			echo $conInfo->update_con_info($_POST,$_GET['id']);
		}

	}
			
			
?>
<div class="span4 offset3">
<h1 class="text-center">Update</h1><hr />
<?php 
if($_GET['cmd']=="music")
$Music->edit_form($_GET['id']);
elseif($_GET['cmd']=="tran")
$tran->edit_tran($_GET['id']);
elseif($_GET['cmd']=="cat")
$dInfo->edit_cate($_GET['id']);
elseif($_GET['cmd']=="user")
$user->edit_user($_GET['id']);
elseif($_GET['cmd']=="book")
$book->edit_book($_GET['id']);
elseif($_GET['cmd']=="con")
$contact->edit_con($_GET['id']);
elseif($_GET['cmd']=="conta")
$conInfo->edit_con_info($_GET['id']);

 ?>
</div>
</body>
</html>	