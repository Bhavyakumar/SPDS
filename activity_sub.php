<?php
  include 'webpage_header.php';
?>
<script type="text/javascript">
  function checkDate() {
   var selectedText = document.getElementById('sub_date').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
       alert("Date must be in the future");
       document.getElementById("sub_date").value = "";
   }
 }
 function ValidateActivity() {
        var isValid = false;
        var regex = /^[a-zA-Z ]+$/;
        isValid = regex.test(document.getElementById("activityname").value);
        document.getElementById("spnErrorActivity").style.display = !isValid ? "block" : "none";
        return isValid;
    }
     function validateForm() {
    if(( $("#spnErrorActivity").css('display') == 'none' || $("#spnErrorActivity").css("visibility") == "hidden"))
    {

    }
    else
    {
      return false;
    }

  }
</script>
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
             <form id="insert" action='activity_sub_suc.php' method='POST'>
                       <div class="form-group col-md-6">
                              <label for="sem">Semester</label>
                              <select id="sem" name="sem" class="form-control" required>
                                <option value="">Select Semester</option>
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
                        <input type="date" class="form-control" id="sub_date" name="sub_date" onchange="checkDate()" required>
                      </div>  
                      <input type="hidden" name="hide" id="aid">
                      <br>
                      <div class="input-group col-md-12">
                        <label for="activityname ">Activity name</label>
                        <input type="text" class="form-control" name="activityname" id="activityname" placeholder="Activity name" maxlength="50" onchange="return ValidateActivity(this)" required>
                        <span id="spnErrorActivity" style="color: Red; display: none">*Valid characters: alphabetical only And maximum 50 characters are allowed.</span>
                      </div><br>
                      <div>
                        <input type="submit" name="Mark" id="Mark" class="btn btn-info submit" value="Submit">
                        
                        <input type="submit" name="edit" id="edit" class="btn btn-info editact" value="Save Changes" style="display: none">
                      </div>
             </form>
           </div>   
        </div>
        
</div>
<div id="department" style="margin-top:50px;" class="mainbox col-md-5 col-sm-4">  
   <?php
  include 'connection.php'; 
    $sql = "SELECT a_id,activity_name,submission_date,semester,activity.sem_id AS id FROM activity INNER JOIN semester on semester.sem_id=activity.sem_id";
    // echo"<form action='guideallocated.php' method='POST'>"; //echo $sql;
    if($result = mysqli_query($con, $sql))
    {
         if(mysqli_num_rows($result) > 0)
         {
               echo "<table border=1 class='table table-striped table-bordered'>";
                     echo "<tr>";
                        echo "<th>Sr No.</th>";
                        echo "<th>Activity name</th>";
                        echo "<th>Submission Date</th>";
                        echo "<th>Semester</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                     echo "</tr>";
                     $count=0;
                
                      while($row = mysqli_fetch_array($result))
                      {
                          $count++;
                          echo "<tr>";
                              echo "<td><label>".$count."</label></td>";
                              echo "<td><label id='act".$row['a_id']."'>".$row['activity_name']."</label></td>";
                               echo "<td><label id='date".$row['a_id']."'>".$row['submission_date']."</label></td>";
                               echo "<td><label id='sem".$row['id']."'>".$row['semester']."</label></td>";
                               echo"<input type='hidden' id='".$row['a_id']."' value='".$row['id']."'>";
                                echo "<td>";
                                  echo "<button type='button' modalid='".$row["a_id"]."' class='edit' id='update'><a href='update_activity.php?id=".$row["a_id"]."' ><i class='glyphicon glyphicon-edit' style='font-size:25px;'></i></a></button>";
                              echo"</td>";
                              echo "<td>";
                                  echo "<a href='del_activity.php?id=".$row["a_id"]."' onclick='return check();'><i class='glyphicon glyphicon-remove' style='font-size:25px; color:red;'></i></a>";
                              echo"</td>";
                          echo "</tr>";    
                      }

                      echo "</table>";
          }
    }
  ?>
<script>
    $(document).ready(function(){
        $(".edit").click(function(){
              var a_id = $(this).attr("modalid");
              var act=$("#act"+a_id).text();
              var date=$("#date"+a_id).text();
              var sem=$("#"+a_id).val();
              $(".submit").hide();
              $(".editact").show();
              $('#insert').attr('action', 'update_activity.php');
              // alert(sem);
              $("#activityname").val(act);
               $("#aid").val(a_id);
              $("#sub_date").val(date);
              $('#sem').val(sem).attr("selected", "selected");

          return false;
      });
    });    
</script>
</div>
</div>

<?php
include 'webpage_footer.php';
?>