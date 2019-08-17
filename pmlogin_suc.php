<?php
session_start();
if(isset($_POST['submit']))

  {
      $uname=$_POST['pmuname'];
      $pmpwd=$_POST['pmpwd'];
      if($uname=='CAIT' && $pmpwd=='CAIT')
      {
           
           $_SESSION["pm"]=123;
           header('location:index.php');
	    }
      else
      {
        if ($uname=='clerkCAIT' && $pmpwd=='clerkCAIT')
         {
             $_SESSION["clerk"]=123;
              header('location:index.php');
          
         }
         else
         {
                header('location:pmlogin.php?arr');    
         }

          // header('location:pmlogin.php?arr');    

      }
      
  }
?>