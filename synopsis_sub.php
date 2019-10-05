<?php
include 'connection.php';
if(isset($_POST['submit']))
{
	$reg=$_POST['reg_no'];
	// echo $reg;
	$tit=$_POST['title'];
	$tid=$_POST['hide'];
	$sid=$_POST['sid'];
	$sydate = date('Y-m-d H:i:s');
	$name=$_FILES['myfile']['name'];
	echo $name;
	$tmp_file=$_FILES['myfile']['tmp_name'];
	echo $tmp_file;
	$sql="select * from submission where reg_no='".$reg."' and sem_id='".$sid."'";
	$rs=mysqli_query($con,$sql);
	if ($row=mysqli_num_rows($rs)) 
	{
			$location="Documents/Synopsis/$name";
			move_uploaded_file($tmp_file,$location);
			$qry="update submission set synopsis='".$location."',synopsis_date='".$sydate."' sem_id='".$sid."' where reg_no='".$reg."'";
		// echo $qry;
			mysqli_query($con,$qry);
				header('Location:stud_synopsis.php?err');
	}
	else
	{
				if($name)
				{
					$location="Documents/Synopsis/$name";
					move_uploaded_file($tmp_file,$location);
					$qry="insert into submission(reg_no,t_id,synopsis,synopsis_date,sem_id) values ('$reg','$tid','$location','$sydate','$sid')";
					//echo $qry;
					mysqli_query($con,$qry);
					header('Location:stud_synopsis.php?err');
				}
				else
					{
						echo "Failed Upload";
					}
	}
}


?>