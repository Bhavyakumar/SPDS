<?php
include 'connection.php';
$sem_id=$_GET['sid'];
// setcookie("sem_id","$_GET['sid']");
	$sql = "SELECT * FROM student where sem_id=".$sem_id;
	echo"<form action='guideallocated.php' method='POST'>";	//echo $sql;
	if($result = mysqli_query($con, $sql)){
   		 if(mysqli_num_rows($result) > 0){
       		 	echo "<table border=1 class='table table-bordered'>";
           		echo "<tr>";
                echo "<th>Reg no</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Roll No.</th>";
                echo "<th>Major Guide</th>";
                echo "<th>Minor Guide</th>";
                echo "</tr>";
                $count=0;
            	
            while($row = mysqli_fetch_array($result)){
                $count++;
                 echo "<tr>";
                    echo "<td>".$row['reg_no']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['roll_no']."</td>";
                      echo "<input type='hidden' name='hidden".$count."' value='".$row['reg_no']."' id='hidden'>"; 
                $qr="SELECT * FROM faculty where type='Major' and f_status='1'";
                $rs=mysqli_query($con,$qr);
                echo" <td>";
                    echo "<select id='maj' name='maj".$count."' class='form-control' required>";
                    echo "<option value=''>Select Major Guide</option>";
                while($maj=mysqli_fetch_assoc($rs))
                {
                       echo "<option value='".$maj['f_id']."'>".$maj['name']."</option>";
                }
                     echo "</select>";
                echo"</td>";    
                $qr="SELECT * FROM faculty where type='Minor' and f_status='1'";
                $rs=mysqli_query($con,$qr);
                echo" <td>";
                    echo "<select id='min' name='min".$count."' class='form-control' required>";
                    echo "<option value=''>Select Minor Guide</option>";
                while($min=mysqli_fetch_assoc($rs))
                {
                       echo "<option value='".$min['f_id']."'>".$min['name']."</option>";
                }
                     echo "</select>";
                echo"</td>";
                 

                // echo "<td><select id='min' name='min' class='form-control' required><option value=''>Select Minor</td>";
         
                echo "</tr>";
               
            }
                echo "<tr>";
                    echo "<td colspan='6' align='center'>";
                            echo "<input  type='submit' id='submit' name='accept' class='btn btn-primary' value='Submit'>"; 
                    echo "</td>"; 
                echo "</tr>";
              echo "</table>";
        // Free result set
        mysqli_free_result($result);
        // $qry="SELECT * FROM faculty";
        // $result = mysqli_query($con,$qry);      
	  
    }
    else
    {
        echo "<div class='alert alert-success' role='alert'>No Guide allocation is done.</div>";
    }
      echo "</form>";
}  

?>