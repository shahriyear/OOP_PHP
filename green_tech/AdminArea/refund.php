<?php 
include("../class/require.php");
$user->auth();
$arg=array($tran->tid=>$_REQUEST['id'],$tran->R_amount=>$_REQUEST['amount']);
	echo $tran->refund($arg);


?>
