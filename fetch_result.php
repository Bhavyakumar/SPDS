
<?php
	include 'webpage_header.php';
	include 'connection.php';
	$qry= "select * from result where reg_no='".$_SESSION['reg']."'";
	$result=mysqli_query($con,$qry);
	if(mysqli_num_rows($result)>0)
	{
			$sql="SELECT AVG(total),result.reg_no,name,roll_no,email,semester FROM result INNER JOIN student ON student.reg_no=result.reg_no INNER JOIN semester ON semester.sem_id=student.sem_id WHERE result.reg_no='".$_SESSION['reg']."'";
			// echo $sql;
			$rs=mysqli_query($con,$sql);
			echo "<div id='printTable'>";
			echo "<table align='center'>";
				echo "<tr>";
					echo "<td><b><font color='#fa661b' size='3px'>College Of Agricultural Information Technology</font></b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td align='center'><b><font color='#fa661b' size='3px'>AAU, Anand-388110</font></b></td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td align='center'><b><font color='#fa661b' size='3px'>Project Presentation Result</font></b></td>";
				echo "</tr>";
			echo "</table><br>	";
			echo"
				<div class='row'>
					<div class='col-lg-2'>

					</div>
					<div class='col-lg-8'>
						<div class='row'>

						</div>
					</div>
				</div>
			";
			echo"
				<div class='row'>
					<div class='col-lg-2'>

					</div>
					<div class='col-lg-8'>
						<div class='row'>
				";
			echo "<div class='col-lg-12'>";
			echo "<span style='font-weight:bold;color:red'>Note: S= Satisfied And US= Unsatisfied</span>";
			echo "<table class='table table-condensed ' >";
				echo "<tr>";
					echo "<th>Registration No.: </th>";
					echo "<th>Name: </th>";
					echo "<th>Roll No.: </th>";
					echo "<th>Semester: </th>";
				echo "</tr>";
			while ($row=mysqli_fetch_assoc($rs)) 
			{
				echo "<tr>";
				// echo $row['reg_no'];
				// echo $row['AVG(total)'];

				echo "<td>".$row['reg_no']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['roll_no']."</td>";
				echo "<td>".$row['semester']."</td>";
				// echo $row['email'];
				// echo $row['roll_no'];
				// echo $row['semester'];
				echo "</tr>";
			}
			echo "</table>";
			$sql="SELECT AVG(total),result.reg_no,name,roll_no,email,semester FROM result INNER JOIN student ON student.reg_no=result.reg_no INNER JOIN semester ON semester.sem_id=student.sem_id WHERE result.reg_no='".$_SESSION['reg']."'";
			// echo $sql;
			$rs=mysqli_query($con,$sql);
			echo "<table class='table table-condensed '>";
				echo "<tr>";
					echo "<th>Email-Id: </th>";
					echo "<th>Marks: </th>";	
					echo "<th>S/US: </th>";				
				echo "</tr>";
				while ($row=mysqli_fetch_assoc($rs)) 
			{
				echo "<tr>";
				// echo $row['reg_no'];
				// echo $row['AVG(total)'];

				echo "<td>".$row['email']."</td>";
				echo "<td>".round($mark=$row['AVG(total)'],2)."</td>";
				if($mark>=50)
				{
					echo "<td>S</td>";
				}
				else
				{
					echo "<td>US</td>";
				}
				// echo $row['email'];
				// echo $row['roll_no'];
				// echo $row['semester'];
				echo "</tr>";
				echo "<tr>";
				echo "</tr>";

			}

			echo "</table>";
			echo "</div>";			


			echo"				
						</div>
					</div>";
					
			echo"</div>";
		echo "</div>";
				  echo "<div class='input-group col-md-offset-9 col-md-6'>";
					// echo "<input type='button' id='print_result' onclick='printDiv('print');' value='print a div!'/>";
				echo"</div><br>";
	}
	else
	{
		echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Result is not Assigned.</div>";
	}
	
			include 'webpage_footer.php';
?>
<script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
$('#print_result').on('click',function(){
alert();
printData();
})
</script>