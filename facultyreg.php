<?php
  include 'webpage_header.php';
?>
<script type="text/javascript">
  function ValidateName() {
        var isValid = false;
        var regex = /^[a-zA-Z  .]+$/;
        isValid = regex.test(document.getElementById("fname").value);
        document.getElementById("spnErrorName").style.display = !isValid ? "block" : "none";
        return isValid;
    }
    function ValidatePhn() {
        var isValid = false;
        var regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
        isValid = regex.test(document.getElementById("fphone").value);
        document.getElementById("spnErrorPhn").style.display = !isValid ? "block" : "none";
        return isValid;
    }
     function ValidatePwd() {
        var isValid = false;
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        isValid = regex.test(document.getElementById("fpwd").value);
        document.getElementById("spnErrorPwd").style.display = !isValid ? "block" : "none";
        return isValid;
    }
    function validateForm() {
    if( ( $("#spnErrorName").css('display') == 'none' || $("#spnErrorName").css("visibility") == "hidden")&&( $("#spnErrorPhn").css('display') == 'none' || $("#spnErrorPhn").css("visibility") == "hidden")&&( $("#spnErrorPwd").css('display') == 'none' || $("#spnErrorPwd").css("visibility") == "hidden"))
    {

    }
    else
    {
      return false;
    }

  }
</script>
 <div class="col-sm-12">
<form action="facultyreg_suc.php" method="POST">
  <div class="form-row">
  	
  	<div class="panel-heading">
        <div class="panel-title"><h3>Faculty Registration</h3></div>
    </div>   
    <div class="form-group col-md-6">
      <label for="fname">Name</label>
       <span id="spnErrorName" style="color: Red; display: none">*Valid characters: Numbers,special characters And 15 digits are allowed.</span>
      <input type="text" class="form-control" id="fname" name="fname" onchange="return ValidateName(this)" placeholder="Name" maxlength="80" title="Maximum 15 Digits And only Numeric values are allowed." required>
    </div>
    <div class="form-group col-md-6">
      <label for="fphone">Phone No.</label>
      <input type="text" class="form-control" id="fphone" name="fphone" onchange="return ValidatePhn(this)" placeholder="Phone No." maxlength="15" required>
      <span id="spnErrorPhn" style="color: Red; display: none">*Valid characters: Numbers only, 10 Digits are allowed And Number is an Indian Number allowed.</span>
    </div>
  </div>
  <div class="form-group ">
      <label for="dept">Department</label>
      <select id="dept" name="dept" class="form-control" required>
        <option value="">Select Department</option>
        <?php
            include 'connection.php';
            $qry="select * from department";
            $rs=mysqli_query($con,$qry);
            while($row=mysqli_fetch_assoc($rs))
            {
                echo "<option value=".$row['d_id'].">".$row['department']."</option>";
            }
        ?>
      </select>
    </div>
    
  <div class="form-group">
    <label for="femail">Email</label>
    <input type="Email" class="form-control" id="femail" name="femail" maxlength="80" placeholder="Email Id" required>
  </div>
  <div class="form-group">
    <label for="fpwd">Password</label>
    <input type="Password" class="form-control" id="fpwd" name="fpwd"maxlength="40" onchange="return ValidatePwd(this)" placeholder="Enter Password" required>
    <span id="spnErrorPwd" style="color: Red; display: none">*At least 1 lowercase alphabetical character,1 uppercase alphabetical character, 1 numeric character, one special character And string must be eight characters or longer </span>
  </div>
  
  <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return validateForm();">Submit</button>
</form><br>
</div>

<?php
    include 'webpage_footer.php';
?>