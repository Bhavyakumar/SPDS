<?php
  include 'webpage_header.php';
?>

<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->   
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
  <div class="panel panel-info" >
   <div class="panel-heading">
    <div class="panel-title">Project Manager and Clerk Sign In</div>
  </div>     

  <div style="padding-top:30px" class="panel-body" >
    <?php
    if(isset($_GET['arr']))
    {
      echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'>Username or Password are not correct!  
      </div>"; 
    }
     if(isset($_GET['rr']))
    {
      echo"<div style='display:' id='login-alert' class='alert alert-danger col-sm-12'>Captcha is Invalid!  
      </div>"; 
    }
    ?>         
    <form action='pmlogin_suc.php' method='POST'>

      <div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-user"></i>
        </span>
        <input type="text" class="form-control" name="pmuname" id="pmuname" placeholder="username or email" required>
      </div>

      <div style="margin-bottom: 25px" class="input-group"> 
        <span class="input-group-addon">
          <i class="glyphicon glyphicon-lock"></i>
        </span>
        <input type="password" class="form-control" id="pmpwd" name="pmpwd" placeholder="password" required>
      </div>

      <div style="margin-top:10px" class="form-group">
        <!--Captcha-->        
        <div class="row">
            <div class="col-lg-6"> 
              <input type="text" name="captcha" class="form-control" placeholder="Captcha" id="captcha"class="demoInputBox" required>
            </div>
            <div class="col-lg-6"> 
              <img id="captcha_code" src="capcha.php" />
              &nbsp;&nbsp;&nbsp;<a href="#" id="Refresh" style="font-size: 150%;"><span class="glyphicon glyphicon-refresh spin"></span></a>
            </div>
        </div>
      </div> 
        <!-- Button -->
        <div class="col-sm-12 controls">
          <button type="submit" name="submit" id="submit"  class="btn btn-primary btn-md">Login</button>
        </div>     <br>     <br>

        <div class="col-md-12 control">
         <a href="Changepwd.php">Change Password?</a>
       </div>
     </form> 


   </div>         
 </div>                     
</div>  
<script>
 $('#Refresh').click(function (){
    $("#captcha_code").attr('src','capcha.php');
 });
 
</script> 
<?php
    include 'webpage_footer.php';
?>
