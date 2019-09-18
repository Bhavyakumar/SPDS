<?php
	include "connection.php";
	$reg=$_POST['reg'];
	$majsel=$_POST['majsel'];
	$minsel=$_POST['minsel'];

	$sql="Update major_guide set f_id='".$majsel."' where reg_no='".$reg."'";
	$rs=mysqli_query($con,$sql);
	
	$qry="Update minor_guide set f_id='".$minsel."' where reg_no='".$reg."'";
	$result=mysqli_query($con,$qry);
	


?>