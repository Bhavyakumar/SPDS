<?php
	include("webpage_header.php");
	include_once "connection.php";
	echo"<div class='col-sm-12'>
				<br><h3 align=center style='font-family:UniversCondensed;'>Faculty Approval</h3 >
		</div>";

				echo"<div class='container-fluid col-sm-12 '>";

				$qr="select * from  faculty inner join department on department.d_id=faculty.d_id where f_status=0";
				$qry=mysqli_query($con,$qr);
				if(mysqli_num_rows($qry) > 0){
				$count=0;
				echo "";
				echo"<table class='table table-bordered'>";		
				echo"<thead style='background-color:#0b76e0;color:#ffffff;'><tr><th>Sr. no.</th><th>Faculty Name</th><th>Department</th><th>Email</th><th>Mobile No.</th><th>Guide Type</th><th></th><th></th></tr></thead><tbody>";
		
		   while($ar=mysqli_fetch_assoc($qry))
			  {
			  	$count++;
				echo"<form action='approve.php' method=POST><tr>";
				echo"<td>".$count."</td>";
				//echo"<td>".$ar["type_id"]."</td>";
				echo"<td>".$ar["fname"]."</td>";
				echo"<td>".$ar["department"]."</td>";
				echo"<td>".$ar["email"]."</td>";
				echo"<td>".$ar["phone_no"]."</td>";
				echo "<td>";
					echo "<select id='guide' name='guide' required class='form-control'>";
						echo "<option selected value=''>Select Guide type</option>";
						echo "<option  value='Major'>Major</option>";
						echo "<option  value='Minor'>Minor</option>";
					echo "</select>";
					echo '<input type="hidden" name="hidden" value="'.$ar['f_id'].'" id="hidden">';
					
				echo "</td>";
				echo "<td>";
					
						
						echo "<button  type='submit' id='submit' name='accept' class='btn btn-primary' onclick='return check();'><span class='glyphicon glyphicon-ok'></span></button>";
					
				echo "</td>";
				echo "<td>";
					
						
						echo "<a href='approve.php?id=".$ar["f_id"]."' onclick='return check();'><i class='glyphicon glyphicon-remove' style='font-size:25px;'></i></a>";
					
				echo "</td>";
				echo"</tr></form>";
			  }  
			  echo"</tbody></table>";
			  
			}
			else
			{
				echo  "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>No Faculty is registered.</div>";
			}
			echo"</div>";

?>

 <!-- <script type="text/javascript">
	$(this).change(function(){
		//alert("dsf");
		var Guide = $("#g").val();
		alert(Guide);
		var id = $(this).attr("class");
		alert(id);
		$.ajax({
		  type: "GET",
		  url: "guidetype.php",
		  data: {
		  	"a":Guide,
		  	"b":id
		  },
		  success: function(data){
		  	 //$("#d"+id).remove();
			 alert("Updated successfully");
			// $("#notes").html(data);				  
		  }
		});

	});
</script>	 -->
<script type="text/JavaScript">
	function check()
	{
		return confirm("Are You Sure?");
	}
</script>
<?php
	include("webpage_footer.php");
?>