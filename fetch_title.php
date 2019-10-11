<?php
  include 'webpage_header.php';
  include 'connection.php';
 
?>
<form action="fetch_title.php" method="POST">
<div class="col-sm-12">
		<div class="panel-heading">
			<div class="panel-title"><h3>Titles</h3></div>
	   </div>
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
				echo "<span style='font-weight:bold;color:red'>Note: Highlighted title suggested by minor guide.</span>";
			echo "<form action='minor_selecttitle.php' method='POST'>";
			// $sem_name=$_POST['hidden'];
			// echo $sem;
			// echo "<p class='bg-info text-white' style='width:40%'>Semester: ".$_POST['hidden']."</p>";
				echo "<table border=1 class='table table-bordered'>";
					echo "<tbody>";
						echo "<tr>";
							echo "<th>Registrstion No.</th>";
							echo "<th>Name</th>";
							echo "<th>Title (Select Title for Project)</th>";
							echo "<th>Language(framework)</th>";
							echo "<th>Title description</th>";
						echo "</tr>";
			$sql="SELECT * FROM title INNER JOIN student ON student.reg_no = title.reg_no INNER JOIN minor_guide ON minor_guide.reg_no=title.reg_no where title.sem_id=".$sem." AND f_id='".$_SESSION["fid"]."' order by student.reg_no";
			// echo $sql;
			$rs= mysqli_query($con,$sql);
			
			$arr=[];
			$i=0;
			while($row=mysqli_fetch_assoc($rs))
			{
				
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
					if($row['t_status']=='2')
					{
					echo "<td><mark><span style='font-weight:bold'><input type='checkbox' name='min_title".$i."' id='min_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."</span>	</mark></td>";
					}
					else
					{
						if($row['t_status']=='1')
						{
							echo "<td><input type='checkbox' name='min_title".$i."' id='min_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."<img src='image/select.gif' style='width:40px;'></td>";
							
						}
						else
						{
							echo "<td><input type='checkbox' name='min_title".$i."' id='min_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."</td>";
						}
					}
					// else
					// {
					// echo "<td><input type='checkbox' name='min_title".$i."' id='min_title' class='form-check-input' value='".$row['t_id']."'>".$row['title']."</td>";
					// echo "<td>".$row['title_decscription']."</td></tr>";
					// }	
					echo "<td>".$row['language']."</td>";
					echo "<td>".$row['title_decscription']."</td></tr>";
			}
				
			echo "</table>";
			echo "<input  type='submit' id='submit' name='accept' class='btn btn-primary' value='Send to Major Guide'><br>";	

		}
		echo "</form>";
	echo "</div>";
}
if($_SESSION['type']=='Major')
{
	if(isset($_POST['submit']))
	{	
			echo "<div class='col-sm-12'><br>";
			echo "<span style='font-weight:bold;color:red'>Note: Highlighted title suggested by minor guide.</span>";
			$sem=$_POST['sem'];
			echo "<form action='minor_selecttitle.php' method='POST'>";
  				
			echo "<table border=1 class='table table-bordered'>";
					echo "<tbody>";
						echo "<tr>";
							echo "<th>Registrstion No.</th>";
							echo "<th>Name</th>";
							echo "<th>Title (Select Title for Project)</th>";
							echo "<th>Language(framework)</th>";
							echo "<th>Title description</th>";
						echo "</tr>";
			$sql="SELECT * FROM title INNER JOIN student ON student.reg_no = title.reg_no INNER JOIN major_guide ON major_guide.reg_no=title.reg_no where title.sem_id=".$sem." AND f_id='".$_SESSION["fid"]."' order by student.reg_no";
			// echo $sql;
			$rs= mysqli_query($con,$sql);
			$arr=[];
			$i=0;
			while($row=mysqli_fetch_assoc($rs))
			{
				// setcookie("major",$row['maj_id']);
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

					if($row['t_status']=='2')
					{
						// echo $row['title'];
					echo "<td><mark><span style='font-weight:bold'><input type='checkbox' name='maj_title".$i."' id='maj_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."</span>	</mark></td>";
					}
					else
					{
						if($row['t_status']=='1')
						{
							echo "<td><input type='checkbox' name='maj_title".$i."' id='maj_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."<img src='image/select.gif' style='width:40px;'></td>";
							
						}
						else
						{
							echo "<td><input type='checkbox' name='maj_title".$i."' id='maj_title' class='form-check-input'  value='".$row['t_id']."'>".$row['title']."</td>";
						}
					}
					// if($row['t_status']=='1')
					// {
					// 	// echo "<input type='hidden' name='hidden' id='hidden' value='".$row['reg_no']."'>";
					// 	// $rem="delete from title where t_status='0' or t_status='2' and reg_no='".$row['reg_no']."'";	
					// 			// echo $rem;
					// 	// $del=mysqli_query($con,$rem); 		

					// }
					echo "<td>".$row['language']."</td>";
					echo "<td>".$row['title_decscription']."</td></tr>";
			}	
			echo "</table>";
			echo "<div><input  type='submit' id='send' name='send' class='btn btn-primary' value='Send to Student'></div>";	
		}
			echo "</form>";
		echo "</div>";
	}
  include 'webpage_footer.php';
?>


<!-- <?php
  // include 'webpage_header.php';
  // include 'connection.php';
  // $sql = "SELECT * FROM title INNER JOIN major_guide ON title.reg_no=major_guide.reg_no where f_id='".$_SESSION["fid"]."'";
  // // echo $sql;
  // $rs= mysqli_query($con,$sql);
  // while ($row=mysqli_fetch_assoc($rs))
  // {
  			
  // }
  // include 'webpage_footer.php';
?> -->
