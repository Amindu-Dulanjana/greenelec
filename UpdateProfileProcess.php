<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){


    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];

    if(empty($fname)){

        echo "Please Enter the First Name";

    }else if(empty($lname)){

        echo "Please Enter the Last name";

    }else if(empty($mobile)){

        echo "Please Enter the mobile Numer ";

    }else if (strlen($mobile)!=10){

        echo "mobile number must be at least 10 characters.....";

    }else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){

        echo"Invalid Mobile Number.....";

    }else if(empty($line1)){

        echo "Please Enter the line 1";
        
    }else{
    
   
            Database::iud("UPDATE `user` SET 
            `fname`='".$fname."',
            `lname`='".$lname."',
            `mobile`='".$mobile."'
             WHERE  `email`='".$_SESSION["u"]["email"]."' ;");

            //  echo "User Table Update";

             $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ");
             $nr = $address->num_rows;
     
             if ($nr == 1) {
                 // update
     
                 $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "'");
                 
                 $unr = $ucity->fetch_assoc();
     
                 Database::iud("UPDATE `user_has_address` SET `line1` = '" . $line1 . "', `line2` = '" . $line2 . "' WHERE `city_id` = '" . $unr["id"]. "'");
     
                //  echo "Re-new address added";
     
                 $last_id = Database::$connection->insert_id;
        
            $useremails = $_SESSION["u"]["email"];
            if(isset($_FILES["i"])){
                $img = $_FILES["i"];
            $allowed_image_extensions = array("image/jpeg", "image/jpg","image/png","image/svg");
            $fileex = $img["type"];

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
                        $file_name = "resources//profile_img//" . uniqid() . $newimgextention;
                        // echo $file_name;
                            move_uploaded_file($img["tmp_name"], $file_name);

                          $profileimages = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='".$useremails."';");
                          $upimg = $profileimages->num_rows;

                          if($upimg == 1){

                            Database::iud("UPDATE `profile_img` SET `code` ='".$file_name."' WHERE `user_email`='".$useremails."';");

                            echo "product image added to the database successfully";

                               echo "success";



                          }else{
                                 
                            Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES('".$file_name."','".$useremails."');");
                            echo "product image added to the database successfully";
                            
                                   echo "success";
                          }
                         
                             

                    }

            }else{
                echo "Please Select an Image";
            }


        } else {



            $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' ");
            $unr = $ucity->fetch_assoc();

            Database::iud("INSERT INTO `user_has_address` (`user_email`,`line1`,`line2`,`city_id`) VALUES 
            ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "') ");


            
        }
         
        $search_user =  Database::search("SELECT * FROM `user` WHERE `email`= '".$_SESSION["u"]["email"] ."';");
        $user_rs = $search_user-> num_rows;

        $userData = $search_user->fetch_assoc();

        $_SESSION["u"] = $userData;
    }
}
?>
