<?php
	include "connection.php";
		$reg=$_GET['reg'];
		$semid=$_GET['smid'];
		$qry="SELECT * FROM remark WHERE status=0 and reg_no='".$reg."' and sem_id='".$semid."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['re_remark'];
?>