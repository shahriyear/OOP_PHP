<?php
include("/class/My_require.php");
$user->auth();
$sdate=NULL;
$ldate=NULL;
			if(isset($_POST['startdate']))
			{
				$sdate=strtotime($_POST['startdate']);
				$sdate=date("Y-m-d",$sdate);
			}
			if(isset($_POST['lastdate']))
			{
				$ldate=strtotime($_POST['lastdate']);
				$ldate=date("Y-m-d",$ldate);
			}
			echo $tran->all_tran_details_my(NULL,$sdate,$ldate);
?>