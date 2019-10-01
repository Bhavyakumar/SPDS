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
  <style> 

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #ff6e2b;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>

</head>
<body>

<div class="container-fluid">
<div class="row content"> 
<button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-arrow-up"></span></button>

    <div class="col-sm-2 sidenav">
          <a href="http://www.aau.in"><img src="image/AAU-logo-rotate.gif" style="width:40%;"></a><h3><b>SPDS</b></h3>
          <!-- <div style="margin-left: 150px;"><button type="submit" id="submit"><i class="glyphicon glyphicon-menu-hamburger"></i></button></div> -->
          
          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#section1">Dashboard</a></li>
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
          <div style="margin-left: 1030px;">
          <ul class="nav navbar-nav navbar-right " >
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
          </ul> </div>
     </div>
     <div class="col-sm-10">
<?php
	// include 'webpage_header.php';
  include 'connection.php';
?>
<div class="col-sm-12" id="section1">
   <h5 class="section-heading h3 pt-4">Dashboard</h5>
   <div class="row">
    <div class="col-lg-4 mb-4">
		<div class="container" style="width:auto; border:1px solid #ccc;">  
                <br />  
                <p class="bg-primary text-white" style="background-color: red; ">Notice: </p>
                  <marquee behavior="scroll" scrollamount=3 height=200px  direction="up" onmouseover="this.stop();" onmouseout="this.start();" > 
                  
                 <?php
                      $qr=mysqli_query($con,"select * from semester");
                      while($rs=mysqli_fetch_assoc($qr))
                      {
                          $sid=$rs['sem_id'];
                           $sem=$rs['semester'];
                 
                      include 'connection.php';
                      $sql ="SELECT * from activity INNER JOIN semester ON semester.sem_id=activity.sem_id WHERE semester.sem_id='".$sid."'";
                      $result = mysqli_query($con, $sql);
                     
                  ?> 
              
                  <p class="bg-primary text-white">Project Submission Schedule for Semester: <?php echo $sem;?></p>  
                <?php  
                     if(mysqli_num_rows($result) > 0)  
                     {  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          		$original=$row['submission_date'];
                          		$newDate = date("d-m-Y", strtotime($original));
                               echo "<table class='table table-bordered'>";
                               echo "<tr><b>".$row['activity_name']." Date is : " .$newDate ." </b></tr><br>";
                               echo "</table>";  
                          }  
                     }  
                ?>  
                
                <br />   
                 <?php }?>   
                 </marquee>             
           </div> 
 </div>
  <div class=" mb-8 col-lg-offset-5">
     <img src="image/CAIT.jpg" class="img-rounded" alt="Cinque Terre" width="600" height="275">
    </div>
</div>
</div>
    <div class="container col-sm-12" id="section2">
      <br>
       <h3 class="section-heading h3 pt-4">About us</h3>
           <div class="row">
             <div class="col-lg-4 mb-4">

      <!--Form with header-->
                    <div class="card">

                      <div class="card-body">
                        <!--Header-->
                        
                        <!--Body-->
                        <div class="md-form">
                          
                            <p><img src="image/AIT.gif" class="img-rounded" alt="Cinque Terre" width="304" height="236"></p>
                        </div>

                      </div>

                    </div>
      <!--Form with header-->

    </div>
  <div class="col-lg-4 mb-4">
   <img src="image/CAIT.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
 </div>
   <div class="col-lg-4 mb-4">
    <img src="image/logo.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
  </div>
   </div><br>
      <!-- <img src="image/cait.jpg" style="margin-left:50px;width:110%;"> -->
      <div >
    <p align="justify"><b>College of Agricultural Information Technology</b> was established in the year 2009 under the aegis of Anand Agricultural University. The CAIT offers 4-yrs B.Tech. (AIT) and 2-yrs M.Tech. (AIT) programs. The postgraduate master degree program is not offered anywhere in India except by Anand Agricultural University. The college aims to cater to the upcoming demands of the Agrarian Economy by generation of a young workforce skilled with knowhow of future ready Information and Communication Technology and imparting the same in Agricultural sector. The college has trained teaching faculty with a balanced blend of well-experienced seniors and energetic youth focused towards Teaching and Research. The College building is surrounded by lush green natural environment with enough resources such as well-ventilated lecture halls with audio visual facility, computer labs, scientific equipments, Wi-Fi Internet access, library, NCC/NSS, sports, project and placement cell etc. The curriculum of B.Tech. (AIT) is a blend of Agricultural Science and Information and Communication Technology (ICT) to harvest the potential of both the sectors. And we are looking forward to introduce innovative practices of automation and information mitigation by means of ICT in the sparsely charted agriculture and allied sectors to bridge the gap between the skills of the technocrat and the farmer.</p>
   </div>
  
  </div>
<div class="col-sm-12" id="section3">
     <h3 class="section-heading h3 pt-4">Contact us</h3>
         <p class="section-description pb-4">College of Agricultural Information Technology, Anand Agricultural University, Anand.</p> 
           <div class="row">

    <!--Grid column-->
    <div class="col-lg-5 mb-4">

      <!--Form with header--> 
      <div class="card">

        <div class="card-body">
          <!--Header-->
          <div class="form-header blue accent-1">
            <h4><i class="glyphicon glyphicon-envelope"></i> Contact to us:</h4>
          </div><br>

          <!--Body-->
          <div class="md-form">
               <p>College of Agricultural Information Technology</p>
               <p>AAU, Anand</p>
          </div>

          <div class="md-form">
               <p>02692 263 123</p>
              <p>Mon - Sat, 9:00-18:00</p>
          </div>

          <div class="md-form">
              <p>cait@aau.in</p>
          </div>

        </div>

      </div>
      <!--Form with header-->

    </div>
    <div class="col-lg-7">

      <!--Google map-->
      <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
        <div id="map"></div> 
      <script> 
      function initMap() { 
        var uluru = {lat: 22.533718, lng: 72.970071}; 
        var map = new google.maps.Map(document.getElementById('map'), { 
          zoom: 4, 
          center: uluru 
        }); 
        var marker = new google.maps.Marker({ 
          position: uluru, 
          map: map 
        }); 
      } 
    </script> 
    <style> 
      #map { 
        height: 350px; 
        width: 100%; 
       } 
    </style> 
    <script async defer src="https://maps.googleapis.com/maps/api/js?key= 
      AIzaSyBVT2Yck5sYqDkIhv9xPy-Xl4ED_Afn-AU&callback=initMap"> 
    </script> 
      </div>

  </div>
</div>
</div>
</div>
  
    <footer class="footer col-sm-12">
      <p style="text-align: center;font-size:100% ;font-color:black;">Copyright © 2019 All Rights Reserved</p>
    </footer>
  </div>
</div>
</div>
</body>
</html>
<script>
//Get the button
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#myBtn').fadeIn();
    } else {
        $('#myBtn').fadeOut();
    }
});
$(document).ready(function() {
    $("#myBtn").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
</script>