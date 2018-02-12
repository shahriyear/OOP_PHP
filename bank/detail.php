<?php
	include("/class/require.php");
	$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
		redirect("404.html");
	if(isset($_POST['comment']))
	{
		if(isset($_POST['allow']))
			{
				$update=$tran->update_by_id($_GET['id'],array($tran->clearance=>"YES",$tran->comments=>$_POST['comment']));
				if($update)
			{
					$notifi->push($_GET['id'],"your transection id {$_GET['id']} is Completed!!","send");
					echo "Transection succesful";
			}
	}
		if(isset($_POST['reject']))
			{
				$update=$tran->update_by_id($_GET['id'],array($tran->clearance=>"Reject",$tran->comments=>$_POST['comment']));
				if($update)
				{
					$notifi->push($_GET['id'],"your transection id {$_GET['id']} is Reject!!","send");
					echo "Rejected succes";
				}
			}
			
			
	}
		

			
			
?>
<div class="span10 thumbnail">
<h1 class="text-center">Details</h1><hr />
<form action="" method="post" >
<table>
<?php 
if($_GET['cmd']=="tran")
$tran->details($_GET['id']);
 ?>	
</table>
</form>

</div>
</body>
</html>	