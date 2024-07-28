<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $sender = $_SESSION["u"]["email"];
    // $recever = $_POST["e"];
    $msg = $_POST["t"];
    $pid = $_POST["e2"];


    $productrs = Database ::search("SELECT * FROM `product` WHERE `id` = '".$pid."' ;");
    $product_results = $productrs->fetch_assoc();

    $recever = $product_results["user_email"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if(empty($msg)){
        echo "Please enter a message to send";
    }else{

        Database::iud("INSERT INTO `chat` (`from`,`to`,`content`,`date`,`status`) VALUES ('".$sender."','".$recever."','".$msg."','".$date."','1')");
        echo "success";

    }

}

?>