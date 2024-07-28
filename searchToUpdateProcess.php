<?php

require "connection.php";

$array;

if(isset($_GET["id"])){
$id =  $_GET["id"];


if(empty($id)){
    echo "Please Enter the Product id";
}else{

    $prs  = Database::search("SELECT * FROM `product` WHERE `id`= '".$id."' ;");
    $n = $prs->num_rows;

    if($n == 1 ){
        $r = $prs->fetch_assoc();

        $array["id"]= $r["id"];

$crs = Database::search("SELECT * FROM `category` WHERE `id`= '".$r["category_id"]."';");
if($crs->num_rows == 1){
    $cr = $crs->fetch_assoc();

    $array["category"]= $cr["name"];
}


        // $array["id"]= $r["id"];    brand eka ganna 
        // $array["id"]= $r["id"]; model eka ganna 

        $array["title"]= $r["title"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];
        // $array["id"]= $r["id"];

        echo json_encode($array);



    }else{
        echo "Invalid Product Id";
    }

}
}


?>