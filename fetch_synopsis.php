<?php
  include 'webpage_header.php';
  include 'connection.php';
 
?>
<form action="fetch_synopsis.php" method="POST">
<div class="col-sm-12">
	<br>
<div class="form-group col-sm-3">
      <label for="semester">Semester</label>
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
<br>
<div class="form-group col-sm-3">
	<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit"/>
  
</div>

</div>

</form>	
<?php
if($_SESSION['type']=='Minor')
{
	if(isset($_POST['submit']))
	{	
		echo "<div class='col-sm-12'>";
			$sem=$_POST['sem'];
			// echo "<form action='Sy_download.php' method='POST'>";
			// $sem_name=$_POST['hidden'];
			// echo $sem;
			// echo "<p class='bg-info text-white' style='width:40%'>Semester: ".$_POST['hidden']."</p>";
				echo "<table border=1 class='table table-bordered'>";
					echo "<tbody>";
						echo "<tr>";
							echo "<th>Registrstion No.</th>";
							echo "<th>Name</th>";
							echo "<th>Title</th>";
							echo "<th>Synopsis(Download)</th>";
							echo "<th>Remarks</th>";
						echo "</tr>";
			$sql="SELECT * FROM submission INNER JOIN student ON student.reg_no = submission.reg_no INNER JOIN title ON title.t_id=submission.t_id INNER JOIN minor_guide ON minor_guide.reg_no=submission.reg_no where sem_id='".$sem."' AND f_id='".$_SESSION['fid']."' order by student.reg_no";
			 // echo $sql;
			$rs= mysqli_query($con,$sql);
			
			$arr=[];
			$i=0;
			while($row=mysqli_fetch_assoc($rs))
			{
				echo "<input type='hidden' name='hide".$i."' value='".$row['sub_id']."'>";
				// echo "<input type='hidden' name='hidden".$i."' value='".$row['sub_id']."'>";
				
				if (in_array($row['reg_no'], $arr)){
					 echo "<tr>";
					 echo "<td colspan='2'></td>";
					 // echo "<td></td>";
					 
				}
				else{
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$row['reg_no']."</td>";
					echo "<td>".$row['name']."</td>";


				}
					$arr[$i]=$row['reg_no'];
					$i++;
					echo "<td>".$row['title']."</td>";
					echo "<td><a href='Sy_download.php?id=".$row["sub_id"]."' style='color:green'><button class='btn margin-top' style=' background-color: DodgerBlue;color: white; '><span class='glyphicon glyphicon-download-alt'></span>Download</button></a></td>";
					echo "<td><button class='btn' reg_no='".$row["reg_no"]."' modalid='".$row["sub_id"]."' id='".$row["sub_id"]."' data-toggle='modal' data-target='#remark' name='remark' style=' background-color: DodgerBlue;color: white;'><span class='glyphicon glyphicon-share'></span>Remarks</button></td>";

			// 		echo "<td><button  type='submit' id='submit' name='download' class='btn btn-primary'><span class='glyphicon glyphicon-download-alt'></span>	</button></td>";
			 }
				
			echo "</table>";
			// echo "<input  type='submit' id='submit' name='accept' class='btn btn-primary' value='Send to Major Guide'><br>";	
			// echo "</form>";


		}
	echo "</div>";
}
?>
  <div class="modal" id="remark">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->

        <div class="modal-header">
          <h4 class="modal-title">Remarks</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<form action='minor_remark.php' method='GET'>
	           <div class="form-group">
						  <label for="remark" class="col-form-label">Remark :</label>
						  <textarea class="form-control" id="remark" name="remark"></textarea>
						 
		      	</div>
		      			 <input type="text" class="form-control" id="reg" name="reg">
						  <input type="text" class="form-control" id="sub" name="sub">
       </div>
        
        <!-- Modal footer -->
		        <div class="modal-footer">
		        	<input type="submit" class="btn btn-primary" name="submit" value="Submit"></button>		
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
   		 </form>
        
      </div>
    </div>
  </div>
<?php
if($_SESSION['type']=='Major')
{
	if(isset($_POST['submit']))
	{	
		echo "<div class='col-sm-12'>";
			$sem=$_POST['sem'];
			// echo "<form action='Sy_download.php' method='POST'>";
			// $sem_name=$_POST['hidden'];
			// echo $sem;
			// echo "<p class='bg-info text-white' style='width:40%'>Semester: ".$_POST['hidden']."</p>";
				echo "<table border=1 class='table table-bordered'>";
					echo "<tbody>";
						echo "<tr>";
							echo "<th>Registrstion No.</th>";
							echo "<th>Name</th>";
							echo "<th>Title</th>";
							echo "<th>Synopsis(Download)</th>";
							echo "<th>Remarks</th>";
						echo "</tr>";
			$sql="SELECT * FROM submission INNER JOIN student ON student.reg_no = submission.reg_no INNER JOIN title ON title.t_id=submission.t_id INNER JOIN major_guide ON major_guide.reg_no=submission.reg_no where sem_id='".$sem."' AND f_id='".$_SESSION['fid']."' order by student.reg_no";
			 // echo $sql;
			$rs= mysqli_query($con,$sql);
			
			$arr=[];
			$i=0;
			while($row=mysqli_fetch_assoc($rs))
			{
				// echo "<input type='hidden' name='hide".$i."' value='".$row['sub_id']."'>";
				// echo "<input type='hidden' name='hidden".$i."' value='".$row['sub_id']."'>";
				
				if (in_array($row['reg_no'], $arr)){
					 echo "<tr>";
					 echo "<td colspan='2'></td>";
					 // echo "<td></td>";
					 
				}
				else{
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$row['reg_no']."</td>";
					echo "<td>".$row['name']."</td>";


				}
					$arr[$i]=$row['reg_no'];
					$i++;
					echo "<td>".$row['title']."</td>";
					echo "<td><a href='Sy_download.php?id=".$row["sub_id"]."' style=' color:green'><button class='btn' style=' background-color: DodgerBlue;color: white;'><span class='glyphicon glyphicon-download-alt'></span>Download</button></a></td>";
			// 		echo "<td><button  type='submit' id='submit' name='download' class='btn btn-primary'><span class='glyphicon glyphicon-download-alt'></span>	</button></td>";
			 }
				
			echo "</table>";
			// echo "<input  type='submit' id='submit' name='accept' class='btn btn-primary' value='Send to Major Guide'><br>";	
			// echo "</form>";


		}
	echo "</div>";
}

?>
<script>
$(".btn").click(function(e){
	var sub_id = $(this).attr("modalid");
	var reg_no = $(this).attr("reg_no");
	console.log(e);
	$('#sub').val(sub_id);
	$('#reg').val(reg_no);
});

</script>
<?php
 include 'webpage_footer.php';
?>