<?php
  include 'webpage_header.php';
?>

<script type="text/javascript">
    function ValidateReg() {
        var isValid = false;
        var regex = /^[0-9-+()]*$/;
        isValid = regex.test(document.getElementById("rno").value);
        document.getElementById("spnErrorReg").style.display = !isValid ? "block" : "none";
       
        // alert(idValid);
        return isValid;
       // document.getElementById("rno").value = "";
        // isValid.empty();  
    }
     function ValidateName() {
        var isValid = false;
        var regex = /^[a-zA-Z ]+$/;
        isValid = regex.test(document.getElementById("sname").value);
        document.getElementById("spnErrorName").style.display = !isValid ? "block" : "none";
        return isValid;
    }
    function ValidateRoll() {
        var isValid = false;
        var regex = /^[0-9]+$/;
        isValid = regex.test(document.getElementById("rollno").value);
        document.getElementById("spnErrorRoll").style.display = !isValid ? "block" : "none";
        return isValid;
    }
    function ValidatePhn() {
        var isValid = false;
        var regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
        isValid = regex.test(document.getElementById("sphone").value);
        document.getElementById("spnErrorPhn").style.display = !isValid ? "block" : "none";
        return isValid;
    }
    function ValidatePwd() {
        var isValid = false;
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        isValid = regex.test(document.getElementById("spwd").value);
        document.getElementById("spnErrorPwd").style.display = !isValid ? "block" : "none";
        return isValid;
    }
   function validateForm() {
    if( ( $("#spnErrorReg").css('display') == 'none' || $("#spnErrorReg").css("visibility") == "hidden")&&( $("#spnErrorName").css('display') == 'none' || $("#spnErrorName").css("visibility") == "hidden")&&( $("#spnErrorRoll").css('display') == 'none' || $("#spnErrorRoll").css("visibility") == "hidden")&&( $("#spnErrorPhn").css('display') == 'none' || $("#spnErrorPhn").css("visibility") == "hidden")&&( $("#spnErrorPwd").css('display') == 'none' || $("#spnErrorPwd").css("visibility") == "hidden"))
    {

    }
    else
    {
      return false;
    }

  }
    
</script>
 <div class="col-sm-12">
<form action="studreg_suc.php" name="myForm" method="POST">
  <div class="form-row">
  	
  	
  	<div class="panel-heading">
        <div class="panel-title"><h3>Student Registration</h3></div>
    </div> 
    <div class="form-group col-md-6">
      <label for="rno">Registration No.</label>
      <span id="spnErrorReg" style="color: Red; display: none">*Valid characters: Numbers,special characters And 15 digits are allowed.</span>
      <input type="text" class="form-control" maxlength="15" id="rno" name="rno" onchange="return ValidateReg(this)" placeholder="Registration No." required title="Maximum 15 Digits And only Numeric values are allowed.">
    </div>  
    <div class="form-group col-md-6">
      <label for="sname">Name</label>
      <input type="text" class="form-control" id="sname" maxlength="80" name="sname" onchange="return ValidateName(this)" placeholder="Name" required>
       <span id="spnErrorName" style="color: Red; display: none">*Valid characters: alphabetical only And maximum 80 characters are allowed.</span>
    </div>
    <div class="form-group col-md-6">
      <label for="sem">Semester</label>
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
    <div class="form-group col-md-6">
      <label for="rollno">Roll No.</label>
      <input type="text" class="form-control" id="rollno" name="rollno" maxlength="3" onchange="return ValidateRoll(this)" placeholder="Roll No." required>
      <span id="spnErrorRoll" style="color: Red; display: none">*Valid characters: Numbers Only And 3 digits are allowed.</span>
    </div>

  <div class="form-group col-md-6">
      <label for="sphone">Phone No.</label>
      <input type="text" class="form-control" id="sphone" name="sphone" onchange="return ValidatePhn(this)" placeholder="Phone No." maxlength="15" required>
      <span id="spnErrorPhn" style="color: Red; display: none">*Valid characters: Numbers only, 10 Digits are allowed And Number is an Indian Number allowed.</span>
  </div>
  <div class="form-group col-md-6">
    <label for="semail">Email</label>
    <input type="Email" class="form-control" id="semail" name="semail" maxlength="80" placeholder="Email Id" required>
  </div>
</div>
  <div class="form-group">
    <label for="spwd">Password</label>
    <input type="Password" class="form-control" id="spwd" name="spwd" maxlength="40" onchange="return ValidatePwd(this)" placeholder="Enter Password" required>
    <span id="spnErrorPwd" style="color: Red; display: none">*At least 1 lowercase alphabetical character,1 uppercase alphabetical character, 1 numeric character, one special character And string must be eight characters or longer </span>
  </div>
  
  <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="return validateForm();">Submit</button>
</form><br>
</div>

<?php
    include 'webpage_footer.php';
?>