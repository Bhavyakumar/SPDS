
<?php
  include 'webpage_header.php';
    include 'connection.php';
  if(isset($_SESSION['stud']))
  {
  		$qr="select * from student where reg_no='".$_SESSION['reg']."'";
  		$result=mysqli_query($con,$qr);
  		while($tt=mysqli_fetch_assoc($result))
  		{
  				$reg=$tt['reg_no'];
				$name=$tt['name'];
				// $sem=$tt['sem'];
				$roll=$tt['roll_no'];
				$email=$tt['email'];
				$phn=$tt['phone_no'];

  		}
				echo '<div class="col-sm-12">';
					echo '<form action="studreg_suc.php" method="POST">';
					 echo '<div class="form-row">';
					  	
					  	
					  	echo'<div class="panel-heading">
					        <div class="panel-title"><h3>Your Profile</h3></div>
					    </div>'; 
					    echo '<div class="form-group col-md-6">
					      <label for="rno">Registration No.</label>
					      <input type="text" class="form-control" id="rno" value="'.$reg.'" name="rno" placeholder="Registration No." required>
					    </div> '; 
					    echo '<div class="form-group col-md-6">
					      <label for="sname">Name</label>
					      <input type="text" class="form-control" id="sname"value="'.$name.'" name="sname" placeholder="Name" required>
					    </div>';
					    echo '<div class="form-group col-md-6">';
					     echo' <label for="sem">Semester</label>';
					      echo'	<select id="sem" name="sem" class="form-control" required>';
					        	echo'<option selected>Select Semester</option>';
							            include 'connection.php';
							            $qry="select * from semester";
							            $rs=mysqli_query($con,$qry);
							            while($row=mysqli_fetch_assoc($rs))
							            {
							                echo "<option value=".$row['sem_id'].">".$row['semester']."</option>";
							            }
							       
					      	echo'</select>';
					    echo'</div>';
					    echo'<div class="form-group col-md-6">
					      <label for="rollno">Roll No.</label>
					      <input type="text" class="form-control" id="rollno" name="rollno" value="'.$roll.'" placeholder="Roll No." required>
					    </div>';

					  echo'<div class="form-group col-md-6">
					      <label for="sphone">Phone No.</label>
					      <input type="text" class="form-control" id="sphone" name="sphone" value="'.$phn.'" placeholder="Phone No." required>
					  </div>';
					  echo'<div class="form-group col-md-6">
					    <label for="semail">Email</label>
					    <input type="Email" class="form-control" id="semail" name="semail" value="'.$email.'" placeholder="Email Id" required>
					  </div>';
					echo'</div>';
					  echo'<div class="form-group">
					    <label for="spwd">Password</label>
					    <input type="Password" class="form-control" id="spwd" name="spwd" placeholder="Enter Password" required>
					  </div>';
					  
					  echo'<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>';
					echo'</form><br>';
				echo'</div>';

  }
 if(isset($_SESSION['fac'])) 
 {
 		$query="select * from faculty where f_id='".$_SESSION['fid']."'";
 		// echo $query;
  		$re=mysqli_query($con,$query);
  		while($rw=mysqli_fetch_assoc($re))
  		{
  				// $reg=$rw['reg_no'];
				$name=$rw['name'];
				// $sem=$tt['sem'];
				// $roll=$rw['roll_no'];
				$email=$rw['email'];
				$phn=$rw['phone_no'];

  		}
 	 	echo '<div class="col-sm-12">';
				echo '<form action="facultyreg_suc.php" method="POST">';
				  echo '<div class="form-row">';
				  	
				  echo	'<div class="panel-heading">
				        <div class="panel-title"><h3>Your Profile</h3></div>
				    </div>';   
				    echo'<div class="form-group col-md-6">
				      <label for="fname">Name</label>
				      <input type="text" class="form-control" id="fname" name="fname" value="'.$name.'" placeholder="Name" required>
				    </div>';
				    echo'<div class="form-group col-md-6">
				      <label for="fphone">Phone No.</label>
				      <input type="text" class="form-control" id="fphone" name="fphone" value="'.$phn.'"placeholder="Phone No." required>
				    </div>';
				  echo'</div>';
				  echo'<div class="form-group ">';
				      echo'<label for="dept">Department</label>';
				      echo'<select id="dept" name="dept" class="form-control" required>';
				        echo'<option selected>Select Department</option>';
				            include "connection.php";
				            $qry="select * from department";
				            $rs=mysqli_query($con,$qry);
				            while($row=mysqli_fetch_assoc($rs))
				            {
				                echo "<option value='".$row['d_id']."'>".$row['department']."</option>";
				            }
				      echo'</select>';
				    echo'</div>';
				    
				  echo'<div class="form-group">
				    <label for="femail">Email</label>
				    <input type="Email" class="form-control" id="femail" name="femail" placeholder="Email Id" value="'.$email.'" required>
				  </div>';
				 echo'	<label for="fpwd">Password</label>';
				  echo'<div class="input-group">
						<input type="password" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Enter Password">
							<span class="input-group-addon"><button type="button"><span class="glyphicon glyphicon-eye-open"></buuton></span>
						</div><br>';
				  // echo'<div class="form-group">
				  //   <label for="fpwd">Password</label>
				  //   <input type="Password" class="form-control" id="fpwd" name="fpwd" placeholder="Enter Password" required> 
				  //   	<div class="form-group-addon">
      //   						<button type="button"><span class="glyphicon glyphicon-eye-open"></span></button>
      // 					</div>
				  // </div>';
				  
				  echo '<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>';				
				  echo'</form><br>';
	echo'</div>';
 }
?>

<?php
  include 'webpage_footer.php';
?>