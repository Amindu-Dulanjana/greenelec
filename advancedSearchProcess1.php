



<?php

require "connection.php";

if(isset($_POST['k'])){
    

    $k = $_POST['k'];
    $c = $_POST['c'];
    $b = $_POST['b'];
    $m = $_POST['m'];
    $con = $_POST['con'];
    $clr = $_POST['clr'];
    $pf = $_POST['pf'];
    $pt = $_POST['pt'];

    if(empty($k)  && empty($c) && empty($b) && empty($m)  && empty($con) && empty($clr) && empty($pf) && empty($pt)){

            echo "please enter product or detail or select option";

    }else if(empty($k)  && empty($c) && empty($b) && empty($m)  && empty($con) && empty($clr) && empty($pf) && !empty($pt)){




        $productrs = Database::search("SELECT * FROM `product` WHERE `price`>= '".$pt."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        




       

    }else if (empty($k)  && empty($c) && empty($b) && empty($m) && empty($con) && empty($clr) && !empty($pf) && empty($pt)){
        
        
        
        $productrs = Database::search("SELECT * FROM `product` WHERE `price`<= '".$pf."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        



    }else if (empty($k)  && empty($c) && empty($b) && empty($m) && empty($con) && !empty($clr) && empty($pf) && empty($pt)){
        
        
        $productrs = Database::search("SELECT * FROM `product` WHERE `color_id`>= '".$clr."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        




    }else if (empty($k)  && empty($c) && empty($b) && empty($m) && !empty($con) && empty($clr) && empty($pf) && empty($pt)){
        
        
        $productrs = Database::search("SELECT * FROM `product` WHERE `condition_id` = '".$con."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        



    
    }else if (empty($k)  && empty($c) && empty($b) && !empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
        
        
   
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='".$m."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE  `model_has_brand_id` = '".$mod."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
    }else if (empty($k)  && empty($c) && !empty($b) && empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
    
            
        
   
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$b."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE  `model_has_brand_id` = '".$mod."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }

    }else if (empty($k)  && !empty($c) && empty($b) && empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
        
        
        
        $productrs = Database::search("SELECT * FROM `product` WHERE `category_id` = '".$c."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        



    }else if (!empty($k)  && empty($c) && empty($b) && empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
        
        


        

        $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%".$k."%' OR `description` LIKE '%".$k."%' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                }

    }else if (empty($k)  && empty($c) && empty($b) && empty($m) && empty($con) && empty($clr) && !empty($pf) && !empty($pt)){
        
               
        $productrs = Database::search("SELECT * FROM `product` WHERE `price` >= '".$pt."' AND `price` <= '".$pf."'    ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        

    }else if (empty($k)  && empty($c) && empty($b) && empty($m) && !empty($con) && !empty($clr) && empty($pf) && empty($pt)){
        
               
        $productrs = Database::search("SELECT * FROM `product` WHERE `color_id` = '".$clr."' AND `condition_id`='".$con."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        


    }else if (empty($k)  && empty($c) && !empty($b) && !empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
        
     
        
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='".$m."' AND  `brand_id` = '".$b."'  ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE `model_has_brand_id` = '".$mod."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;


for($z = 0; $z < $in; $z++){

    
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
    
            echo "no items";
    
        


    }else if (empty($k)  && !empty($c) && !empty($b) && empty($m) && empty($con) && empty($clr) && empty($pf) && empty($pt)){
        

        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$b."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE `category_id` = '".$c."' AND `model_has_brand_id` = '".$mod."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        


    }else if (empty($k)  && empty($c) && !empty($b) && !empty($m) && !empty($con) && !empty($clr) && !empty($pf) && !empty($pt)) {
        
    
        
   
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$b."' OR `model_id`='".$m."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE  `category_id` = '".$c."' AND `model_has_brand_id` = '".$mod."'
    AND `condition_id` = '".$con."' AND `color_id` = '".$clr."' AND `price` >= '".$pt."' AND `price` <= '".$pf."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
        
    }else if (empty($k)  && !empty($c) && !empty($b) && !empty($m) && !empty($con) && !empty($clr) && !empty($pf) && !empty($pt)) {
        
    
        
   
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$b."' OR `model_id`='".$m."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE  `category_id` = '".$c."' OR `model_has_brand_id` = '".$mod."'
    OR `condition_id` = '".$con."' OR `color_id` = '".$clr."' OR `price` >= '".$pt."' AND `price` <= '".$pf."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php

        }
    }else{

            
   
        $model_brand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='".$b."' OR `model_id`='".$m."' ;");
        $mod_brandrs = $model_brand->fetch_assoc();

        $mod = $mod_brandrs["id"];
               
        $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '".$k."' OR `category_id` = '".$c."' OR `model_has_brand_id` = '".$mod."'
        OR `condition_id` = '".$con."' OR `color_id` = '".$clr."' OR `price` >= '".$pt."' OR `price` <= '".$pf."' ;");
        $pb = $productrs->num_rows;

        for($i = 0; $i < $pb ; $i++) {

            $abr = $productrs->fetch_assoc();

            ?>


            <!-- card -->
                <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5" style="max-width: 540px;">
                    <div class="row g-0">

                        <div class="col-md-4 mt-4">
<?php

$imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$abr["id"]."' ;");
$in = $imgrs->num_rows;

for($z = 0; $z < $in; $z++){
 $ir = $imgrs->fetch_assoc();
?>
        <img src="<?php echo $ir["code"] ?>" class="img-fluid d-grid">
<?php
}
?>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $abr['title']; ?></h5>
                                <span class="text-primary fw-bold">Rs.<?php echo $abr['price']; ?> . 00</span><br>
                                <span class="text-success fw-bold"><?php echo $abr['qty']; ?> Items Left</span><br>
                                <div class="form-check form-switch">
                                 
                                    <label class="form-check-label text-info fw-bold" for="check"
                                        id="checklabel"></label>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-success shadow-none">Update</a>
                                            </div>
                                            <div class="col-md-6 d-grid g-1">
                                                <a href="#"
                                                    class="btn btn-danger shadow-none">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php
        }
    }
    



}
?>









