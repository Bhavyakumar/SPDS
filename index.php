<?php
	include 'webpage_header.php';
?>
<div class="col-sm-12">
		<?php
		 
				include 'connection.php';
				$sql = "SELECT * FROM activity";
				$result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result)
		?> 
		<div class="container col-sm-7" style="width:auto; border:1px solid #ccc;">  
                <br />  
                <p class="bg-primary text-white" style="background-color: red; ">Notice: </p>
                <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start();">  
                  <p class="bg-primary text-white">Project Submission Schedule for<?php ?></p>  
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
                </marquee>  
                <br />                 
           </div>  
		<div class='container col-sm-5'>
			<img src="image/cait.jpg" style="margin-left:100px; margin-right:50px;width:100%;">
		</div>
    <br>
    <div class="container col-sm-12">
      <br>
    <p align="justify"><b>College of Agricultural Information Technology</b> was established in the year 2009 under the aegis of Anand Agricultural University. The CAIT offers 4-yrs B.Tech. (AIT) and 2-yrs M.Tech. (AIT) programs. The postgraduate master degree program is not offered anywhere in India except by Anand Agricultural University. The college aims to cater to the upcoming demands of the Agrarian Economy by generation of a young workforce skilled with knowhow of future ready Information and Communication Technology and imparting the same in Agricultural sector. The college has trained teaching faculty with a balanced blend of well-experienced seniors and energetic youth focused towards Teaching and Research. The College building is surrounded by lush green natural environment with enough resources such as well-ventilated lecture halls with audio visual facility, computer labs, scientific equipments, Wi-Fi Internet access, library, NCC/NSS, sports, project and placement cell etc. The curriculum of B.Tech. (AIT) is a blend of Agricultural Science and Information and Communication Technology (ICT) to harvest the potential of both the sectors. And we are looking forward to introduce innovative practices of automation and information mitigation by means of ICT in the sparsely charted agriculture and allied sectors to bridge the gap between the skills of the technocrat and the farmer.</p></div>
</div> 

<?php
	include 'webpage_footer.php';
?>