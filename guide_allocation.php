<?php
  include 'webpage_header.php';
  include 'connection.php';
 
?>
<script>
  $(function(){
        $("#sem").change(function(){
            $.ajax({
                url: "getStudent.php",
                type: "GET",
                data: {
                    "sid":$(this).val()
                },

                success: function(data) {
                    // console.log(data);
                     $("#student").empty();
                   $("#student").append(data);
                },
                error: function (error) {
                   console.log(error);
                    alert('error; ' + error.responseText);
                }
            });
        });
        
    });
</script>
<form action="getStudent.php" method="POST">
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
<br><br>
<br>
<br>

<div id="student"  >
  
</div>

</div>
</form>	
<?php
  include 'webpage_footer.php';
?>