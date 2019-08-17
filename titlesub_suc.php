<?php
// include "connection.php";
session_start();
$con=mysqli_connect("localhost","root","","spds");
// $connect = mysqli_connect("localhost", "root", "", "testing");
$title = count($_POST["name"]);
$des = count($_POST["des"]);
$reg= $_SESSION['reg'];
// echo $reg;

// echo $des;
if($title > 0)
{
	for($i=0; $i<$title; $i++)
	{
		$name= $_POST["name"][$i];
		// echo $name;
		$dscr=$_POST["des"][$i];
		$date = date('Y-m-d H:i:s');
	
		// echo $dscr;
		$sql = "INSERT INTO title (reg_no,title,title_decscription,t_submit_date
			) VALUES('$reg','$name','$dscr','$date')";
			// echo $sql;
			mysqli_query($con, $sql);
	}
	header('location:titlesub.php?err');
}
else
{
	header('location:titlesub.php?arr');
}
?>