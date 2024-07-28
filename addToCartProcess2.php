<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $text = $_GET["text"];
    $umail = $_SESSION["u"]["email"];

    if ($text == 0) {

        echo "Please add a Quantity";

    }else{

        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $umail . "' AND `product_id`='" . $id . "'");
        $cn = $cartrs->num_rows;

        if ($cn == 1) {
            echo "This product is already added to your Card";
        } else {

            $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id`='" . $id . "'");
            $pr = $productrs->fetch_assoc();

            if ($pr["qty"] >= $text) {
                Database::iud("INSERT INTO `cart`(`product_id`,`user_id`,`qty`) VALUES('" . $id . "','" . $umail . "','" . $text . "')");

                echo "success";
            }else {
                echo "Please enter a Quantity below"." ".$pr["qty"];
            }
        }
    }
}
?>