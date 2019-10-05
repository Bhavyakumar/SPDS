      
<?php
  include 'webpage_header.php';
    include 'connection.php';

  if(isset($_SESSION['stud']))
  {
  		$qr="SELECT * FROM student INNER JOIN semester ON semester.sem_id=student.sem_id where reg_no='".$_SESSION['reg']."'";
  		$result=mysqli_query($con,$qr);
  		while($tt=mysqli_fetch_assoc($result))
  		{
  				$reg=$tt['reg_no'];
				$name=$tt['name'];
				$sid=$tt['sem_id'];
				$sem=$tt['semester'];
				$roll=$tt['roll_no'];
				$email=$tt['email'];
				$phn=$tt['phone_no'];
				$pwd=$tt['password'];

  		}
				echo '<div class="col-sm-12">';
					echo '<form action="profile_suc.php" method="POST">';
					 echo '<div class="form-row">';
					  	
					  	
					  	echo'<div class="panel-heading">
					        <div class="panel-title"><h3>Your Profile</h3></div>
					    </div>'; 
					    if(isset($_GET['arr']))
							 {
									echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully Updated Profile.</div>";
							 }
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
					        	echo'<option value="'.$sid.'">'.$sem.'</option>';
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
					echo'	<label for="fpwd">Password</label>';
					echo'<div class="input-group">';
					  echo'<input type="password" class="form-control" id="password" name="password" value="'.$pwd.'" aria-label="Amount (rounded to the nearest dollar)" placeholder="Enter Password">
							<span class="input-group-addon"><button type="button" class="btn btn-xs	" id="show"><span class="glyphicon glyphicon-eye-open"></span> </span></button>
					  </div><br>';
					  
					  echo'<button type="submit" name="studsubmit" id="studsubmit" class="btn btn-primary">Submit</button>';
					echo'</form><br>';
				echo'</div>';

  }
 if(isset($_SESSION['type'])) 
 {
 		$query="SELECT * FROM faculty INNER JOIN department ON department.d_id=faculty.d_id where f_id='".$_SESSION['fid']."'";
 		// echo $query;
  		$re=mysqli_query($con,$query);
  		while($rw=mysqli_fetch_assoc($re))
  		{
  				// $reg=$rw['reg_no'];
				$name=$rw['fname'];
				$did=$rw['d_id'];
				$dept=$rw['department'];
				$email=$rw['email'];
				$phn=$rw['phone_no'];
				$pwd=$rw['password'];

  		}
 	 	echo '<div class="col-sm-12">';
				echo '<form action="profile_suc.php" method="POST">';
				  echo '<div class="form-row">';
				  	
				  echo	'<div class="panel-heading">
				        <div class="panel-title"><h3>Your Profile</h3></div>
				    </div>';   
				     if(isset($_GET['err']))
							 {
									echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully Updated Profile.</div>";
							 }
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
				        echo'<option value="'.$did.'">'.$dept.'</option>';
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
						<input type="password" class="form-control" id="password" value="'.$pwd.'" aria-label="Amount (rounded to the nearest dollar)" placeholder="Enter Password" name="password">
							<span class="input-group-addon "><button type="button" class="btn btn-xs" id="show"> <span class="glyphicon glyphicon-eye-open"></span></span></button>
						</div><br>';
				  // echo'<div class="form-group">
				  //   <label for="fpwd">Password</label>
				  //   <input type="Password" class="form-control" id="fpwd" name="fpwd" placeholder="Enter Password" required> 
				  //   	<div class="form-group-addon">
      //   						<button type="button"><span class="glyphicon glyphicon-eye-open"></span></button>
      // 					</div>
				  // </div>';
				  
				  echo '<button type="submit" name="facsubmit" id="facsubmit" class="btn btn-primary">Submit</button>';				
				  echo'</form><br>';
	echo'</div>';
 }
 if(isset($_SESSION["pm"]))
 {
 		
 }
?>
<script>
	$(document).ready(function(){
		$('#show').on('click',function(){
			var pwdfield=$('#password');
			// alert();
			var pwdtype=pwdfield.attr('type');
			if(pwdfield.val() != '')
			  {
			   if(pwdtype == 'password')  
			   {  
			    pwdfield.attr('type', 'text');  
			    $(this).html('<span class="glyphicon glyphicon-eye-close"></span>');  
			   }  
			   else  
			   {  
			    pwdfield.attr('type', 'password');  
			     $(this).html('<span class="glyphicon glyphicon-eye-open"></span>');  
			   }
			  }
			  else
			  {
			   alert("Please Enter Password");
			  }
		});
	});
</script>

<?php
  include 'webpage_footer.php';
?>