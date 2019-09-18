<?php
 include 'connection.php'; 
	$id=$_GET['id'];
	echo $id;
	$qr="delete from submission where sub_id=".$id;
	mysqli_query($con,$qr);
	header("Location: stud_synopsis.php");


?>