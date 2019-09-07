<?php
	include 'connection.php';

	$fname=$_POST['fname'];
	$fphone=$_POST['fphone'];
	$dept=$_POST['dept'];
	$femail=$_POST['femail'];
	$fpwd=$_POST['fpwd'];
	$qry= "insert into faculty (fname,email,phone_no,password,d_id) values ('$fname','$femail','$fphone','$fpwd','$dept')";
	//echo "$qry";
	$rs=mysqli_query($con,$qry);
	if($rs)
	{
		header('location:facultylogin.php?err');
	}
	else
	{
		header('location:facultyreg.php?ar');
	}



?>