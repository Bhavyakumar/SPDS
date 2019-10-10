<?php
	include "connection.php";
		$sid=$_GET['sid'];
		$seid=$_GET['seid'];
		$qry="SELECT * FROM remark WHERE status=1 and reg_no='".$sid."' and sem_id='".$seid."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['re_remark'];
?>