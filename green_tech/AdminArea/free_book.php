<?php 
include("../class/require.php");
$user->auth();
$arg=array($book->bid=>$_REQUEST['id'],$book->free_copy=>$_REQUEST['amount']);

	echo $book->getCurrent_book($arg);
?>