<?php
include_once "connection.php";
session_start();
if(isset($_POST['studsubmit']))
{
	$rno=$_POST['rno'];
	$sname=$_POST['sname'];
	$sem=$_POST['sem'];
	$rollno=$_POST['rollno'];
	$sphone=$_POST['sphone'];
	$semail=$_POST['semail'];
	$password=$_POST['password'];

	// echo $drop;
	// echo $hid;
	$qry="update student set reg_no='".$rno."',name='".$sname."',roll_no='".$rollno."',email='".$semail."',phone_no='".$sphone."',password='".$password."',sem_id='".$sem."' where reg_no='".$_SESSION['reg']."'";
	echo $qry;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location: update_profile.php?arr"); 
   	    }
		else
		{
			echo mysql_error();
		}
}
if(isset($_POST['facsubmit']))
{
	// 	$rno=$_POST['rno'];
	$fname=$_POST['fname'];
	$fphone=$_POST['fphone'];
	$dept=$_POST['dept'];
	$femail=$_POST['femail'];
	$password=$_POST['password'];

	// echo $drop;
	// echo $hid;
	$qry="update faculty set fname='".$fname."',phone_no='".$fphone."',email='".$femail."',password='".$password."',d_id='".$dept."' where f_id='".$_SESSION['fid']."'";
	// echo $qry;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location: update_profile.php?err"); 
   	    }
		else
		{
			echo mysql_error();
		}
}
?>