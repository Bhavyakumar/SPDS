<?php
include'connection.php';
echo $_GET['id'];

		  		$rs=mysqli_query($con,"select * from submission where sub_id='".$_GET['id']."'");
		  		$row=mysqli_fetch_assoc($rs);
				header('Content-Type: application/octet-stream');
				header('Content-Length:'.filesize($row['report']));	
				header('Content-Disposition: attachment; filename="'.basename($row['report']).'"');
				readfile($row['report']);
				 
?>