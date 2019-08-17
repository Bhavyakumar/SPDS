<?php
	include 'connection.php';

	$sname=$_POST['sname'];
	$sem=$_POST['sem'];
	// echo $sem;
	$roll_no=$_POST['rollno'];
	$rno=$_POST['rno'];
	$sphone=$_POST['sphone'];
	$semail=$_POST['semail'];
	$spwd=$_POST['spwd'];
	$qry= "insert into student (reg_no,name,sem_id,roll_no,email,phone_no,password) values ('$rno','$sname','$sem','$roll_no','$semail','$sphone','$spwd')";
	// echo "$qry";
	$rs=mysqli_query($con,$qry);
	if($rs)
	{
		header('location:studentlogin.php?err');
	}
	else
	{
		header('location:studreg.php?arr');
	}



?>