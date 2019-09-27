<script>
  $(document).ready(function() {
       $("#example").DataTable();
});
</script>
<?php
include 'connection.php';
$sem_id=$_GET['sid'];
// setcookie("sem_id","$_GET['sid']");
	$sql = "SELECT * FROM student where sem_id=".$sem_id;
	echo"<form action='guideallocated.php' method='POST'>";	//echo $sql;
	if($result = mysqli_query($con, $sql))
  {
   		 if(mysqli_num_rows($result) > 0)
       {
            
       		 	 echo "<table border=1 class='table table-bordered' id='example'>";
             echo "<thead>";
           		     echo "<tr>";
                      echo "<th>Reg no</th>";
                      echo "<th>Name</th>";
                      echo "<th>Email</th>";
                      echo "<th>Roll No.</th>";
                      echo "<th>Major Guide</th>";
                      echo "<th>Minor Guide</th>";
            echo "</thead>";
                   echo "</tr>";
                   $count=0;
                echo "<tbody>";
                    while($row = mysqli_fetch_array($result))
                    {
                        $count++;
                        echo "<tr>";
                            echo "<td>".$row['reg_no']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['roll_no']."</td >"; 
                            $qr="SELECT fname FROM major_guide INNER JOIN faculty ON major_guide.f_id = faculty.f_id where reg_no='".$row['reg_no']."'";
                            $rs=mysqli_query($con,$qr);
                            while($maj=mysqli_fetch_assoc($rs))
                            {
                                echo "<td>".$maj['fname']."</td>";
                            }
                             $qr="SELECT fname FROM minor_guide INNER JOIN faculty ON minor_guide.f_id = faculty.f_id where reg_no='".$row['reg_no']."'";
                             // echo $qr;
                            $rs=mysqli_query($con,$qr);
                             while($min=mysqli_fetch_assoc($rs))
                             {
                                echo "<td>".$min['fname']."</td>";
                             }

                    }
                    echo "</tbody>";
                    echo "</table>";
        }
        else
    {
        echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>No Guide allocation is done.</div>";
    } 
  }
?>