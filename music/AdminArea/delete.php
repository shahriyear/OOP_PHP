<?php
include("../class/layout.php");
$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
	{
		redirect ("404.html");
	}
	
	if($_GET['cmd']=="gener")
		{
			echo $gener->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="cat")
		{
			echo$cat->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="Music")
		{
			echo$Music->delete($_GET['id']);
		}
		elseif($_GET['cmd']=="user")
		{
			echo$user->delete($_GET['id']);
		}
?>



</body>
</html>
