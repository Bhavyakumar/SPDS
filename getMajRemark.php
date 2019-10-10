<?php
// session_start();
	include "connection.php";
	   // echo $_SESSION['semid'];
		$reg=$_GET['reg'];
		$semid=$_GET['semid'];
		$qry="SELECT * FROM remark WHERE status=1 and sem_id='".$semid."' and reg_no='".$reg."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['sy_remark'];
?>