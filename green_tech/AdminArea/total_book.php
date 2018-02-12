<?php 
include("../class/require.php");
$user->auth();
$arg=array($book->bid=>$_REQUEST['id'],$book->total_bk=>$_REQUEST['amount']);

	echo $book->getTotal_book($arg);
?>