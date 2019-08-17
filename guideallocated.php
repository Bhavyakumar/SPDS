<?php
	include 'connection.php';
	if(isset($_POST['accept']))
	{
		$maj="";
  		$min="";
  		$regno="";
		foreach($_POST as $key => $value) {
		  	if(substr($key, 0,6)=="hidden")
		  	{
		  		$regno=$value;
		  	}
		  	if(substr($key, 0,3)=="maj")
		  	{
		  		$maj=$value;
		  	}
		  	if(substr($key, 0,3)=="min")
		  	{
		  		$min=$value;
		  	}
		  	if($regno!="" && $maj!="" && $min!="")
		  	{
		  		echo $maj."--".$min."--".$regno."<br>";
		  		
				$sql="insert into major_guide (reg_no,f_id) values ('$regno','$maj') ";
				mysqli_query($con,$sql);
				

				$qr="insert into minor_guide (reg_no,f_id) values ('$regno','$min') ";
				mysqli_query($con,$qr);
				
		  		$maj="";
		  		$min="";
		  		$regno="";
		  	}
		  	header('location:guide_allocation.php?err');
		  	
		}

		// /*$maj=$_POST['maj'];*/
		
		// $reg_no=$_POST['hidden'];
		// echo $reg_no;
		// print_r ($_POST);
		// $sql="insert into major_guide (reg_no,f_id) values ('$reg_no','$maj') ";
		// echo $sql;
		// if($result=mysqli_query($con,$sql));
		// {
		// 	header('location:guide_allocation.php');
		// }
		// $min=$_POST['min'];
		// $qr="insert into minor_guide (reg_no,f_id) values ('$reg_no','$min') ";
		// echo $sql;
		// if($rs=mysqli_query($con,$qr));
		// {
		// 	header('location:guide_allocation.php');
		// }


	}


?>