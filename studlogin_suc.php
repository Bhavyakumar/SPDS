<?php
	include 'connection.php';
	if(isset($_POST['submit']))
  	{
      $suname=$_POST['suname'];
      $spwd=$_POST['spwd'];
      $cnt=0;
      $qry="select * from student";
      $rs=mysqli_query($con,$qry);
      //$count = mysqli_num_rows($rs);
      while($row=mysqli_fetch_assoc($rs))
      {
      		if($suname==$row['email'] && $spwd==$row['password'])
      		{	
     	        
              session_start();
              $_SESSION["stud"]=$suname;
              $_SESSION['reg']=$row['reg_no'];
              $cnt++;
              header('location:index.php');
      		}        
      }
      if($cnt==0){
        header('location:studentlogin.php?arr');
      }
  }
?>