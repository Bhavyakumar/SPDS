<?php
	include "connection.php";
		$aid=$_GET['aid'];
		$qry="SELECT * FROM activity inner join semester on semester.sem_id=activity.sem_id WHERE a_id='".$aid."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs));
			$activity=$row['activity_name'];
			echo $activity;

		
?>