<?php
session_start();

require "connection.php";

if(isset($_SESSION['u'])){

    
 $id = $_GET["id"];
 $qty = $_GET["qty"];
 $umail = $_SESSION['u']['email'];


 $array;

 $orderID = uniqid();

 $productrs = Database ::search("SELECT * FROM `product` WHERE `id` = '".$id."'  ;");
 $pr = $productrs->fetch_assoc();

 $uhasid = Database :: search("SELECT * FROM `user_has_address` WHERE `user_email` ='".$umail."' ;");
 $ua = $uhasid->num_rows;


 if($ua == 1){
 $uha = $uhasid->fetch_assoc();

 $cityid = $uha["city_id"];
 $add = $uha["line1"].",".$uha["line2"];


 $cityrs = Database :: search("SELECT * FROM `city` WHERE `id` ='".$cityid."' ;");
 $cr = $cityrs->fetch_assoc();


$districtid = $cr["district_id"];

$delivery = "0";

    if($districtid == "2"){
        $delivery = $pr["delivery_fee_colombo"];
    }else{
        $delivery = $pr["delivery_fee_other"];
    }
    

    $item = $pr["title"];
    $amount = $pr["price"] * $qty + $delivery ; 

    $fname = $_SESSION['u']["fname"];
    $lname = $_SESSION['u']["lname"];
    $mobile = $_SESSION['u']["mobile"];
    $address = $add;
    $city =  $cr["name"];

  $array['id']  = $orderID;
  $array['item'] =  $item;
  $array['amount'] = $amount;
  $array['fname'] = $fname;
  $array['lname'] =  $lname;
  $array['email'] =  $umail;
  $array['mobile'] = $mobile;
  $array['address'] = $address;
  $array['city'] = $city;
  $array['qty'] = $qty;


  echo json_encode($array);

    }else{
        echo "2";
    }
     
}else{
    echo "1";
}


?>