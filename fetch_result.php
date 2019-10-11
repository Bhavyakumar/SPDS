
<?php
	include 'webpage_header.php';
	include 'connection.php';
	$qry= "select * from result where reg_no='".$_SESSION['reg']."' and sem_id='".$_SESSION['semid']."'";
	$result=mysqli_query($con,$qry);
	if(mysqli_num_rows($result)>0)
	{
			$sql="SELECT AVG(total),result.sem_id,result.reg_no,name,roll_no,email,semester FROM result INNER JOIN student ON student.reg_no=result.reg_no INNER JOIN semester ON semester.sem_id=student.sem_id WHERE result.reg_no='".$_SESSION['reg']."' and result.sem_id='".$_SESSION['semid']."'";
			 // echo $sql;
			$rs=mysqli_query($con,$sql);
			echo "<div id='printTable' >";
			echo "<table align='center'>";
			echo "<tr>";
				echo "<td rowspan='4'>";
				echo "<img src='image/logo.jpg' style='width:110px;hieght:110px'>";
				echo "</td>";
			echo "</tr>";
				echo "<tr>";
					echo "<td><b><font color='#fa661b' size='3px'>College Of Agricultural Information Technology</font></b></td>";
					echo "<td rowspan='4'>";
				echo "<img src='image/AIT.jpg'  style='width:110px;hieght:110px'>";
				echo "</td>";
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
			echo "<table border='1' cellpadding='1' class='table table-bordered ' style='width: 95%;' >";
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
			$qry="SELECT * FROM result INNER JOIN title ON title.t_id=result.t_id WHERE result.reg_no='".$_SESSION['reg']."' and result.sem_id='".$_SESSION['semid']."' group by result.reg_no";
			// echo $qry;
			$result=mysqli_query($con,$qry);
			echo "<br></br>";
			echo "<table border='1' cellpadding='1' class='table table-bordered ' style='width: 95%;' >";
				echo "<tr>";
					echo "<th>Title: </th>";
					echo "<th>Language(framework): </th>";
				echo "</tr>";
			while ($tt=mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				// echo $row['reg_no'];
				// echo $row['AVG(total)'];

				echo "<td>".$tt['title']."</td>";
				echo "<td>".$tt['language']."</td>";
				// echo $row['email'];
				// echo $row['roll_no'];
				// echo $row['semester'];
				echo "</tr>";
			}
			echo "</table>";
			$sql="SELECT AVG(total),result.reg_no,name,roll_no,email,semester FROM result INNER JOIN student ON student.reg_no=result.reg_no INNER JOIN semester ON semester.sem_id=student.sem_id WHERE result.reg_no='".$_SESSION['reg']."' and result.sem_id='".$_SESSION['semid']."'";
			// echo $sql;
			$rs=mysqli_query($con,$sql);

			echo "<br></br>";
			echo "<table border='1' cellpadding='1' class='table table-bordered ' style='width: 95%;'>";
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
			echo "<br></br>";
			echo "<table cellpadding='1' class='table table-bordered' style='width: 95%;'>";
				echo "<thead >";
				echo "<tr>";
					echo "<th>Major Guide :</th>";
					echo "<th>Minor Guide :</th>";
					echo "<th>Project Manager :</th>";
				echo "</tr>";
				echo "</thead>";
				echo"<tbody>";
				echo "<tr>";
						echo "<td align='center'><br> ______________</td>";
						echo "<td align='center'><br>______________</td>";
						echo "<td align='center'><br> ______________</td>";
				echo "</tr>";
				echo"</tbody>";
			echo "</table>";
			// echo "<p id='mj' style='display:none;margin-left:200px;'>Major Guide : </p><p style='display:none' id='mjs'>______________</p>";
			// echo "<p id='mn'  style='display:none;margin-left:800px;'>Minor Guide :</p> <p style='display:none' id='mns'>______________</p>";
			// echo "<p id='pm'  style='display:none;margin-left:800px;'>Project Manager : </p><p style='display:none's id='pms'>______________</p>";
			echo "</div>";			
			echo"</div>
					</div>";
						
			echo"</div>";
		echo "</div>";
				  echo "<div class='input-group col-md-offset-9 col-md-6'>";
					echo "<button type='button' class='btn btn-success hidden-print' id='print_result' onclick='printDiv('print');'><span class='glyphicon glyphicon-print' aria-hidden='true'></span> Print</button>";
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
   // var divToPrint=document.getElementById("printTable");
   // newWin= window.open('', 'PRINT', 'height=200,width=400');
   // newWin.document.write(divToPrint.outerHTML);
   // newWin.print();
   // newWin.close();
   var prtContent = document.getElementById("printTable");
   // var sign = document.getElementById("sign");
            var WinPrint = window.open('', '', 'left=0,top=0,width=600,height=400,toolbar=1,scrollbars=1,status=0');
             WinPrint.document.write('<br></br>');
            WinPrint.document.write('<html><head><title></title></head>');
            WinPrint.document.write('<body style="font-family:verdana; font-size:14px;width:100%;height:400px:" >');
            WinPrint.document.write(prtContent.innerHTML);
            //WinPrint.document.write('Major Guide :________________').style.textAlign="left";
            // WinPrint.document.write('Mainor Guide :________________').style.textAlign="right";
            WinPrint.document.write('</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
            prtContent.innerHTML = "";
            document.location.href = "fetch_result.php"; 


}
$('#print_result').on('click',function(){
// alert();
	printData();
})
</script>