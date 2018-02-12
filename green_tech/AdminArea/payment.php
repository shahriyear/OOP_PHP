<?php 
include("../class/require.php");
$user->auth();
$arg=array($tran->tid=>$_REQUEST['id'],$tran->P_money=>$_REQUEST['amount']);

	echo $tran->get_paid($arg);
?>