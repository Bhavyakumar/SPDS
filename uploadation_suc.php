<?php
include 'connection.php';
if(isset($_POST['submit']))
{
	$reg=$_POST['rno'];
	 echo $reg;
	$tit=$_POST['title'];
	$tid=$_POST['hide'];
	$subdate = date('Y-m-d H:i:s');
	$name=$_FILES['myfile']['name'];
	echo $name;
	$tmp_file=$_FILES['myfile']['tmp_name'];
	echo $tmp_file;
	if($name)
	{
		$location="Documents/Project/$name";
		move_uploaded_file($tmp_file,$location);
		$qry="insert into project_bank(reg_no,sub_date,project) values ('$reg','$subdate','$location')";
		//echo $qry;
		mysqli_query($con,$qry);
		header('Location:project_uploadation.php?err');
	}
	else
		{
			echo "Failed Upload";
		}
}


?>