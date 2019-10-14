<?php
  include 'webpage_header.php';
  include 'connection.php';
?>
<script>
  $(document).ready(function() {
       $("#example").DataTable({
		"scrollX": true
		});
});
</script>
<form action="fac_mark.php" method="POST">
<div class="col-sm-12">
	<div class="panel-heading">
			<div class="panel-title"><h3>Project Presentation Evaluation</h3></div>
	   </div>
<div class="form-group col-sm-3">
		
      <label for="semester">Semester</label>
      <select id="sem" name="sem" class="form-control" required>
        <option selected>Select Semester</option>
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
if(isset($_POST['submit']))
{
	
	echo "<div class='col-sm-12'>";
			$sem=$_POST['sem'];

			echo "<table border=1 class='table table-bordered' id='example'>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>Registrstion No.</th>";
							echo "<th>Name</th>";
							echo "<th>Title</th>";
							echo "<th>Language(framework)</th>";
							echo "<th>Synopsis Submit Date</th>";
							echo "<th>Report Submit Date</th>";
							echo "<th>Project Report(Out of 45 marks)</th>";
							echo "<th>Design & Analysis(Out of 20 marks)</th>";
							echo "<th>Coding & Validation(Out of 15 marks)</th>";
							echo "<th>Presentation(Out of 10 marks)</th>";
							echo "<th>UI Design(Out of 10 marks)</th>";
							echo "<th>Total(Out of 100 marks)</th>";
							echo "<th></th>";
						echo "</tr>";
						echo "</thead>";
				$sql="SELECT title.sem_id,student.reg_no,name,title,language,synopsis_date,report_date,title.t_id,sub_id FROM submission INNER JOIN student ON student.reg_no = submission.reg_no INNER JOIN title ON title.reg_no=submission.reg_no INNER JOIN minor_guide ON minor_guide.reg_no=submission.reg_no INNER JOIN major_guide ON major_guide.reg_no=submission.reg_no where title.sem_id='5' AND report_status=1 order by student.reg_no";
			    echo $sql;
			    echo "<tbody>";
				$rs= mysqli_query($con,$sql);
				while($row=mysqli_fetch_assoc($rs))
				{
					echo "<tr>";
						echo "<td>".$row['reg_no']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['language']."</td>";
						$sydate=$row['synopsis_date'];
                        $sy= date("d-m-Y", strtotime($sydate));
						echo "<td>".$sy."</td>";
						$or=$row['report_date'];
                        $new= date("d-m-Y", strtotime($or));
						echo "<td>".$new."</td>";
						echo "<input type='hidden' class='form-control' value='".$row['reg_no']."' id='reg' name='reg'>";
						echo "<input type='hidden' class='form-control' value='".$row['t_id']."' id='tid".$row['reg_no']."' name='tid'>";
						echo "<input type='hidden' class='form-control' value='".$row['sub_id']."' id='sid".$row['reg_no']."' name='sid'>";
						echo "<input type='hidden' class='form-control' value='".$row['sem_id']."' id='semid".$row['reg_no']."' name='semid'>";
						echo "<td><input type='text' class='textbox form-control' name='proreport' id='proreport".$row['reg_no']."' placeholder='Marks' required></td>";
						echo "<td><input type='text' class='textbox form-control' name='des_analysis' id='des_analysis".$row['reg_no']."' placeholder='Marks' required></td>";
						echo "<td><input type='text' class='textbox form-control' name='code_valid' id='code_valid".$row['reg_no']."' placeholder='Marks' required></td>";
						echo "<td><input type='text' class='textbox form-control' name='presentation' id='presentation".$row['reg_no']."' placeholder='Marks' required></td>";
						echo "<td><input type='text' class='textbox form-control' name='UIdes' id='UIdes".$row['reg_no']."' placeholder='Marks' required></td>";
						echo "<td><input type='text' class='total form-control' name='totalmark' id='totalmark".$row['reg_no']."' placeholder='Marks' required readonly></td>";
						echo "<td align='center'><button  type='button' data='".$row['reg_no']."' id='Mark".$row['reg_no']."' name='Mark' class='btn btn-primary insertMarkButton'><span class='glyphicon glyphicon-ok'></span></button></td>";
							
					  echo "</tbody>";
					echo "</tr>";
				}
				
			echo "</table>";

	echo "</div>";
}
?>
<script>
	$(document).ready(function() {
		  $(".textbox").on('keyup change', calculateSum);
	});
	function calculateSum() {
		  var $input = $(this);
		  var $row = $input.closest('tr');
		  var sum = 0;

		  $row.find(".textbox").each(function() {
		    sum += parseFloat(this.value) || 0;
		  });

  		$row.find(".total").val(sum.toFixed(2));
	}
	$(document).ready(function() {
		$(".insertMarkButton").click(function(){
			var reg=$(this).attr("data");
			var tid=$("#tid"+reg).val();
			var sid=$("#sid"+reg).val();
			var semid=$("#semid"+reg).val();
			var proj=$("#proreport"+reg).val();
			var des_analysis=$("#des_analysis"+reg).val();
			var code_valid=$("#code_valid"+reg).val();
			var presentation=$("#presentation"+reg).val();
			var UIdes=$("#UIdes"+reg).val();
			var totalmark=$("#totalmark"+reg).val();
			// var des_analysis=$("#des_analysis").val();
		 // alert(reg);
			$.ajax({
                    url:'Mark_total.php',
                    method:'POST',
                    data:{
                        reg:reg,
                        tid:tid,
                        sid:sid,
                        semid:semid,
                        proj:proj,
                        des_analysis:des_analysis,
                        code_valid:code_valid,
                        presentation:presentation, 
                        UIdes:UIdes,
                        totalmark:totalmark,
                    },
                   success:function(data){
                   	alert("Uploaded");
                   	
                   }
                });

 		});
	});
</script>
<style>
	.tbody{

	}
</style>
<?php
  include 'webpage_footer.php';
?>