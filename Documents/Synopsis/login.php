<?php
  include 'header.php';
?>
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="css/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

  <div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">                    
      <div class="panel panel-info" >
        <div class="panel-heading">
          <div class="panel-title">Sign In</div>
           <!--  <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
              </div>     

                <div style="padding-top:30px" class="panel-body" >

                 <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                    <form id="loginform" class="form-horizontal" role="form" action="login_suc.php">
                                    
                      <div style="margin-bottom: 25px" class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email"></div>
                                
                      <div style="margin-bottom: 25px" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input id="login-password" type="password" class="form-control" name="password" placeholder="password"></div>

                      <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                         <div class="col-sm-12 controls">
                            <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                          
                          </div>
                       </div>


                       <div class="form-group">
                           <div class="col-md-12 control">
                             <a href="">Sign Up Here</a>
                            </div>
                       </div>
                    </form> 
                   </div>    
                       
               </div>                     
          </div>  
     </div>

        

    
<?php
  include 'footer.php';
?>