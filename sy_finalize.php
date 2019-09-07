<?php

include_once "connection.php";
	$sub_id=$_GET['id'];
	$sydate = date('Y-m-d H:i:s');
	// echo $sydate;
		$qry="update submission set sy_status='1',synopsis_date='".$sydate."' where sub_id=".$sub_id;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location:fetch_synopsis.php"); 
   	    }
		else
		{
			echo mysql_error();
		}
?>