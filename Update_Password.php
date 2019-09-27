<?php
  include 'connection.php';
	if(isset($_POST["save"]))
	{
		$uname=$_POST['uname'];
		$pwd=$_POST['confirmpassword'];
			if($uname=='cait@aau.in')
			{
				$sql="update Admin set password='".$pwd."' where username='".$uname."'";
				// echo $sql;
				mysqli_query($con,$sql);
				header("Location:Changepwd.php?arr");
			}
			elseif($uname=='clerkcait@aau.in')
			{
				$qry="update Admin set password='".$pwd."' where username='".$uname."'";
				// echo $sql;
				mysqli_query($con,$qry);
				header("Location:Changepwd.php?arr");
			}else
			{
				header("Location:Changepwd.php?err");
			}
			
			
	}
?>