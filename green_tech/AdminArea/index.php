<?php
include("../class/layout.php");
	$user->auth();
	//($_SESSION['LOGINUID']);
?>

<div class="row-fluid">
<div class="container">
<div class="row-fluid">
<div class="span6 thumbnail offset2">
<h1 class="text-center">GreenTech Publication</h1>


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