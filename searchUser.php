<?php
session_start();
require "connection.php";

if(isset($_GET["s"])){
    $text = $_GET["s"];


        if(!empty($text)){
            
            $usersrs = Database::search("SELECT * FROM `user` WHERE  `email` LIKE '%".$text."%' ; ");
            $row  = $usersrs->fetch_assoc();

        
            $_SESSION["k"] = $row;

            echo "success";
        }
}
?>