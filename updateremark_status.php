<?php
include 'connection.php';

		$rid=$_GET["remid"];
		 $updt="Update remark set sy_status='1' where r_id='".$rid."' and status='1'";
		 $update=mysqli_query($con,$updt);



		

?>