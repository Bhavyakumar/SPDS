<?php
  include 'webpage_header.php';
?>
 <div class="col-sm-12">
<form action="studreg_suc.php" method="POST">
  <div class="form-row">
  	
  	
  	<div class="panel-heading">
        <div class="panel-title"><h3>Student Registration</h3></div>
    </div> 
    <div class="form-group col-md-6">
      <label for="rno">Registration No.</label>
      <input type="text" class="form-control" id="rno" name="rno" placeholder="Registration No." required>
    </div>  
    <div class="form-group col-md-6">
      <label for="sname">Name</label>
      <input type="text" class="form-control" id="sname" name="sname" placeholder="Name" required>
    </div>
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
    <div class="form-group col-md-6">
      <label for="rollno">Roll No.</label>
      <input type="text" class="form-control" id="rollno" name="rollno" placeholder="Roll No." required>
    </div>

  <div class="form-group col-md-6">
      <label for="sphone">Phone No.</label>
      <input type="text" class="form-control" id="sphone" name="sphone" placeholder="Phone No." required>
  </div>
  <div class="form-group col-md-6">
    <label for="semail">Email</label>
    <input type="Email" class="form-control" id="semail" name="semail" placeholder="Email Id" required>
  </div>
</div>
  <div class="form-group">
    <label for="spwd">Password</label>
    <input type="Password" class="form-control" id="spwd" name="spwd" placeholder="Enter Password" required>
  </div>
  
  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
</form><br>
</div>

<?php
    include 'webpage_footer.php';
?>