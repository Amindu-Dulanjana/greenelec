<?php
require "connection.php";



$from = $_GET['f'];
$to = $_GET['t'];


if(!empty($from) && !empty($to)){

    $invoicers = Database :: search ("SELECT * FROM `invoice` ");
    $in = $invoicers->num_rows;

    for($x = 0; $x < $in; $x++){
        $ir = $invoicers->fetch_assoc();

        $indate = $ir["date"];

        $splitdate = explode(" ", $indate);
        $d = $splitdate[0];

        if($from == $d){
            
            $_SESSION['r'] = $ir ;
            
            echo "success";
        }
    }

}
?>