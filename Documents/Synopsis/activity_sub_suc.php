<?php
	include 'connection.php';
if(isset($_POST['submit']))
{
	$aname=$_POST['activityname'];
	$sub_date=$_POST['sub_date'];
	$sid=$_POST['sem'];
	//echo $sub_date;
	$qry= "insert into activity (sem_id,activity_name,submission_date) values ('$sid','$aname','$sub_date')";
	//echo "$qry";
	$rs=mysqli_query($con,$qry);
	if($rs)
	{
		header('location:activity_sub.php?arr');
	}
	else
	{
		header('location:activity_sub.php?err');
	}

}

?>