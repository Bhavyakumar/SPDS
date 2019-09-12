<?php
include 'connection.php';
if(isset($_POST['send']))
{
	$reg=$_POST['reg_no'];
	$redate = date('Y-m-d H:i:s');
	$name=$_FILES['report']['name'];
	$tmp_file=$_FILES['report']['tmp_name'];
	 // echo $tmp_file;
	$sub=$_COOKIE["subid"];
	if($name)
	{
		$loc="Documents/Report/$name";
		move_uploaded_file($tmp_file,$loc);
		$qry="update submission set report='".$loc."',report_date='".$redate."' where reg_no='".$reg."' And sub_id='".$sub."'";
		// echo $qry;
		mysqli_query($con,$qry);
		header('Location:stud_synopsis.php?arr');
	}
	else
	{
			echo "Failed Upload";
	}
}


?>