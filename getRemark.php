<?php
	include "connection.php";
		$sid=$_GET['sid'];
		$qry="SELECT * FROM remark WHERE status=0 and reg_no='".$sid."'";
		$rs=mysqli_query($con,$qry);
		$row=mysqli_fetch_assoc($rs);
		echo $row['sy_remark'];
?>