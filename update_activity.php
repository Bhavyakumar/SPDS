<?php
	include "connection.php";
	if(isset($_POST['edit']))
	{
		$sem=$_POST['sem'];
		$date=$_POST['sub_date'];
		$act=$_POST['activityname'];
		$aid=$_POST['hide'];
		$qry="update activity set sem_id='".$sem."',submission_date='".$date."',activity_name='".$act."' where a_id=".$aid;
		// echo $qry;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location: activity_sub.php"); 
   	    }
		else
		{
			echo mysql_error();
		}
	}

?>