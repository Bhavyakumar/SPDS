<?php
	session_start();
	include 'connection.php';
	
	// print_r($_POST);
	$reg=$_POST['reg'];
	$tid=$_POST['tid'];
	$sid=$_POST['sid'];
	$semid=$_POST['semid'];
	$proj=$_POST['proj'];
	$des=$_POST['des_analysis'];
	$cod=$_POST['code_valid'];
	$present=$_POST['presentation'];
	$UI=$_POST['UIdes'];
	$total=$_POST['totalmark'];
 	$fid=$_SESSION["fid"];
 	$qry="Select * from result where reg_no='".$reg."' and f_id='".$fid."' and sem_id='".$semid."'";
 	$result=mysqli_query($con,$qry);
 	$row=mysqli_num_rows($result);
 	if ($row>=1) 
 	{
 		$query="update result set project_report='".$proj."',design_analysis='".$des."',coding_validation='".$cod."',presentation='".$present."',UI_design='".$UI."',total='".$total."' where f_id='".$fid."' and sem_id='".$semid."'";	
 		$rs=mysqli_query($con,$query);
 	}
 	else
 	{
 		$sql="insert into result (reg_no,t_id,sub_id,project_report,design_analysis,coding_validation,presentation,UI_design,total,f_id,sem_id) values ('$reg','$tid','$sid','$proj','$des','$cod','$present','$UI','$total','$fid','$semid')";
 	// echo $sql;
 		mysqli_query($con,$sql);
 	}


 	// alert("hi");
 	
 	



?>