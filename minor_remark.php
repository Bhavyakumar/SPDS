<?php
	session_start();
	include "connection.php";
	if(isset($_POST['submit'])) 
	{
				$reg=$_POST["reg"];
				$fid=$_SESSION['fid'];
				$subid=$_POST['sub'];	
				$remark=$_POST['remark']; 
				if($_SESSION['type']=="Minor")
				{
						$query="SELECT * from remark where sub_id=".$subid;
						// echo $query;
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>=1)
						{
							$rem="update remark set sy_remark='".$remark."' where sub_id='".$subid."' and status=0";
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
							$qry= "insert into remark (reg_no,f_id,sy_remark,sub_id) values ('$reg','$fid','$remark','$subid')";
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
				}
	}
	

?>