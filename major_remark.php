<?php
include "connection.php";
session_start();
			$reg=$_POST["regno"];
			$subid=$_POST["subid"];
			$fid=$_SESSION["fid"];
			$remark=$_POST["majremark"];
						$query="SELECT * from remark where sub_id='".$subid."' and f_id='".$fid."'";
						 echo $query;
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>=1)
						{
							$rem="update remark set sy_remark='".$remark."' where sub_id='".$subid."' and status=1	";
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
							$qry= "insert into remark (reg_no,f_id,sy_remark,sub_id,status) values ('$reg','$fid','$remark','$subid',1)";
							echo "$qry";
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
?>