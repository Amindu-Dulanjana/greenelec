<?php

session_start();

require "connection.php";

$title = $_POST["t"];
$qty = $_POST["q"];
$dwc = $_POST["c"];
$doc = $_POST["o"];
$description = $_POST["d"];

if (empty($title)) {
    echo "Please Add a Title.";
} else if (strlen($title) > 100) {
    echo "Title Must Contain 100 or Less than 100 Characters.";
} else if ($qty == "0" || $qty == "e") {
    echo "Please Add the Quantity of Your Product.";
} else if (!is_numeric($qty)) {
    echo "Please Add Valid Quantity.";
} else if (empty($qty)) {
    echo "Please Add the Quantity of Your Product.";
} else if ($qty < 0) {
    echo "Please Add a Valid Quantity.";
} else if (empty($dwc)) {
    echo "Please Insert the Delivery Cost Inside Colombo District.";
} else if (!is_numeric($dwc)) {
    echo "Please Insert a Valid Delivery Cost.";
} else if (empty($doc)) {
    echo "Please Insert the Delivery Cost Outside Colombo District.";
} else if (!is_numeric($doc)) {
    echo "Please Insert a Valid Delivery Cost.";
} else if (empty($description)) {
    echo "Please Add the Description of Your Product.";
} else {

    $productid = $_SESSION["product"]["id"];

    $qupdate = Database::iud("UPDATE `product` SET
    `title`='" . $title . "',
    `qty`='" . $qty . "',
    `delivery_fee_colombo`='" . $dwc . "',
    `delivery_fee_other`='" . $doc . "',
    `description`='" . $description . "'
    WHERE `id`='" . $productid . "'");

    echo "success";

    if (isset($_FILES["i"])) {

        $image = $_FILES["i"];

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");
        $fileex = $image["type"];

        if (!in_array($fileex, $allowed_image_extention)) {
            echo "Please Select a Valid Image.";
        } else {

            $newimgextention;

            if ($fileex = "image/jpeg") {
                $newimgextention = ".jpeg";
            } else if ($fileex = "image/jpg") {
                $newimgextention = ".jpg";
            } else if ($fileex = "image/png") {
                $newimgextention = ".png";
            }


            $file_name = "resources//product_images//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $userimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productid . "'");
            $row = $userimg->fetch_assoc();

            Database::iud("UPDATE `images` SET `code`='" . $file_name . "' WHERE `product_id`='" . $row["product_id"] . "'");
        }
    }
    /////
    if (isset($_FILES["i1"])) {

        $image = $_FILES["i1"];

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");
        $fileex = $image["type"];

        if (!in_array($fileex, $allowed_image_extention)) {
            echo "Please Select a Valid Image.";
        } else {

            $newimgextention;

            if ($fileex = "image/jpeg") {
                $newimgextention = ".jpeg";
            } else if ($fileex = "image/jpg") {
                $newimgextention = ".jpg";
            } else if ($fileex = "image/png") {
                $newimgextention = ".png";
            }


            $file_name = "resources//product_images//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $userimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productid . "'");
            $row = $userimg->fetch_assoc();

            if (isset($row['code1'])) {
                Database::iud("UPDATE `images` SET `code1`='" . $file_name . "' WHERE `product_id`='" . $row["product_id"] . "'");
            } else {
                Database::iud("INSERT INTO `images` (`code1`,`product_id`) VALUES('" . $file_name . "','" . $row["product_id"] . "')");
            }
        }
    }
    ////
    if (isset($_FILES["i2"])) {

        $image = $_FILES["i2"];

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/svg");
        $fileex = $image["type"];

        if (!in_array($fileex, $allowed_image_extention)) {
            echo "Please Select a Valid Image.";
        } else {

            $newimgextention;

            if ($fileex = "image/jpeg") {
                $newimgextention = ".jpeg";
            } else if ($fileex = "image/jpg") {
                $newimgextention = ".jpg";
            } else if ($fileex = "image/png") {
                $newimgextention = ".png";
            }


            $file_name = "resources//product_images//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $userimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productid . "'");
            $row = $userimg->fetch_assoc();

            Database::iud("UPDATE `images` SET `code2`='" . $file_name . "' WHERE `product_id`='" . $row["product_id"] . "'");
        }
    }
}
