<?php
 include 'connection.php'; 
	$id=$_GET['id'];
	echo $id;
	$qr="delete from activity where a_id=".$id;
	mysqli_query($con,$qr);
	header("Location: activity_sub.php");

?>