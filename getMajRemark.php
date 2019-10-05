<?php
session_start();
	include "connection.php";
	   echo $_SESSION['semid'];
		$reg=$_GET['reg'];
		$qry="SELECT * FROM remark WHERE status=1 and sem_id='".$sid."' and reg_no='".$reg."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['sy_remark'];
?>