<?php

require "connection.php";

 $fname  =$_POST["fname"];
 $lname  =$_POST["lname"];
 $email  =$_POST["email"];
 $password  =$_POST["password"];
 $mobile  =$_POST["mobile"];
 $gender  =$_POST["gender"];


if(empty($fname)){
    echo "Please Enter Your first Name.....";
}else if (strlen($fname)>=50){
    echo "First Name must be less than 50 characters.....";
}
else if(empty($lname)){
    echo "Please Enter Your Last Name.....";
}else if (strlen($lname)>=50){
    echo "Last Name must be less than 50 characters.....";
}
else if(empty($email)){
    echo "Please Enter Your Email.....";
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email address.....";
}elseif(strlen($email)>100){
    echo "Invalid email address.....";

}else if(empty($password)){
    echo "Please Enter Your Password.....";
}else if (strlen($password)<=5||strlen($password)>=20){
    echo "password must be less than 20 characters AND at least 6 characters.....";
}else if(empty($mobile)){
    echo "Please Enter Your Mobile Number.....";
}else if (strlen($mobile)!=10){
    echo "mobile number must be at least 10 characters.....";
}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){

    echo"Invalid Mobile Number.....";

}else{
  
$r = DATABASE::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'" );
if($r->num_rows>0){
    echo "User with the same email already exists";

}else{

    // srilankan date 

  $d = new DateTime();
  $tz = new DateTimeZone("Asia/Colombo");
  $d->setTimeZone($tz);
  $date = $d->format('Y-m-d H:i:s');
  
  DATABASE::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`register_date`) VALUES('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$gender."','".$date."')");

  echo'success';
}
}

?>