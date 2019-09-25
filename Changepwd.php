<?php
  include 'webpage_header.php';
  include 'connection.php';
 
?>
<form action="Changepwd.php" method="POST">
  <div class="panel-heading">
            <div class="panel-title"><h3>Change Password</h3></div>
           </div>
      <div class="col-sm-12 ">
      		
              <div class="form-group col-sm-3">
                    <label for="type">Type of User</label>
                    <select id="type" name="type" class="form-control" required>
                      <option value="">Select Type</option>
                         <option value="PM">Project Manager</option>
                           <option value="Clerk">Clerk</option>
                   </select>
                
              </div>
            <br>
            <div class="form-group col-sm-3">
            	<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit"/>
              
            </div>

      </div>

</form>	
<?php
    if(isset($_POST["submit"]))
    {
     $type=$_POST["type"];
          echo"<form action='Update_Password.php' method='POST'><div class='input-group col-md-offset-4 col-md-6'>
                        <label for='uname'>Username</label>
                        <input type='text' class='form-control' name='uname' id='uname' placeholder='Enter Username' required>
              </div>";
               echo"<div class='input-group col-md-offset-4 col-md-6'>
                        <label for='password'>New Password</label>
                        <input type='password' class='form-control' name='password' id='password' placeholder='Enter new Password' required>
              </div>";
                echo "<input type='hidden' name='type' value='".$type."'>";
               echo"<div class='input-group col-md-offset-4 col-md-6'>
                        <label for='cpassword'>Confirm Password</label>
                        <input type='password' class='form-control' name='cpassword' data-match='#password' data-match-error='Whoops, these don't match' id='cpassword' placeholder='Re-enter password' required>
              </div>";
              echo "<br><div class='input-group col-md-offset-4 col-md-6'><input type='submit' name='save' id='save' class='btn btn-info' value='Save'/></div><br>";
              echo "</form>";
    }
 include 'webpage_footer.php';
?>