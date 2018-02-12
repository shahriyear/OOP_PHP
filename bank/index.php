<?php
include("class/require.php");
	$user->auth();
	//($_SESSION['LOGINUID']);
?>

<div class="row-fluid">
<div class="container">
<div class="row-fluid">
<div class="span6 offset2 thumbnail">
<h1 class="text-center">This is Index</h1>


<?php
	//echo $_SESSION['LOGINUID'];
?>

</div><br />

&nbsp;<a class="btn" href="logout.php">Logout</a>
</div>

</div>
</div>
</body>
</html>	