<?php
  include 'webpage_header.php';
  include 'connection.php';
?>

<script>
$(document).ready(function(){
	// $('.toast').fadeOut(10000);
  	$('#sub').click(function(){
  		$('.toast').hide();


  	});

});
</script>
<div class="col-sm-12">
	<div class="panel-heading">
              <div class="panel-title"><b>Title Submission</b></div>
    </div>  
    <div>
    			  
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
    </div><br>
	<?php	
	 if(isset($_GET['err']))
	 {
			echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully Submitted Title!</div>";
	 }
	 if(isset($_GET['arr']))
	 {
			echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Guide Allocation is not Done!</div>";
	 }
	?>
	
	<form name="add_name" id="add_name" action="titlesub_suc.php" method="POST">
		
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="name[]" placeholder="Enter Title" class="form-control name_list" required="" /></td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="des[]" placeholder="Description" class="form-control name_list"></textarea>
								</td>
							</tr>
						</table>
						<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit"/><br>
					</div>
					<br>
	
	</form>
	<?php
			$query="SELECT * FROM title where t_status=1 and reg_no='".$_SESSION['reg']."'";
			$abc= mysqli_query($con,$query);
			if(mysqli_num_rows($abc))
			{
				$sql="SELECT * FROM title INNER JOIN student ON student.reg_no=title.reg_no where t_status=1 and student.reg_no='".$_SESSION['reg']."'";
							// echo $sql;
							$res=mysqli_query($con,$sql);
							echo "<div class='toast col-sm-6' data-autohide='false'>";
							  echo "<div class='toast-header'>";
    							// echo "<img src='...' class='rounded mr-2' alt='...'>";
    							 	echo "<strong class='mr-auto text-primary'>Finalize Title</strong>";
   									// echo " <small>11 mins ago</small>";
   										echo" <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' id='sub' aria-label='Close'>";
      										 echo"<span aria-hidden='true'>&times;</span>";
										echo "</button>";
							  echo " </div>";
							while($row = mysqli_fetch_assoc($res))
							{
									echo " <div class='toast-body'>";
							        echo "Name: ".$name=$row['name']."<br>";
							  		 echo " Email: ".$name=$row['email']."<br>";
							        echo " Final Title: ".$name=$row['title']."<br>";
							        echo " Final Title Description: ".$name=$row['title_decscription']."";
							        echo "</div>";
							}
						echo "</div>";
							
				}
				else
				{
							// echo "<span style='font-weight:bold;color:red'>Final Title :</span>";
							$qry="SELECT * FROM title where reg_no='".$_SESSION['reg']."'";
							$result=mysqli_query($con,$qry);

							echo "<table class='table table-striped table-bordered'>";
								echo "<tbody>";
									echo "<tr>";
										echo "<th>Sr. no.</th>";
										// echo "<th>Reg_no</th>";
										echo "<th>Title</th>";
										echo "<th>Title Description</th>";
										echo "<th>Submit Date</th>";
										echo "<th></th>";
									echo "</tr>";
								$i=1;
								while($row=mysqli_fetch_assoc($result))
								{
									echo "<tr>";
									echo "<td>".$i++."</td>";
									// echo "<td>".$row['reg_no']."</td>";
									echo "<td>".$row['title']."</td>";
									echo "<td>".$row['title_decscription']."</td>";
									echo "<td>".$row['t_submit_date']."</td>";
									echo "<td><a href='del_title.php?id=".$row["t_id"]."' onclick='return check();'><i class='glyphicon glyphicon-remove' style='font-size:25px;'></i></a></td>";
									echo "</tr>";
								}
								echo "</table>";
				}
							
	?>

</div>

<script>
	$(document).ready(function(){
		var i=1;
		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Title" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr><tr id="row'+i+'"><td colspan="2"><textarea name="des[]" placeholder="Description" class="form-control name_list"></textarea></td></tr>');
		});
	
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id"); 
			$('#row'+button_id+'').remove();
			$('#row'+button_id+'').remove();
		});
	});
</script>
<?php
  include 'webpage_footer.php';
?>