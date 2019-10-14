<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="image/logo.jpg">
  <title> Welcome to SPDS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <script src="css/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   <!-- <script src="cookie.jquery.json"></script> -->
  <script src="css/bootstrap.min.js"></script>

 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
  <!-- <script>
    $(document).ready(function(){
      $('#submit').on('click',function(){
          $('.sidenav').width('100px');
      });

    });
  </script> -->
   <!-- <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    });
  </script>
   <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    });
  </script>
 -->
  <style>
     .loader { /*/*position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('image/LoaderIcon.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8*/;
    }
    /* Set height of the grid so   .sidenav can be 100% (adjust if needed) */
    
    /* Set gray background color and 100% height */
    .sidenav:hover {
      /*background-color: #f1f1f1;*/
      /*height: 100vh;*/
      box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);


    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color:#FFFFFF;
      color: black;
      display:none;
      position: absolute;
      left: 1px;
      bottom: 1px;
      height: 200px;
      width: 100%;
      box-shadow: inset 0 -3em 3em rgba(0,0,0,0.1), 
             0 0  0 2px rgb(255,255,255),
             0.3em 0.3em 1em rgba(0,0,0,0.3);
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
   /* @media screen and (max-width: 767px) {
      .sidenav {
        height: 15px;
        padding: 15px;
      }*/
     /* .row.content {height: auto;} */
  
  </style>
  <script>
    function footerAlign() {
          $('.footer').css('display', 'block');
          $('.footer').css('height', '50px');
          var footerHeight = $('footer').outerHeight();
          $('body').css('padding-bottom', footerHeight);
          $('.footer').css('height', footerHeight);
          $('.footer')
        }
      $(document).ready(function(){
        footerAlign();
      });
      $( window ).resize(function() {
        footerAlign();
      });
      
  </script>
</head>
<body>
  <!-- <div class="loader"></div> -->
<div class="container-fluid">
<div class="row content"> 

    <div class="col-sm-2 sidenav">
          <a href="http://www.aau.in"><img src="image/AAU-logo-rotate.gif" style="width:40%;"></a><h3><b>SPDS</b></h3>
          <!-- <div style="margin-left: 150px;"><button type="submit" id="submit"><i class="glyphicon glyphicon-menu-hamburger"></i></button></div> -->
          
          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="index.php">Dashboard</a></li>
            <?php
             session_start();
                  if(isset($_SESSION['type']))
                  {
                     echo "<li><a href='fac_mark.php'>Mark</a></li>";
                  }
                   if(isset($_SESSION['stud']))
                  {
                      echo "<li><a href='fetch_result.php'>Result</a></li>";
                     echo "<li><a href='project_uploadation.php'>Project Uploadation(RAR File)</a></li>";
                  }
                  
            ?>
             
              <li><a href="aboutus.php">About</a></li>
              <li><a href="contactus.php">Contact us</a></li>
          </ul><br>
    </div>
    <div class="col-sm-10" style="background-color: #f1f1f1;">
           <h2><b>Student Project Distribution System for CAIT</b></h2>
    </div>
     <!-- <div class="collapse navbar-collapse col-sm-10" id="myNavbar"> -->
          <ul class="nav navbar-nav col-sm-8">
            <?php
           
                if(isset($_SESSION['type']))
                {
                    echo "<li><a href='fetch_title.php'>Title</a></li>";
                    echo '<li class="dropdown"><a class="dropdown-toggle"  data-toggle="dropdown" href="#"> Submission <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                              <li><a href="fetch_synopsis.php">Synopsis</a></li>
                             <li><a href="fetch_report.php">Report</a></li>
                        </ul></li>';
                }
                if(isset($_SESSION['pm']))
                {
                  echo "<li><a href='faculty_approval.php'>Faculty approval</a></li>";
                  // echo "<li><a href='guide_allocation.php'>Guide Allocation</a></li>";
                   echo '<li class="dropdown"><a class="dropdown-toggle"  data-toggle="dropdown" href="#"> Guide Allocation<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                              <li><a href="guide_allocation.php">Allocate Guides</a></li>
                             <li><a href="update_guides.php">Update Guides</a></li>
                        </ul></li>';
                }  

                if(isset($_SESSION['clerk']))
                {
                  echo "<li><a href='activity_sub.php'>Submission Date</a></li>";
                  echo "<li><a href='add_department.php'>Department</a></li>";
                }
                else
                {
                   echo " <li><a href='project.php'>Projects</a></li>";
                   echo " <li><a href='guides.php'>Guides</a></li>";
                }
                if(isset($_SESSION['stud']))
                {
                  echo "<li><a href='titlesub.php'>Title</a></li>";
                  include "connection.php";
                    // $requery="SELECT * FROM remark where status=1 and re_status=0 and sy_status=0 and reg_no='".$_SESSION['reg']."'";
                    // $rerem=mysqli_query($con,$requery);
                    // $hel=mysqli_num_rows($rerem);
                  $query="SELECT * FROM remark where status=1 and sy_status=0 and reg_no='".$_SESSION['reg']."'";
                  $rem=mysqli_query($con,$query);
                  $count=mysqli_num_rows($rem);
                  $requery="SELECT * FROM remark where status=1 and re_status=0 and reg_no='".$_SESSION['reg']."'";
                    $rerem=mysqli_query($con,$requery);
                    $hel=mysqli_num_rows($rerem);
                    $total=$hel+$count;
                  echo "<li><a href='stud_synopsis.php'>Submission<sup><span class='badge badge-success'>".$total."</span></sup></a></li>";
                  // echo "<li><span class='glyphicon glyphicon-bell' style='font-size:24px'></li>";
                        

                }  
            ?>
            <!-- <li><a href="#">Projects</a></li> -->
            <!-- <li><a href="#">Contact</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            
            if(isset($_SESSION['pm']) || isset($_SESSION['stud']) || isset($_SESSION['type']) || isset($_SESSION['clerk']))
            {
                 echo '<li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" glyphicon glyphicon-cog" style="font-size:24px"></i><span class="caret">';
                  echo '<ul class="dropdown-menu">';
                         echo '<li><a href="update_profile.php"><span class="glyphicon glyphicon-user"> Profile </span></a></li>';
                          echo '<li><a href="logout.php"><span class="glyphicon glyphicon-off"> Logout </span></a></li>';
                  echo '</ul>';
                  echo '</li>';  
                 // echo "<li><h4 style='padding-left:150px;font-family:UniversCondensed;color:red'> Welcome to ".$_SESSION['fac']."</h4></li>";
            }
            else
            {
              echo ' <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Login <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="pmlogin.php">Project Manager and Clerk</a></li>
                  <li><a href="studentlogin.php">Student</a></li>
                  <li><a href="facultylogin.php">Faculty</a></li>
                </ul></li>
              ';
            }
            ?>
          </ul>
     
     <div class="col-sm-10">