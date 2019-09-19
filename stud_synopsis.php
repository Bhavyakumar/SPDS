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
			$query="SELECT * FROM remark where status=1 and sy_status=0 and reg_no='".$_SESSION['reg']."'";
			$rem=mysqli_query($con,$query);
			$count=mysqli_num_rows($rem);

			echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#syModal">Synopsis Submission</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reModal">Report Submission</button>';
				echo'<br><button type="button" style="margin-left:760px;" class="btn btn-primary" data-toggle="modal" data-target="#SyMajorRemark">
					  Synopsis Remark <span class="badge badge-light">'.$count.'</span>
			  		<span class="sr-only">unread messages</span>
				</button>';
				$requery="SELECT * FROM remark where status=1 and re_status=0 and reg_no='".$_SESSION['reg']."'";
				$rerem=mysqli_query($con,$requery);
				$hel=mysqli_num_rows($rerem);
				echo'&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ReMajorRemark">
					  Report Remark <span class="badge badge-light">'.$hel.'</span>
			  		<span class="sr-only">unread messages</span>
				</button>';
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
	<?php
		$sy="SELECT * FROM remark INNER JOIN submission ON submission.sub_id=remark.sub_id where submission.reg_no='".$_SESSION['reg']."' AND remark.status=1";
		$abc=mysqli_query($con,$sy);
		while($tt=mysqli_fetch_assoc($abc))
		{
			$syrem=$tt['sy_remark'];
			$sdate=$tt['synopsis_date'];
			 // echo $SY ;
            $SYDate = date("d-m-Y", strtotime($sdate));
            $rid=$tt['r_id'];
            // echo $rid ;
		}

	?>
	 <div class="modal fade" id="SyMajorRemark" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
			      <div class="modal-content">
				        <div class="modal-header">
					          <h4 class="modal-title">Synopsis Remarks</h4>
				        </div>
				        <div class="modal-body">
				         	<form action='stud_synopsis.php' enctype='multipart/form-data' method='POST'>
				         			<table border=1 class='table table-bordered'>
				         				<tr>
				         					<th>Date of Synopsis Send</th>	
				         					<th>Remark</th>
				         					<input type="hidden" name="Rid" value="<?php echo $rid;?>">
				         				</tr>
				         				<tr>
				         					<td><?php echo $SYDate?></td>
				         					<td><?php echo $syrem?></td>
				         				</tr>	
				         			</table>
				        </div>
				        <div class="modal-footer">
				         	 <button type="submit" class="btn btn-primary" name="Done">OK</button>
				          
				        </div>
				         </form>
			      </div>
	      
	    </div>
  </div>
<?php
	if(isset($_POST["Done"]))
	{
		 $Remid=$_POST['Rid'];
		 // echo $Remid;
		 $updt="Update remark set sy_status='1' where r_id='".$Remid."' and status='1'";
		 $update=mysqli_query($con,$updt);

	}
		$re="SELECT * FROM remark INNER JOIN submission ON submission.sub_id=remark.sub_id where submission.reg_no='".$_SESSION['reg']."' AND remark.status=1";
		$cd=mysqli_query($con,$re);
		while($td=mysqli_fetch_assoc($cd))
		{
			$rerem=$td['re_remark'];
			$rdate=$td['report_date'];
			 // echo $SY ;
            $REDate = date("d-m-Y", strtotime($rdate));
		}

	?>

   <div class="modal fade" id="ReMajorRemark" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
			      <div class="modal-content">
				        <div class="modal-header">
					          <h4 class="modal-title">Report Remarks</h4>
				        </div>
				        <div class="modal-body">
				         	<form action='synopsis_sub.php' enctype='multipart/form-data' method='POST' >
				         		<!-- <?php  $syrem;?> -->
				         		<table border=1 class='table table-bordered'>
				         				<tr>
				         					<th>Date of Report Send</th>	
				         					<th>Remark</th>
				         				</tr>
				         				<tr>
				         					<td><?php echo $REDate?></td>
				         					<td><?php echo $rerem?></td>
				         				</tr>	
				         			</table>
				         		
				        </div>
				        <div class="modal-footer">
				         	 <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				           </form>
				        </div>
			      </div>
	      
	    </div>
  </div>
		
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

	<!-- <div class="panel-heading">
        <div class="panel-title"><h4><b>Remarks</b></h4></div>
    </div> -->
  <?php 
    // 		$qry="SELECT * FROM remark INNER JOIN faculty ON faculty.f_id=remark.f_id INNER JOIN student ON student.reg_no=remark.reg_no where remark.reg_no='". $_SESSION['reg']."' AND status=1";
    // 		$result=mysqli_query($con,$qry);
    // 			echo "<table border=1 class='table table-bordered'>";
		  //          		echo "<tr>";
				//                 echo "<th>Reg no</th>";
				//                 echo "<th>Name</th>";
				//                 echo "<th>Email</th>";
				//                 echo "<th>Guide Name</th>";
				//                 echo "<th>Synopsis Remark</th>";
				//                 echo "<th>Report Remark</th>";
		  //               echo "</tr>";
		  //               while ($tt=mysqli_fetch_assoc($result))
		  //               {
		  //               		echo "<tr>";
		  //               				echo "<td>".$tt['reg_no']."</td>";	
		  //               				echo "<td>".$tt['name']."</td>";	
		  //               				echo "<td>".$tt['email']."</td>";	
		  //               				echo "<td>".$tt['fname']."</td>";	
		  //               				echo "<td>".$tt['sy_remark']."</td>";
		  //               				echo "<td>".$tt['re_remark']."</td>";		
		  //               		echo "</tr>";	
		  //               }
		  //       echo "</table>";
		   	$query="SELECT * FROM submission where sy_status=0 ";
			$abc= mysqli_query($con,$query);
			if(mysqli_num_rows($abc))
			{
							echo "<div class='panel-heading'>
						        <div class='panel-title'><h4><b>Synopsis</b></h4></div>
						    </div>";
							$qry="SELECT * FROM submission where reg_no='".$_SESSION['reg']."'";
							$result=mysqli_query($con,$qry);
							echo "<table class='table table-striped table-bordered'>";
								echo "<tbody>";
									echo "<tr>";
										echo "<th>Sr. no.</th>";
										// echo "<th>Reg_no</th>";
										echo "<th>Submit Date</th>";
										echo "<th>Synopsis(File Name)</th>";
										echo "<th>Synopsis(Download)</th>";
										// echo "<th>Title Description</th>";
										// echo "<th></th>";
									echo "</tr>";
								$i=1;
								while($row=mysqli_fetch_assoc($result))
								{
									echo "<tr>";
									echo "<td>".$i++."</td>";
									// echo "<td>".$row['reg_no']."</td>";
									$original=$row['synopsis_date'];
									$newDate = date("d-m-Y", strtotime($original));
									echo "<td>".$newDate."</td>";
									$sy=substr($row['synopsis'],19);
									// echo $sy;
									// echo "<td>".$row['synopsis_date']."</td>";
									echo "<td>".$sy."</td>";
									echo "<td><a href='Sy_download.php?id=".$row["sub_id"]."' style='color:green'><button class='btn margin-top' style=' background-color: DodgerBlue;color: white; '><span class='glyphicon glyphicon-download-alt'></span> Download</button></a></td>";
									// echo "<td>".$row['t_submit_date']."</td>";
									
									echo "</tr>";
								}
								echo "</table>";
			}
			$query="SELECT * FROM submission where report_status=0";
			$abc= mysqli_query($con,$query);
			if(mysqli_num_rows($abc))
			{
				echo "<div class='panel-heading'>
						        <div class='panel-title'><h4><b>Report</b></h4></div>
						    </div>";
							$qry="SELECT * FROM submission where reg_no='".$_SESSION['reg']."'";
							$result=mysqli_query($con,$qry);
							echo "<table class='table table-striped table-bordered'>";
								echo "<tbody>";
									echo "<tr>";
										echo "<th>Sr. no.</th>";
										// echo "<th>Reg_no</th>";
										echo "<th>Submit Date</th>";
										echo "<th>Report(File Name)</th>";
										echo "<th>Report(Download)</th>";
										// echo "<th>Title Description</th>";
										echo "<th></th>";
									echo "</tr>";
								$i=1;
								while($row=mysqli_fetch_assoc($result))
								{
									echo "<tr>";
									echo "<td>".$i++."</td>";
									// echo "<td>".$row['reg_no']."</td>";
									$original=$row['report_date'];
									$newDate = date("d-m-Y", strtotime($original));
									echo "<td>".$newDate."</td>";
									$re=substr($row['report'],17);
									// echo $sy;
									// echo "<td>".$row['synopsis_date']."</td>";
									echo "<td>".$re."</td>";
									echo "<td><a href='Re_download.php?id=".$row["sub_id"]."' style='color:green'><button class='btn margin-top' style=' background-color: DodgerBlue;color: white; '><span class='glyphicon glyphicon-download-alt'></span> Download</button></a></td>";
									// echo "<td>".$row['t_submit_date']."</td>";
									echo "<td><a href='del_synopsis.php?id=".$row["sub_id"]."' onclick='return check();'><i class='glyphicon glyphicon-remove' style='font-size:25px;'></i></a></td>";
									echo "</tr>";
								}
								echo "</table>";
			}

    ?>
</div>
<?php

include 'webpage_footer.php';
?>