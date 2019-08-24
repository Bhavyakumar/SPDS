<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="image/logo.jpg">
  <title>SPDS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/jquery.min.js"></script>
  
   <!-- <script src="cookie.jquery.json"></script> -->
  <script src="css/bootstrap.min.js"></script>
  <!-- <script>
    $(document).ready(function(){
      $('#submit').on('click',function(){
          $('.sidenav').width('100px');
      });

    });
  </script> -->
  <style>
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

<div class="container-fluid">
<div class="row content"> 

    <div class="col-sm-2 sidenav">
          <a href="http://www.aau.in"><img src="image/logo.jpg" style="width:40%;"></a><h3><b>SPDS</b></h3>
          <!-- <div style="margin-left: 150px;"><button type="submit" id="submit"><i class="glyphicon glyphicon-menu-hamburger"></i></button></div> -->
          
          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="index.php">Dashboard</a></li>
            <?php
             session_start();
                  if(isset($_SESSION['type']))
                  {
                     echo "<li><a href='fac_mark.php'>Mark</a></li>";
                  }
            ?>
             
              <li><a href="#section2">About</a></li>
              <li><a href="#section3">Contact us</a></li>
          </ul><br>
    </div>
    <div class="col-sm-10" style="background-color: #f1f1f1; height: 50px;">
          <h2><b>Student Project Distribution System</b></h2>
    </div>
     <div class="collapse navbar-collapse col-sm-10" id="myNavbar">
          <ul class="nav navbar-nav">
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
                  echo "<li><a href='guide_allocation.php'>Guide Allocation</a></li>";
                }  

                if(isset($_SESSION['clerk']))
                {
                  echo "<li><a href='activity_sub.php'>Submission Date</a></li>";
                  echo "<li><a href='add_department.php'>Department</a></li>";
                }
                else
                {
                   echo " <li><a href=''>Project</a></li>";
                   echo " <li><a href='guides.php'>Guides</a></li>";
                }
                if(isset($_SESSION['stud']))
                {
                  echo "<li><a href='titlesub.php'>Title</a></li>";
                  echo "<li><a href='stud_synopsis.php'>Submission</a></li>";
                        

                }  
            ?>
            <!-- <li><a href="#">Projects</a></li> -->
            <!-- <li><a href="#">Contact</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            
            if(isset($_SESSION['pm']) || isset($_SESSION['stud']) || isset($_SESSION['fac']) || isset($_SESSION['clerk']))
            {
                 echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=" glyphicon glyphicon-cog" style="font-size:24px"></i><span class="caret">';
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
     </div>
     <div class="col-sm-10">