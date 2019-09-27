<?php
include 'connection.php';
$sem_id=$_GET['sid'];
// setcookie("sem_id","$_GET['sid']");
	$sql = "SELECT * FROM student where sem_id='".$sem_id."'";
	// echo"<form action='guideUpdated.php' method='POST'>";//	echo $sql;
    $major_guide="SELECT * FROM major_guide inner join student on student.reg_no=major_guide.reg_no where sem_id='".$sem_id."'";
    $majrs=mysqli_query($con,$major_guide);
    if(mysqli_num_rows($majrs))
    {
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
                          echo "<th></th>";
                          echo "</tr>";
                          $count=0;
                      	
                      while($row = mysqli_fetch_array($result)){
                          $count++;
                           echo "<tr>";
                              echo "<td>".$row['reg_no']."</td>";
                              echo "<td>".$row['name']."</td>";
                              echo "<td>".$row['email']."</td>";
                              echo "<td>".$row['roll_no']."</td>";
                                echo "<input type='hidden' name='hidden' value='".$row['reg_no']."' id='hidden'>"; 
                          $qr="SELECT * FROM faculty inner join major_guide on major_guide.f_id=faculty.f_id where type='Major' and f_status='1' and reg_no='".$row['reg_no']."'";
                          $rs=mysqli_query($con,$qr);
                          echo" <td>";
                          while($majsel=mysqli_fetch_assoc($rs))
                          {
                              echo "<select id='majsel".$row['reg_no']."' name='majsel' class='form-control' required>";
                              echo "<option value=".$majsel['f_id'].">".$majsel['fname']."</option>";
                          }
                          $major="SELECT * FROM faculty where type='Major' and f_status='1'";
                          $majg=mysqli_query($con,$major);
                          while($maj=mysqli_fetch_assoc($majg))
                          {
                              
                                 echo "<option value='".$maj['f_id']."'>".$maj['fname']."</option>";
                          }
                               echo "</select>";
                          echo"</td>";    
                          $qr="SELECT * FROM faculty inner join minor_guide on minor_guide.f_id=faculty.f_id where type='Minor' and f_status='1' and reg_no='".$row['reg_no']."'";
                          $rs=mysqli_query($con,$qr);
                          echo" <td>";
                          while($minsel=mysqli_fetch_assoc($rs))
                          {
                              echo "<select id='minsel".$row['reg_no']."' name='minsel' class='form-control' required>";
                              echo "<option value=".$minsel['f_id'].">".$minsel['fname']."</option>";
                          }
                          $minor="SELECT * FROM faculty where type='Minor' and f_status='1'";
                          $ming=mysqli_query($con,$minor);
                          while($minsel=mysqli_fetch_assoc($ming))
                          {
                                 echo "<option value='".$minsel['f_id']."'>".$minsel['fname']."</option>";
                          }
                               echo "</select>";
                          echo"</td>";
                           
                              echo "<td colspan='6' align='center'>";
                                  echo "<button  type='submit' id='submit' name='edit' class='edit btn-primary' data='".$row['reg_no']."'><span class='glyphicon glyphicon-ok'></span></button>";
                              echo "</td>"; 
                  

                          // echo "<td><select id='min' name='min' class='form-control' required><option value=''>Select Minor</td>";
                   
                          echo "</tr>";
                          // echo "</form>";
                      }
                          
                        echo "</table>";
                  // Free result set
                  mysqli_free_result($result);
                  // $qry="SELECT * FROM faculty";
                  // $result = mysqli_query($con,$qry);      
          	  
              }
              else
              {
                  echo "<div class='alert alert-success' role='alert'> No Guide allocation is done.</div>";
              }
                //
          }  
      }
      else
      {
            echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>No Guide allocation is done.</div>";
      }    

?>
<script>
     $(document).ready(function(){
        $(".edit").click(function(){
                 // alert("Hello");
              var reg=$(this).attr("data");
              var majsel=$("#majsel"+reg).val();
              var minsel=$("#minsel"+reg).val();
              // alert(minsel);
              //   alert(majsel);
              $.ajax({
                    url:'guideUpdated.php',
                    method:'POST',
                    data:{
                        reg:reg,
                        majsel:majsel,
                        minsel:minsel,
                    },
                    success:function(data){
                    alert("Updated Successfully");
                    
                   }
                });
        });
     });  

</script>