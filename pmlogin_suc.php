<?php
session_start();
  include 'connection.php';
  if(isset($_POST['submit']))

  {
    $uname=$_POST['pmuname'];
    $pmpwd=$_POST['pmpwd'];
    $qry="select * from Admin where username='".$uname."' and password='".$pmpwd."'";
    $rs=mysqli_query($con,$qry);
    $result= mysqli_num_rows($rs);
    $row=mysqli_fetch_assoc($rs);
    if($result==0)
    {
      header('location:pmlogin.php?arr');  
    }
    else
    {
      if($row['type']=='PM')
      {
        $_SESSION["pm"]=$row['username'];
        header('location:index.php'); 
      }else
      {
       
        
       $_SESSION["clerk"]=$row['username'];
       header('location:index.php');
     }           
   }          
   
 }
      
?>