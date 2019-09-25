<?php
	include 'connection.php';
	echo $reid=$_GET["Rremid"];
		 $Rupdt="Update remark set re_status='1' where r_id='".$reid."' and status='1'";
		 $update=mysqli_query($con,$Rupdt);

?>