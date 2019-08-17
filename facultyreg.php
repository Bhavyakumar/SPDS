<?php
  include 'webpage_header.php';
?>
 <div class="col-sm-12">
<form action="facultyreg_suc.php" method="POST">
  <div class="form-row">
  	
  	<div class="panel-heading">
        <div class="panel-title"><h3>Faculty Registration</h3></div>
    </div>   
    <div class="form-group col-md-6">
      <label for="fname">Name</label>
      <input type="text" class="form-control" id="fname" name="fname" placeholder="Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="fphone">Phone No.</label>
      <input type="text" class="form-control" id="fphone" name="fphone" placeholder="Phone No." required>
    </div>
  </div>
  <div class="form-group ">
      <label for="dept">Department</label>
      <select id="dept" name="dept" class="form-control" required>
        <option selected>Select Department</option>
        <?php
            include 'connection.php';
            $qry="select * from department";
            $rs=mysqli_query($con,$qry);
            while($row=mysqli_fetch_assoc($rs))
            {
                echo "<option value=".$row['d_id'].">".$row['department']."</option>";
            }
        ?>
      </select>
    </div>
    
  <div class="form-group">
    <label for="femail">Email</label>
    <input type="Email" class="form-control" id="femail" name="femail" placeholder="Email Id" required>
  </div>
  <div class="form-group">
    <label for="fpwd">Password</label>
    <input type="Password" class="form-control" id="fpwd" name="fpwd" placeholder="Enter Password" required>
  </div>
  
  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
</form><br>
</div>

<?php
    include 'webpage_footer.php';
?>