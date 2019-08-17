<?php
include 'connection.php';
if(isset($_POST['submit']))
{
	$reg=$_POST['reg_no'];
	// echo $reg;
	$tit=$_POST['title'];
	$tid=$_POST['hide'];
	$sydate = date('Y-m-d H:i:s');
	$name=$_FILES['myfile']['name'];
	echo $name;
	$tmp_file=$_FILES['myfile']['tmp_name'];
	echo $tmp_file;
	if($name)
	{
		$location="Documents/Synopsis/$name";
		move_uploaded_file($tmp_file,$location);
		$qry="insert into submission(reg_no,t_id,synopsis,synopsis_date) values ('$reg','$tid','$location','$sydate')";
		//echo $qry;
		mysqli_query($con,$qry);
		header('Location:stud_synopsis.php?err');
	}
	else
		{
			echo "Failed Upload";
		}
}


?>