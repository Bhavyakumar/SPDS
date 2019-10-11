<?php
session_start();
	include 'connection.php';
	if(isset($_POST['submit']))
  	{
      $captcha=$_POST['captcha'];
    $capses= $_SESSION["captcha_code"];
    if ($captcha== $capses) 
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
              $_SESSION['semid']=$row['sem_id'];
              $cnt++;
              header('location:index.php');
      		}        
      }
      if($cnt==0){
        header('location:studentlogin.php?arr');
      }
    }
    else
    {
      header('location:studentlogin.php?rr');
    }
  }
?>