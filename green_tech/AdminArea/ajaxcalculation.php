<?php
include("../class/require.php");
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
			echo $tran->all_tran_details($sdate,$ldate);
?>