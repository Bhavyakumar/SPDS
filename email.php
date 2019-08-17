<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
include 'connection.php';
// Load Composer's autoloader
require 'phpmailer/PHPMailerAutoload.php';

$qry= 'SELECT * from student';
//echo $qry;
$rs=mysqli_query($con,$qry);

while($row = mysqli_fetch_assoc($rs))
{
        $name=$row['name'];
        $email=$row['email'];
        // $topic=$row['Topic'];



        sendEmail($name,$email);
}

// Instantiation and passing `true` enables exceptions
function sendEmail($name,$email)
{
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
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
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Final Topic of your Project.';
    $mail->Body    = '<b>Name: '.$name.' <br> The topic is : '.$email.'</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>