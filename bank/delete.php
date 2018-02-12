<?php
include("/class/require.php");
$user->auth();
	if(!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['cmd']))
	{
		redirect ("login.php");
	}


		if($_GET['cmd']=="user")
				{
					echo$user->delete($_GET['id']);
				}
				elseif($_GET['cmd']=="branch")
				{
					echo$branch->delete($_GET['id']);
				}
?>



</body>
</html>
