
 <?php

include_once "connection.php";
	
if(isset($_POST['accept']))
{
	$drop=$_POST['guide'];
	$hid=$_POST['hidden'];
	// echo $drop;
	// echo $hid;
	$qry="update faculty set f_status='1',type='".$drop."' where f_id=".$hid;
		if( $rs= mysqli_query($con,$qry))
	    {
			header("Location: faculty_approval.php"); 
   	    }
		else
		{
			echo mysql_error();
		}
}
else
{
	$id=$_GET['id'];
	// echo $id;
	$qr="delete from faculty where f_id=".$id;
	mysqli_query($con,$qr);
	header("Location: faculty_approval.php");

}
 
  // $rs= mysql_query($qry); 
  
?>