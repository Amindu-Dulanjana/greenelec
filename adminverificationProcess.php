<?php
require "connection.php";
require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 
use PHPMailer\PHPMailer\PHPMailer; 

if(isset($_POST["e"])){
$email = $_POST["e"];

 if(empty($email)){
     echo "Please enter your email address";
 }else{

    $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' ;");
    $an = $adminrs -> num_rows;

    if($an == 1){
      $code = uniqid();

       Database ::iud("UPDATE `admin` SET `verification`='".$code."' WHERE `email` = '".$email."' ;");


                              
       $mail = new PHPMailer; 
       $mail->IsSMTP();
       $mail->Host = 'smtp.gmail.com'; 
       $mail->SMTPAuth = true; 
       $mail->Username = 'umamidu@gmail.com'; 
       $mail->Password = '881461205v';
       $mail->SMTPSecure = 'ssl';
       $mail->Port = 465;
       $mail->setFrom('umamidu@gmail.com', 'eShop'); 
       $mail->addReplyTo('umamidu@gmail.com', 'eShop'); 
       $mail->addAddress($email); 
       $mail->isHTML(true); 
       $mail->Subject = 'eShop  Addmin varification code'; 
       $bodyContent = '<h1 style="color:red;">Your Verification Code : '.$code.'</h1>'; 
       $mail->Body    = $bodyContent;

       if(!$mail->send()) { 
           echo 'Vrification code sending fail'.$mail->ErrorInfo; 
       } else { 
           echo 'success'; 
       } 




    }else{
        echo "You are not a valid User";
    }
 }

}else{
    echo "Please enter your email address";
}

?>