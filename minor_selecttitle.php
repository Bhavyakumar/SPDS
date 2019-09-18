<?php
	// print_r($_POST);
include 'connection.php';
	if(isset($_POST['accept']))
	{
  		$min="";
		foreach($_POST as $key => $value) {
		  	if(substr($key,0,9)=="min_title")
		  	{
		  		$min=$value;
		  	}
		  	if($min!="")
		  	{
		  		 echo $min;
		  		$sql="update title set t_status=2 where t_id=".$min;
		  		mysqli_query($con,$sql);
		  		$min="";

		  	}

		  		header("location:fetch_title.php?err");
		 }
		
	}
	if(isset($_POST['send']))
	{
  		$maj="";
  		$date = date('Y-m-d H:i:s');
		foreach($_POST as $key => $value) {
		  	if(substr($key,0,9)=="maj_title")
		  	{
		  		$maj=$value;
		  	}
		  	if($maj!="")
		  	{
		  		 // echo $maj;
		  		$sql="update title set t_status='1', t_submit_date='".$date."' where t_id='".$maj."'";
		  		mysqli_query($con,$sql);
		  		$maj="";
			}
		}
		$hid=$_POST['hidden'];
		$sql1="SELECT * FROM title INNER JOIN student ON student.reg_no=title.reg_no WHERE t_id='".$maj."'";
		//require 'phpmailer/PHPMailerAutoload.php';
		 require 'PHPMailer\phpmailer\PHPMailerAutoload.php';

		$qr=mysqli_query($con,$sql1);
		while ($ra=mysqli_fetch_assoc($qr)) {

				echo $name=$ra['name'];
       			echo $email=$ra['email'];
       			echo $title=$ra['title'];

       			echo $reg_no=$ra['reg_no'];
       			echo $tid=$ra['title_decscription'];
       		

		
//function sendEmail($name,$email,$title,$reg_no,$tid)

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 4;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'bhavychaudhary5@gmail.com';                     // SMTP username
    $mail->Password   = 'LENOVOzukz1';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    //$mail->Port       = 587;
    $mailer->Port = '587';                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bhavychaudhary5@gmail.com', 'Student Project Distribution System of CAIT');
    $mail->addAddress($email);               // Name is optional
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Final Topic of your Project.';
    $mail->Body    = '<b>Name: '.$name.' <br>Registration No.: '.$reg_no.'<br> The topic title is : '.$title.' <br> Topic description is :'.$tid.' </b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


	}
		
}
// header_remove();
// header("location:fetch_title.php?err");
//header( 'Location:http://localhost/project/fetch_title.php');
exit;
?>