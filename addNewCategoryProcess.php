<?php

session_start();
require "connection.php" ;
if(isset($_SESSION['a'])){

    $text = $_GET["t"];

    if(empty($text)){
        echo " You must to Enter a Category... ";
    }else{
        $categoryrs = Database::search("SELECT * FROM `category` WHERE `name` LIKE '".$text."' ; ");
        $n = $categoryrs->num_rows;


        if($n == 1){
            echo "The Category already exists..";
        }else{

            Database::iud("INSERT INTO `category` (`name`) VALUES ('".$text."') ");

            echo "success";
        }
    }
}
?>