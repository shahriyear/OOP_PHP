<?php
include("../class/layout.php");
$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
	{
		redirect ("404.html");
	}
	
	if($_GET['cmd']=="tran")
		{
			echo $tran->delete_tran($_GET['id']);
		}
		elseif($_GET['cmd']=="cat")
		{
			echo$dInfo->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="user")
		{
			echo$user->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="book")
		{
			echo$book->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="con")
		{
			echo$contact->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="conta")
		{
			echo$conInfo->delete($_GET['id']);
		}

?>



</body>
</html>
