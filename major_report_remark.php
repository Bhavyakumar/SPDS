<?php
	session_start();
	include "connection.php";
	if(isset($_POST['Send'])) 
	{
				$reg=$_POST["regno"];
				$fid=$_SESSION['fid'];
				$subid=$_POST['subid'];	
				$remark=$_POST['majremark']; 
						$query="SELECT * from remark where sub_id='".$subid."' and status=1" ;
						// echo $query;
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>=1)
						{
							$rem="update remark set re_remark='".$remark."' where sub_id='".$subid."' and status=1";
							$uprem=mysqli_query($con,$rem);
							if($uprem)
							{
								header('location:fetch_report.php?err');
							}
							else
							{
								header('location:fetch_report.php?arr');
							}
						}
						else
						{
							$qry= "update remark set re_remark='".$remark."' where sub_id='".$subid."' and status=1";
							echo "$qry";
							$rs=mysqli_query($con,$qry);
							if($rs)
							{
								header('location:fetch_report.php?err');
							}
							else
							{
								header('location:fetch_report.php?arr');
							}
						}
		
	}
	

?>