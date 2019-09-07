<?php
include 'webpage_header.php';
	include 'connection.php';
	$sql="SELECT * FROM title INNER JOIN student ON student.reg_no=title.reg_no WHERE student.reg_no='".$_SESSION['reg']."' AND title.t_status=1";
	// echo $sql;
	$rs=mysqli_query($con,$sql);
	if(mysqli_num_rows($rs)>0)
	{
			while($rw=mysqli_fetch_assoc($rs))
			{
				$reg=$rw['reg_no'];
				$name=$rw['name'];
				$title=$rw['title'];
				$tid=$rw['t_id'];
			}
			echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#syModal">Synopsis Submission</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reModal">Report Submission</button>';
	}
	else
	{
		 echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Title is not Selected.</div>";
	}

?>
<div class="col-sm-12">
	<div>
	<?php
		if(isset($_GET['err']))
                          { 
                             echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'><button type='button' class='close' data-dismiss='alert'>&times;</button> Successfully uploaded Synopsis.</div>";
                          }
                          	if(isset($_GET['arr']))
                          { 
                             echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'><button type='button' class='close' data-dismiss='alert'>&times;</button> Successfully uploaded Report.</div>";
                          }
	?>
	 <br><div>
    			  
    			   <?php
    			   		$sql="SELECT fname FROM major_guide INNER JOIN faculty ON major_guide.f_id = faculty.f_id where reg_no='".$_SESSION['reg']."'";
    			   		$rs=mysqli_query($con,$sql);
    			   		while($row=mysqli_fetch_assoc($rs))
    			   		{
    			   			echo "<p class='bg-info text-white' style='width:40%'>Major Guide: ".$row['fname']."</p>";
    			   		}	
    			   		$qr="SELECT fname FROM minor_guide INNER JOIN faculty ON minor_guide.f_id = faculty.f_id where reg_no='".$_SESSION['reg']."'";
    			   		$result=mysqli_query($con,$qr);
    			   		while($tt=mysqli_fetch_assoc($result))
    			   		{
    			   			echo " <p class='bg-info text-white ' style='width:40%'>Major Guide: ".$tt['fname']."</p>";
    			   		}
    			   ?>
    </div>
	</div><br>
		
	<!-- 	<button type="submit"  class="btn btn-primary" name="submit" id="submit">Remarks</button> -->
		<div class="modal fade" id="syModal">
    		<div class="modal-dialog">
     			 <div class="modal-content">
      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Synopsis Submission</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
        
       					 <!-- Modal body -->
				        <div class="modal-body">
				        		<form action='synopsis_sub.php' enctype='multipart/form-data' method='POST' >

					          <div class="form-group">
	          					  <label for="reg_no" class="col-form-label">Registration No.:</label>
	            					<input type="text" class="form-control" value="<?php echo $reg;?>" id="reg_no" name="reg_no" readonly>
	          				  </div>
	          				  <div class="form-group">
	          					  <label for="name" class="col-form-label">Name:</label>
	            					<input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name" readonly>
	          				  </div>
	          				  <div class="form-group">
	          					  <label for="title" class="col-form-label">Title:</label>
	            					<input type="text" class="form-control" id="title" value="<?php echo $title;?>" name="title" readonly>
	          				  </div>
	          				  <input type="hidden" name="hide" id="hide" value="<?php echo $tid;?>">
	          				  <div class="form-group">
	          					  <label for="recipient-name" class="col-form-label">Synopsis:</label>
	            					<input type="file" class="form-control" name="myfile">
	          				  </div>
				        </div>
				      
				        <!-- Modal footer -->
				        <div class="modal-footer">
				        	<button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>				          
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </form>    
      			</div>
    	</div>
	</div>
	
		<div class="modal fade" id="reModal">
    		<div class="modal-dialog">
     			 <div class="modal-content">
      
				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Report Submission</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
        
       					 <!-- Modal body -->
				        <div class="modal-body">
				        		<form action='report_sub.php' enctype='multipart/form-data' method='POST' >

					          <div class="form-group">
	          					  <label for="reg_no" class="col-form-label">Registration No.:</label>
	            					<input type="text" class="form-control" value="<?php echo $reg;?>" id="reg_no" name="reg_no" readonly>
	          				  </div>
	          				  <div class="form-group">
	          					  <label for="name" class="col-form-label">Name:</label>
	            					<input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name" readonly>
	          				  </div>
	          				  <div class="form-group">
	          					  <label for="title" class="col-form-label">Title:</label>
	            					<input type="text" class="form-control" id="title" value="<?php echo $title;?>" name="title" readonly>
	          				  </div>
	          				  <input type="hidden" name="hide" id="hide" value="<?php echo $tid;?>">
	          				  <div class="form-group">
	          					  <label for="recipient-name" class="col-form-label">Report:</label>
	            					<input type="file" class="form-control" name="report">
	          				  </div>
				        </div>
				      
				        <!-- Modal footer -->
				        <div class="modal-footer">
				        	<button type="submit" class="btn btn-primary" name="send" value="Submit">Submit</button>				          
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </form>    
      			</div>
    	</div>
	</div>
	<div class="panel-heading">
        <div class="panel-title"><h4><b>Remarks</b></h4></div>
    </div>
    <?php 
    		$qry="SELECT * FROM remark INNER JOIN faculty ON faculty.f_id=remark.f_id INNER JOIN student ON student.reg_no=remark.reg_no where remark.reg_no='". $_SESSION['reg']."' AND status=1";
    		$result=mysqli_query($con,$qry);
    			echo "<table border=1 class='table table-bordered'>";
		           		echo "<tr>";
				                echo "<th>Reg no</th>";
				                echo "<th>Name</th>";
				                echo "<th>Email</th>";
				                echo "<th>Guide Name</th>";
				                echo "<th>Synopsis Remark</th>";
				                echo "<th>Report Remark</th>";
		                echo "</tr>";
		                while ($tt=mysqli_fetch_assoc($result))
		                {
		                		echo "<tr>";
		                				echo "<td>".$tt['reg_no']."</td>";	
		                				echo "<td>".$tt['name']."</td>";	
		                				echo "<td>".$tt['email']."</td>";	
		                				echo "<td>".$tt['fname']."</td>";	
		                				echo "<td>".$tt['sy_remark']."</td>";
		                				echo "<td>".$tt['re_remark']."</td>";		
		                		echo "</tr>";	
		                }
		        echo "</table>";
		    		
    ?>
</div>
<?php
include 'webpage_footer.php';
?>