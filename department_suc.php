<?php
	include 'connection.php';
if(isset($_POST['submit']))
{
	$dname=$_POST['dept_name'];
	//echo $sub_date;
	$qry= "insert into department (department) values ('$dname')";
	//echo "$qry";
	$rs=mysqli_query($con,$qry);
	if($rs)
	{
		header('location:add_department.php?arr');
	}
	else
	{
		header('location:add_department.php?err');
	}

}

?>