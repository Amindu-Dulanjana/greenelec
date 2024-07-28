<?php

session_start();
if (isset($_SESSION["u"])) {


    require "connection.php";

    if (isset($_GET["id"])) {

        $productid = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $productid . "'");
        $pn = $productrs->num_rows;

        if ($pn == 1) {
            $pd = $productrs->fetch_assoc();
?>
            <!DOCTYPE html>

            <html>

            <head>
                <title>eShop| Single Product View</title>

                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <link rel="icon" href="resources/G_logo.png">
                <link rel="stylesheet" href="bootstrap.css">
                <link rel="stylesheet" href="sellerproduct.css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
            </head>

            <body onload="">

                <div class="container-fluid">
                    <div class="row">
                        <?php require "header.php";
                        $user_emails = $_SESSION['u']['email'];
                        ?>

                        <div class="col-12 mt-0 singleproduct">
                            <div class="row">
                                <div class="bg-white border border-primary" style="padding: 11px;">
                                    <div class="row">

                                        <!-- 3 small images -->
                                        <div class="col-lg-2 order-lg-1 order-2">

                                            <ul>

                                                <?php
                                                $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $productid . "' ");
                                                $in = $imagers->num_rows;
                                                $img1;
                                                $d = $imagers->fetch_assoc();
                                                ?>

                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-success">
                                                    <img src="<?php echo $d["code"] ?>" height="150px" id="pimg<?php echo "1"; ?>" onclick="loadmainimg(<?php echo '1'; ?>);" class="mt-1 mb-1" />
                                                </li>
                                                <?php
                                                if ($d["code1"] == "resources//no_image.png") {
                                                ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-success">
                                                        <img src="resources\no_image.png" height="150px" class="mt-1 mb-1" />
                                                    </li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-success">
                                                        <img src="<?php echo $d["code1"] ?>" height="150px" id="pimg<?php echo "2"; ?>" onclick="loadmainimg(<?php echo '2'; ?>);" class="mt-1 mb-1" />
                                                    </li>
                                                <?php
                                                }
                                                if ($d["code2"] == "resources//no_image.png") {
                                                ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-success">
                                                        <img src="resources\no_image.png" height="150px" class="mt-1 mb-1" />
                                                    </li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-success">
                                                        <img src="<?php echo $d["code2"] ?>" height="150px" id="pimg<?php echo "3"; ?>" onclick="loadmainimg(<?php echo '3'; ?>);" class="mt-1 mb-1" />
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                            <div class="align-items-center border border-1 border-success p-3">
                                                <div id="mainimg" style="background-image: url('<?php echo $d["code"]; ?>'); background-repeat: no-repeat; background-size: contain; height: 420px;"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 order-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">

                                                        <!-- breadcrumb -->
                                                        <div class="col-12">
                                                            <nav>
                                                                <ol class="d-flex mb-0 flex-wrap mb-0 list-unstyled bg-white rounded">
                                                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                                    <li class="breadcrumb-item active"><a class="text-black-50 text-decoration-none" href="#">Single View</a></li>
                                                                </ol>
                                                            </nav>
                                                        </div>
                                                        <!-- breadcrumb -->

                                                        <!-- title -->
                                                        <div class="col-12">
                                                            <label class="form-label fs-4 fw-bold mt-0"><?php echo $pd["title"]; ?></label>
                                                        </div>
                                                        <!-- title -->

                                                        <!-- ratings -->
                                                        <div class="col-12 ">
                                                            <span class="badge badge-success">
                                                                <i class="fa fa-star mt-1 text-warning fs-6">r</i>
                                                                <label class="text-dark fs-6">4.5 Star </label>
                                                                <label class="text-dark fs-6">| 35 Ratings and 45 Reviews</label>
                                                            </span>
                                                        </div>
                                                        <!-- ratings -->

                                                        <!-- price -->
                                                        <div class="col-12 mb-3">
                                                            <label class="fw-bold mt-1 fs-4">Rs.<?php echo $pd["price"]; ?>.00</label>
                                                            <label class="fw-bold mt-1 fs-6 text-danger"><del>Rs.<?php
                                                                                                                    $a = $pd["price"];
                                                                                                                    $newval = ($a / 100) * 5;
                                                                                                                    $val = $a + $newval;
                                                                                                                    echo $val;
                                                                                                                    ?>.00</del></label>
                                                        </div>
                                                        <!-- price -->

                                                        <hr class="hrbreak">

                                                        <div class="col-12 mb-3">
                                                            <label class="text-primary fs-6"><b>Warranty: </b>06 Months Warranty</label><br>
                                                            <label class="text-primary fs-6"><b>Return Policy: </b>01 Month Return Policy</label><br>
                                                            <label class="text-primary fs-6"><b>In Stock: </b><?php echo $pd["qty"]; ?> items left</label>
                                                        </div>

                                                        <hr class="hrbreak">
                                                        <div class="col-12 mb-3">
                                                            <a class="btn btn-warning border border-1 border-primary" href="<?php echo "messages.php?email=" . ($user_emails) . "&id=" . ($productid) ?>">Message</a>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label class="text-dark fs-3">Seller Details</label><br>

                                                            <?php
                                                            $userrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $pd["user_email"] . "'");
                                                            $userd = $userrs->fetch_assoc();

                                                            ?>
                                                            <label class="text-success fs-6">Seller's name: <?php echo $userd["fname"] . " " . $userd["lname"]; ?></label><br>
                                                            <label class="text-success fs-6">Seller's email: <?php echo $userd["email"]; ?></label>
                                                        </div>

                                                        <hr class="hrbreak">

                                                        <!-- discount -->
                                                        <div class="col-12 mb-3">
                                                            <div class="row mt-1">
                                                                <div class="col-12 col-md-10 col-lg-8 rounded border border-1 border-primary mt-1">
                                                                    <div class="row">
                                                                        <div class="col-2 mt-1 mb-1">
                                                                            <img src="resources/singleview/pricetag.png">
                                                                        </div>
                                                                        <div class="mt-2 col-md-8 col-sm-10 col-lg-10">
                                                                            <label>Stand a chance to get instant 5% discount by using VISA.</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- discount -->

                                                        <hr class="hrbreak">

                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-md-6" style="margin-top: 15px;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-6">
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text">QTY :</span>
                                                                                <button class="btn btn-outline-secondary" type="button" onclick="qty_dec(<?php echo $pd['qty']; ?>);">-</button>
                                                                                <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" id="qtyinput" type="text" pattern="[0-9]*" value="1">
                                                                                <button class="btn btn-outline-secondary" type="button" onclick="qty_inc(<?php echo $pd['qty']; ?>);">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- buttons -->
                                                                <div class="col-12 mt-3">
                                                                    <div class="row">
                                                                        <div class="col-4 offset-2 offset-lg-0 col-lg-3 d-grid">
                                                                            <button class="btn btn-primary">Add to Cart</button>
                                                                        </div>
                                                                        <div class="col-4 col-lg-3 d-grid">
                                                                            <button class="btn btn-success" id="payhere-payment" type="submit" onclick="paynow(<?php echo $productid; ?>);">Buy Now</button>
                                                                        </div>
                                                                        <div class="col-2 col-lg-3 d-grid">
                                                                            <i class="fas fa-heart mt-1 fs-4 text-black-50"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- buttons -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 bg-white">
                                    <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                                        <div class="col-md-6">
                                            <span class="fs-3 fw-bold">Related Items</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- cards -->
                                <div class="col-12 bg-white">
                                    <div class="row">
                                        <div class="offset-1 col-10">
                                            <div class="row p-2 justify-content-center">
                                                <?php
                                                $number = 4;

                                                // $brandrs = Database::search("SELECT * FROM `product` WHERE `model_has_brand_id`='" . $pd["model_has_brand_id"] . "' ");
                                                // $bd = $brandrs->fetch_assoc();
                                                // $mhbid = $bd[""];

                                                $pmhbid = Database::search("SELECT * FROM `model_has_brand` WHERE `id`='" . $pd["model_has_brand_id"] . "' ");
                                                $mod = $pmhbid->fetch_assoc();
                                                $brandid = $mod["brand_id"];

                                                $mhbrs = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id`='" . $brandid . "' ");
                                                $mhbnr = $mhbrs->num_rows;

                                                for ($i = 0; $i < $mhbnr; $i++) {
                                                    $mhb = $mhbrs->fetch_assoc();
                                                    $mhbid = $mhb["id"];

                                                    $relatedrs = Database::search("SELECT * FROM `product` WHERE `model_has_brand_id`='" . $mhbid . "' AND `id` <> '" . $productid . "'");
                                                    $relatednr = $relatedrs->num_rows;

                                                    for ($x = 0; $x < $relatednr; $x++) {

                                                        $bd = $relatedrs->fetch_assoc();
                                                        $imageOfProduct = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $bd["id"] . "' ");
                                                        $imagerow = $imageOfProduct->fetch_assoc();

                                                ?>
                                                        <div class="card m-1" style="width: 18rem;">
                                                            <img src="<?php echo $imagerow["code"] ?>" class="card-img-top" style="width: 15rem; height:15rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $bd["title"] ?></h5>
                                                                <p class="card-text">Rs.<?php echo $bd["price"] ?>.00</p>
                                                                <a href="#" class="btn btn-primary fsm2">Add cart</a>
                                                                <a href="#" class="btn btn-success fsm2">Buy Now</a>
                                                                <a href="#" class="mt-2 fs-6"><i class="fas fa-heart mt-1 fs-4 text-black-50"></i></a>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }


                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cards -->


                                <div class="col-12 bg-white">
                                    <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                                        <div class="col-md-6">
                                            <span class="fs-3 fw-bold">Product Details</span>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                $mbdetailrs = Database::search("SELECT * FROM model_has_brand WHERE `id`='" . $pd["model_has_brand_id"] . "' ");
                                $mbn = $mbdetailrs->num_rows;
                                if ($mbn == 1) {

                                    $mbdetail = $mbdetailrs->fetch_assoc();

                                    $bname = Database::search("SELECT * FROM brand WHERE `id`='" . $mbdetail["brand_id"] . "' ");
                                    $brs = $bname->fetch_assoc();

                                    $mname = Database::search("SELECT * FROM model WHERE `id`='" . $mbdetail["model_id"] . "' ");
                                    $mrs = $mname->fetch_assoc();
                                } else {
                                }

                                ?>

                                <div class="col-12 bg-white">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="form-label fs-5 fw-bold">Brand</label>
                                                </div>
                                                <div class="col-10">
                                                    <label class="form-label fs-5 "><?php echo $brs["name"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <label class="form-label fs-5 fw-bold">Model</label>
                                                </div>
                                                <div class="col-10">
                                                    <label class="form-label fs-5 "><?php echo $mrs["name"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12 col-lg-2">
                                                    <label class="form-label fs-5 fw-bold">Description</label>
                                                </div>
                                                <div class="col-12 col-lg-10">
                                                    <textarea class="form-control" disabled id="" cols="60" rows="10"><?php echo $pd["description"] ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr />
                                <div class="col-12 bg-white">
                                    <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-success">
                                        <div class="col-md-6">
                                            <span class="fs-3 fw-bold">Feedbacks</span>
                                        </div>
                                        <!-- </div>
                                 </div> -->

                                        <div class="col-12 mb-3">
                                            <div class="row g-1">

                                                <?php
                                                $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $productid . "'");
                                                $feed = $feedbackrs->num_rows;

                                                if ($feed == 0) {
                                                ?>
                                                    <div class="col-12">
                                                        <label class="form-label fs-3 text-center text-black">There are no feedbacks to view.</label>
                                                    </div>
                                                    <?php
                                                } else {

                                                    for ($i = 0; $i < $feed; $i++) {

                                                        $feedrow = $feedbackrs->fetch_assoc();

                                                        $feeduserrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $feedrow["user_email"] . "'");
                                                        $feeduser = $feeduserrs->fetch_assoc();

                                                    ?>
                                                        <div class="col-12 col-lg-4 border border-1 border-success rounded">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fs-5 fw-bold text-success"><?php echo $feeduser["fname"] . " " . $feeduser["lname"]; ?></span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <span class="fs-5 text-dark"><?php echo $feedrow["feed"]; ?></span>
                                                                </div>
                                                                <div class="col-12 text-end">
                                                                    <span class="fs-6 text-black-50"><?php echo $feedrow["date"]; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php

                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php require "footer.php"; ?>
                    </div>
                </div>

                <script src="script.js"></script>
                <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
                <script src="bootstrap.bundle.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

            </body>


            </html>
    <?php

        }
    }
} else {
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>