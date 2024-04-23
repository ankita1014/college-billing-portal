<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require_once './PHPMailer-master/src/PHPMailer.php';
require_once './PHPMailer-master/src/SMTP.php';
require_once 'PHPMailer-master\src\Exception.php';

function sendMail($staffmail,$filename,$sub,$body,$file)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = 'shreechavan2325@gmail.com';
    // $mail->Password = '#PenDrive@4088#';
    $mail->Password ='tmik mcfq tpzu lkwz';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('shreechavan2325@gmail.com');
    $mail->addAddress($staffmail);
    $mail->addAttachment($file, $filename);
    $mail->isHTML(true);
    $mail->Subject = $sub;
  $mail->Body = $body;
    
   
  if ($mail->send()) {
    return true;
  }
  else{
    return false;
  }
}

?>