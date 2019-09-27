<?php
  include 'webpage_header.php';
  include 'connection.php';
?>

      <form action='Update_Password.php' method='POST' id='loginForm'>
        <div class="panel-heading col-md-offset-3 col-md-6">
              <div class="panel-title"><h3>Change Password</h3></div>
              
       </div>  

       
          <div class='input-group col-md-offset-4 col-md-6'>
            <?php  
               if(isset($_GET['err']))
               {
                  echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Your Username is not matched!</div>";
               }
               if(isset($_GET['arr']))
               {
                  echo "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully Change Your Password.</div>";
               }
             ?>
                <label for='uname'>Username</label>
                <input type='text' class='form-control' name='uname' id='uname' placeholder='Enter Username' required>
           </div>
          <div class='input-group col-md-offset-4 col-md-6'>
                    <label for='password'>New Password</label>
                    <input type='password' class='form-control' name='password' id='pwd' placeholder='Enter new Password' required>
          </div>
           <div class='input-group col-md-offset-4 col-md-6'>
                    <label for='confirmpassword'>Confirm Password</label>
                    <input type='password' class='form-control' name='confirmpassword' id='cpassword' placeholder='Re-enter password' required>
          </div>
          <div class='input-group col-md-offset-4 col-md-6'>
                 <span id='error' class='hidden' style='color:red'>Not Matched</span>
         </div>
         <br><div class='input-group col-md-offset-4 col-md-6'><input type='submit' name='save' id='save' class='btn btn-info' value='Save' /></div><br>
     </form>
<script>
       $('#cpassword').change(function(){
          // alert();
               if($('#pwd').val() !== $('#cpassword').val()){
                    $('#error').removeClass('hidden');
                      $('#save').attr("disabled", true);
                    return false; 
                  
               }
               else
               {
                 $('#error').addClass('hidden');
                   $('#save').attr("disabled", false);
               }
        });
</script>
<?php
 include 'webpage_footer.php';
?>
