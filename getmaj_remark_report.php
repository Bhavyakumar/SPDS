<?php
	include "connection.php";
		$reg=$_GET['reg'];
		$seid=$_GET['seid'];
		$qry="SELECT * FROM remark WHERE status=1 and reg_no='".$reg."' and sem_id='".$seid."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['re_remark'];
?>