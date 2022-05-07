
<?php
$datedebut=$_POST['datedebut'];
 $datefin=$_POST['datefin'];
 $email=$_GET['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
 
$mail = new PHPMailer(true); 
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'realestateleban1@gmail.com';
    $mail->Password = 'prfksjbfshjctarz';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
 
    $mail->setFrom('realestateleban1@gmail.com', 'RealEstate Company');
    $mail->addAddress($email);
   
 
    //Attachments
    
 
    //Content
     
    $mail->Subject = 'Rendez-Vous';
    $mail->Body    = 'Your are requested to come to see the property you reserverd.
    The rendez-vous start at '.$datedebut.' and ends at '.$datefin ;
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
echo '<script>window.location.href="reserveagent.php";</script>';
  ?>