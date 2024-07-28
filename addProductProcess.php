<?php

session_start();

require "connection.php";

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$colour = $_POST["col"];
$qty = (int)$_POST["qty"]; // enne string ekk nisa integer ekk krn (int) dala mult (concat krnw)
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $state = 1;
    $useremail = $_SESSION["u"]["email"];

    if ($category == "Select Category") {
        echo "Please select a category";
    } elseif ($brand == "Select Brand") {
        echo "Please select a brand";
    } elseif ($model == "Select Model") {
        echo "Please select a model";
    } elseif (empty($title)) {
        echo "Please add a title";
    } elseif (strlen($title) > 100) {
        echo "Title must contain 100 or less than 100 characters";
    } elseif ($qty == "0" || $qty == "e") {
        echo "Please add the quantity of your product";
    } elseif (!is_int($qty)) { //is_numeric To identify numbr or a numaric string
        echo "Please add a valid quantity";
    } elseif (empty($qty)) {
        echo "Please add the quantity of your product";
    } elseif ($qty < 0) {
        echo "Please add a valid quantity";
    } elseif (empty($price)) {
        echo "Please add the price of your product";
    } elseif (!is_int($price)) {
        echo "Please insert a valid price";
    } elseif (empty($dwc)) {
        echo "Please add the delevery cost";
    } elseif (!is_int($dwc)) {
        echo "Please insert a valid price";
    } elseif (empty($doc)) {
        echo "Please add the delevery cost";
    } elseif (!is_int($doc)) {
        echo "Please insert a valid price";
    } elseif (empty($description)) {
        echo "Please enter the description of your product";
    } else {


        $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'; ");

        $n = $modelHasBrand->num_rows;
        if ($n == 0) {
            echo "The Product Doesn't Exists";
        } else {
            $f = $modelHasBrand->fetch_assoc();
            $modelHasBrand = $f["id"];
            echo $description;
            Database::iud("INSERT INTO `product` (`category_id`,`model_has_brand_id`,`color_id`,`price`,`qty`,`description`,
            `title`,`condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`) 
            VALUES ('" . $category . "','" . $modelHasBrand . "','" . $colour . "','" . $price . "','" . $qty . "','" . $description . "',
            '" . $title . "','" . $condition . "','" . $state . "','" . $useremail . "','" . $date . "','" . $dwc . "','" . $doc . "');");

            echo "Product Added Successfully";




            // echo $date;

            

            $last_id = Database::$connection->insert_id;
            if(isset($_FILES["img"])){
                $image = $_FILES["img"];
            $allowed_image_extensions = array("image/jpeg", "image/jpg","image/png","image/svg");
            $fileex = $image["type"];

            if(!in_array($fileex,$allowed_image_extensions)){
            echo "Please Select a valid image";
            }else{
                $newimgextention;
                if($fileex = "image/jpeg"){
                    $newimgextention =".jpeg";
                }else if($fileex = "image/jpg"){
                    $newimgextention = ".jpg";
                }else if($fileex = "image/svg"){
                    $newimgextention = ".svg";
                }else if ($fileex = "image/png"){
                    $newimgextention = ".png";
                }
                    $file_name = "resources//product_images//" . uniqid() . $newimgextention;
                    echo $file_name;
                        move_uploaded_file($image["tmp_name"], $file_name);

                        Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$file_name."','".$last_id."')");
                        echo "product image added to the database successfully";

                }

            }else{
                echo "Please Select an Image";
            }






        }
    }



?>