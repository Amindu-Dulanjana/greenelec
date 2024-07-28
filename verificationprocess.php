<?php
session_start();
require "connection.php";
if(isset($_GET["v"])){

    $v = $_GET["v"];




    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `verification` ='".$v."' ;");
    $an = $admin_rs->num_rows;

    if($an == 1 ){

        $ar = $admin_rs->fetch_assoc();

    
        $_SESSION["a"] = $ar;

        echo "success";

    }else{
        echo "You must enter a valid verification code to log In";
    }
}else{
    echo "Please add the verification code first...";
}
?>