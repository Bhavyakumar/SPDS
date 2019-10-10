<?php
	session_start();
	include "connection.php";
	if(isset($_POST['submit'])) 
	{
				$reg=$_POST["reg"];
				$fid=$_SESSION['fid'];
				$subid=$_POST['sub'];	
				$sem_id=$_POST['sid'];	
				$remark=$_POST['remark']; 
				if($_SESSION['type']=="Minor")
				{
						$query="SELECT * from remark where sub_id='".$subid."' and f_id='".$fid."' and sem_id='".$sem_id."'";
						// echo $query;
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>=1)
						{
							$rem="update remark set sy_remark='".$remark."' where sub_id='".$subid."' and status=0 and sem_id='".$sid."'";
							$uprem=mysqli_query($con,$rem);
							if($uprem)
							{
								header('location:fetch_synopsis.php?err');
							}
							else
							{
								header('location:fetch_synopsis.php?arr');
							}
						}
						else
						{
							$qry= "insert into remark (reg_no,f_id,sy_remark,sub_id,sem_id) values ('$reg','$fid','$remark','$subid','$sem_id')";
							echo $qry;
							$rs=mysqli_query($con,$qry);
							if($rs)
							{
								header('location:fetch_synopsis.php?err');
							}
							else
							{
								header('location:fetch_synopsis.php?arr');
							}
						}
				}
	}
	

?>