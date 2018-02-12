<?php
	include("../class/layout.php");
	$user->auth();
	
?>

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