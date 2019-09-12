<?php
 include 'connection.php'; 
	$id=$_GET['id'];
	echo $id;
	$qr="delete from title where t_id='".$id."'";
	mysqli_query($con,$qr);
	header("Location: titlesub.php");

?>