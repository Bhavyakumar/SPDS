<?php
  include 'webpage_header.php';
?>
<div class="col-sm-12">
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-sm-8">                    
        <div class="panel panel-info" >
           <div class="panel-heading">
              <div class="panel-title">Department</div>
           </div>  
           <div class="panel-body">
             <?php
                        if(isset($_GET['arr']))
                        {
                              echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'>Department successfully Added.  
                              </div>"; 
                        }
                        if(isset($_GET['err']))
                          { 
                             echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'> Department is not Added.</div>";
                          }
                   ?>      
             <form action='department_suc.php' method='POST'>
                                    
                      <div class="form-group blue-border">
                          <label for="dept_name">Department Name</label>
                          <textarea class="form-control" id="dept_name" name="dept_name" rows="1" required></textarea>
                     </div>

                      <br>
                      
                      <div>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit">
                      </div>
             </form>
           </div>   
        </div>
          
</div>
<div id="department" style="margin-top:50px;" class="mainbox col-md-5 col-sm-4">  

  <?php
  include 'connection.php'; 
    $sql = "SELECT * FROM department";
    // echo"<form action='guideallocated.php' method='POST'>"; //echo $sql;
    if($result = mysqli_query($con, $sql))
    {
         if(mysqli_num_rows($result) > 0)
         {
               echo "<table border=1 class='table table-bordered'>";
                     echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Department name</th>";
                        echo "<th>Delete</th>";
                     echo "</tr>";
                     $count=0;
                
                      while($row = mysqli_fetch_array($result))
                      {
                          $count++;
                          echo "<tr>";
                              echo "<td>".$count."</td>";
                              echo "<td>".$row['department']."</td>";
                              echo "<td>";
                                  echo "<a href='del_dept.php?id=".$row["d_id"]."' onclick='return check();'><i class='glyphicon glyphicon-remove' style='font-size:25px; color:red;'></i></a>";
                              echo"</td>";
                          echo "</tr>";    
                      }

                      echo "</table>";
          }
    }
  ?>
</div> 
</div>
<script type="text/JavaScript">
  function check()
  {
    return confirm("Are You Sure?");
  }
</script>
<?php
include 'webpage_footer.php';
?>