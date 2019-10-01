<?php
// include "connection.php";
session_start();
$con=mysqli_connect("localhost","root","","spds");
// $connect = mysqli_connect("localhost", "root", "", "testing");
$qry= "select * from major_guide where reg_no='".$_SESSION['reg']."'";
$result=mysqli_query($con,$qry);
if(mysqli_num_rows($result)>0)
{
					$title = count($_POST["name"]);
					$lan=count($_POST["lan"]);
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
							$language=$_POST["lan"][$i];
							$dscr=$_POST["des"][$i];
							$date = date('Y-m-d H:i:s');
						
							// echo $dscr;
							$sql = "INSERT INTO title (reg_no,title,title_decscription,language,t_submit_date
								) VALUES('$reg','$name','$dscr','$language','$date')";
								// echo $sql;
								mysqli_query($con, $sql);
						}
						header('location:titlesub.php?err');
					}
					else
					{
						header('location:titlesub.php?arr');
					}
}
else
{
				header('location:titlesub.php?arr');
}
?>