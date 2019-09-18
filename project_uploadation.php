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
?>
           <div class="col-sm-12">
          <form action="uploadation_suc.php" method="POST" enctype='multipart/form-data'>
            <div class="form-row">
            	
            	
            	<div class="panel-heading">
                  <div class="panel-title"><h3>Project Uploadation(RAR File)</h3></div>
              </div> 
              <?php
                     if(isset($_GET['err']))
                      { 
                         echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'> <button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully uploaded Project.</div>";
                      }
              ?>
              <div class="form-group col-md-6">
                <label for="rno">Registration No.</label>
                <input type="text" class="form-control" id="rno" name="rno" value="<?php echo $reg; ?>" readonly>
              </div>  
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"readonly>
              </div>
            <div class="form-group col-md-6">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>"  readonly>
            </div>
             <input type="hidden" name="hide" id="hide" value="<?php echo $tid;?>">
            <div class="form-group col-md-6">
              <label for="project">Project File</label>
              <input type="file" class="form-control" name="myfile" required>
            </div>  
          </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary ">Submit</button>
          </form><br>
          </div>
<?php
}
else
{
  echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Title is not Selected.</div>";
}
?>
<?php
    include 'webpage_footer.php';
?>