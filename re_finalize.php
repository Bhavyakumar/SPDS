<?php

include_once "connection.php";
	$sub_id=$_GET['id'];
	$redate = date('Y-m-d H:i:s');
	// echo $sydate;
		$qry="update submission set report_status='1',report_date='".$redate."' where sub_id=".$sub_id;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location:fetch_report.php"); 
   	    }
		else
		{
			echo mysql_error();
		}
?>