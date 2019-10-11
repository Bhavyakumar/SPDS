<?php
session_start();
	include 'connection.php';
	if(isset($_POST['submit']))
  	{
        $captcha=$_POST['captcha'];
        $capses= $_SESSION["captcha_code"];
        if ($captcha== $capses) 
          {
            $funame=$_POST['funame'];
            $fpwd=$_POST['fpwd'];
            $cnt=0;
            $qry="select * from faculty where f_status='1'";
            $rs=mysqli_query($con,$qry);
            //$count = mysqli_num_rows($rs);
            while($row=mysqli_fetch_assoc($rs))
            {
               
            		if($funame==$row['email'] && $fpwd==$row['password'])
            		{
            			  session_start();
           	        $_SESSION["fac"]= $row['name'];
                    $_SESSION["fid"]=$row['f_id'];
                    $_SESSION["type"]=$row['type'];
                    $cnt++;
           	        header("location:index.php");

            		}	
            }
            if($cnt==0){
              header('location:facultylogin.php?arr');
            }
        }
        else
        {
          header('location:facultylogin.php?rr');
        }
  	}
?>