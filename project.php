<?php
  include 'webpage_header.php';
?>
<?php
  include 'connection.php';
		echo"<div class='panel-heading'>";
			echo"<div class='panel-title'><h3>Recent Projects</h3></div>";
	    echo "</div>";
	
			$sql = "SELECT * FROM project INNER JOIN student ON student.reg_no=project.reg_no INNER JOIN semester ON semester.sem_id=student.sem_id INNER JOIN title ON title.t_id=project.t_id";
			if($rs=mysqli_query($con,$sql))
			{
				if(mysqli_num_rows($rs) > 0)
				{
					echo "<table id='example' class='table table-striped table-bordered' style='width:100%'>";
					echo "<thead>";
           		     	echo "<tr>";
           		     		 echo "<th>Title</th>";
		                      echo "<th>Reg no</th>";
		                      echo "<th>Name</th>";
		                      echo "<th>Email</th>";
		                      echo "<th>Roll No.</th>";
		                      echo "<th>Semester</th>";
		                      echo "<th>Project(RAR File)</th>";
					echo "</thead>";
	                    echo "</tr>";
                    $count=0;
                    echo "<tbody>";
					while ($row=mysqli_fetch_assoc($rs)) 
					{
						$count++;
                        echo "<tr>";

                            echo "<td>".$row['title']."</td>";
                            echo "<td>".$row['reg_no']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['roll_no']."</td >"; 
                            echo "<td>".$row['semester']."</td>";
                       		echo "<td><a href='project_download.php?id=".$row["p_id"]."' style='color:green'><button class='btn margin-top' style=' background-color: DodgerBlue;color: white; '><span class='glyphicon glyphicon-download-alt'></span> Download</button></a></td>";
       		 	 
					}
					    echo "</tbody>";
					echo "</table>";
				}	
			}
?>
<script>
	$(document).ready(function() {
   		 $("#example").DataTable();
});
</script>
<?php
  include 'webpage_footer.php';
?>
