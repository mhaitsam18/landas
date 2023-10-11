<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends CI_Controller {

 public function __construct()
 {
   parent::__construct(); 

   require APPPATH.'libraries/phpmailer/src/Exception.php';
   require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
   require APPPATH.'libraries/phpmailer/src/SMTP.php';
 }

 public function index()
 {
   // PHPMailer object
   $response = false;
   $mail = new PHPMailer();

   // SMTP configuration
   $mail->isSMTP();
   $mail->Host     = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'maharajagina@gmail.com'; // user email anda
   $mail->Password = 'owxiilbyjpeukpsc'; // password email anda
   $mail->SMTPSecure = 'ssl';
   $mail->Port     = 465;

   $mail->setFrom('maharajagina@gmail.com', 'LANDAS'); // user email anda
   $mail->addReplyTo('maharajagina@gmail.com', ''); //user email anda

   // Email subject
   $mail->Subject = 'Aplikasi LANDAS'; //subject email

   // Add a recipient
   $mail->addAddress('rudisetiawansamosir@gmail.com'); //email tujuan pengiriman email

   // Set email format to HTML
   $mail->isHTML(true);

   // Email body content
   $mailContent = "<p>Hallo <b> Guys </b></p>"; // isi email
   $mail->Body = $mailContent;

   // Send email
   if(!$mail->send()){
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
   }else{
     echo 'Message has been sent';
   }
 }
}