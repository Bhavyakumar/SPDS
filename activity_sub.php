<?php
  include 'webpage_header.php';
?>
<div class="col-sm-12">
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-0 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
           <div class="panel-heading">
              <div class="panel-title">Activity Sbmission Dates </div>
           </div>  
           <div class="panel-body">
             <?php
                        if(isset($_GET['arr']))
                        {
                              echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'>Activity successfully Added.  
                              </div>"; 
                        }
                        if(isset($_GET['err']))
                          { 
                             echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'> Activity is not Added.</div>";
                          }
                   ?>      
             <form action='activity_sub_suc.php' method='POST'>
                       <div class="form-group col-md-6">
                              <label for="sem">Semester</label>
                              <select id="sem" name="sem" class="form-control" required>
                                <option selected>Select Semester</option>
                                 <?php
                                    include 'connection.php';
                                    $qry="select * from semester";
                                    $rs=mysqli_query($con,$qry);
                                    while($row=mysqli_fetch_assoc($rs))
                                    {
                                        echo "<option value=".$row['sem_id'].">".$row['semester']."</option>";
                                    }
                                ?>
                              </select>
                            </div> 
                      <div class="input-group col-md-6">
                        <label for="sub_date">Submission Date</label>
                        <input type="date" class="form-control" id="sub_date" name="sub_date" required>
                      </div>  
                      <br>
                      <div class="input-group col-md-12">
                        <label for="activityname ">Activity name</label>
                        <input type="text" class="form-control" name="activityname" id="activityname" placeholder="Activity name" required>
                      </div><br>
                      <div>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit">
                      </div>
             </form>
           </div>   
        </div>
        
</div>
</div>
<?php
include 'webpage_footer.php';
?>