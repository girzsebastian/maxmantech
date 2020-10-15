<?php

use PHPMailer\PHPMailer\PHPMailer;
var_dump('heloo');exit();
if(isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "mail.maxmantech.ro";
    $mail->SMTPAuth = true;
    $mail->Username = 'office@maxmantech.ro';
    $mail->Password = 'maxman1234567';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('office@maxmantech.ro');
    $mail->Subject = $subject;
    $mail->Body = $message;

}
?>


