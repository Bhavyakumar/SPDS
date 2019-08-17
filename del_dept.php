<?php
 include 'connection.php'; 
	$id=$_GET['id'];
	echo $id;
	$qr="delete from department where d_id=".$id;
	mysqli_query($con,$qr);
	header("Location: add_department.php");


?>