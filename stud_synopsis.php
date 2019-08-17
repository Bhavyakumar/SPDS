<?php
include 'webpage_header.php';
	include 'connection.php';
	$sql="SELECT * FROM title INNER JOIN student ON student.reg_no=title.reg_no WHERE student.reg_no='".$_SESSION['reg']."'";
	// echo $sql;
	$rs=mysqli_query($con,$sql);
	while($rw=mysqli_fetch_assoc($rs))
	{
		$reg=$rw['reg_no'];
		$name=$rw['name'];
		$title=$rw['title'];
		$tid=$rw['t_id'];
	}

?>
<div class="col-sm-12">
	<div>
	<?php
		if(isset($_GET['err']))
                          { 
                             echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'> Successfully uploaded Synopsis.</div>";
                          }
	?>
	</div><br>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#syModal">Synopsis Submission</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reModal">Report Submission</button>
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
</div>
<?php
include 'webpage_footer.php';
?>