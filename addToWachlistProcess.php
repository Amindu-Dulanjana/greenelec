<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $uemail = $_SESSION["u"]["email"];

    $id = $_GET["id"];
    
    $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '".$id."' AND `user_email` = '".$uemail."' ;");
    $n = $watchlist->num_rows;

    if($n == 1){
        echo "You Have Recently added this product to the Watchlist";

    }else{
    Database::iud("INSERT INTO `watchlist` (`product_id`,`user_email`) VALUES ('".$id."','".$uemail."') ;");

    echo "success";

    }


}

?>