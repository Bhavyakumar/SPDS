<?php
	// print_r($_POST);
include 'connection.php';
	if(isset($_POST['send']))
	{
  		$maj="";
		foreach($_POST as $key => $value) {
		  	if(substr($key,0,9)=="maj_title")
		  	{
		  		$maj=$value;
		  	}
		  	if($maj!="")
		  	{
		  		 // echo $maj;
		  		$date = date('Y-m-d H:i:s');
		  		$sql="update title set t_status='1',t_submit_date=$date where t_id=".$maj;
		  		mysqli_query($con,$sql);
		  		$maj="";

		  	}

		  		header("location:fetch_title.php?err");
		 }
			// $qr="select *from title where t_status='2'";
		  		// echo $qr;

		  		// $rs=mysqli_query($con,$qr);
		  		// while($row=mysqli_fetch_assoc($rs))
		  		// {
		  		// 	$title=$row['title'];
		  		// }
		  		// setcookie("Min_tit",$title);
		  		// header("location:fetch_title.php");
	}
?>