<?php
session_start();

if (isset($_GET['id'])) {


    $pid = $_GET["id"];

    require "connection.php";

    $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $pid . "'  ;");
    $pn = $productrs->num_rows;

    if ($pn == 1) {
        $pd = $productrs->fetch_assoc();




?>
        <!DOCTYPE html>
        <html>

        <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="icon" href="resources/logo.svg">

            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
            <link rel="stylesheet" href="style.css">

            <title>eShop | Product View</title>

        </head>

        <body>


            <div class="container-fluid">
                <div class="row">

                    <!-- header -->
                    <?php
                    require "header.php";
                    $user_emails = $_SESSION['u']['email'];
                    ?>
                    <!-- header -->

                    <div class="col-12 mt-3 singleproduct">
                        <div class="row">
                            <div class="bg-white" style="padding: 11px;">
                                <div class="row">

                                    <div class="col-lg-2 order-lg-1 order-2">
                                        <ul>

                                            <?php
                                            $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id`= '" . $pid . "' ;");
                                            $in = $imagesrs->num_rows;

                                            $img1;
                                            if (!empty($in)) {
                                                for ($x = 0; $x < $in; $x++) {
                                                    $d = $imagesrs->fetch_assoc();

                                                    $img1 = $d["code"];
                                            ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <img src="<?php echo $d["code"] ?>" onclick="loadmainimage(<?php echo $x; ?>);" height="150px" id="pimg">
                                                    </li>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <img src="<?php echo $d["code1"] ?>" onclick="loadmainimage(<?php echo $x; ?>);" height="150px" id="pimg">
                                                    </li>
                                                    <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                        <img src="<?php echo $d["code2"] ?>" onclick="loadmainimage(<?php echo $x; ?>); " height="150px " id="pimg">
                                                    </li>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/singleview/camera.png" height="150px">
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/singleview/camera.png" height="150px">
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary">
                                                    <img src="resources/singleview/camera.png" height="150px">
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 order-2 order-lg-2 d-none d-lg-block">
                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary p-3">
                                            <img src="<?php echo $img1; ?>" id="mainimg" height="418px">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 order-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <nav>
                                                            <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white rounded">
                                                                <li class="breadcrumb-item"><a class="" href="home.php">Home</a></li>
                                                                <li class="breadcrumb-item active">
                                                                    <a class="text-decoration-none text-black-50" href="#">Single View</a>
                                                                </li>
                                                            </ol>
                                                        </nav>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label fs-4 fw-bold mt-0"><?php echo $pd["title"] ?></label>
                                                    </div>

                                                    <div class="col-12 mt-1">
                                                        <span class="text-black-50 fs-6 ps-5">
                                                            <i class="fa fa-star mt-1 text-warning"></i> 4.5 Star & 45 Ratings
                                                        </span>
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label fs-4 fw-bold mt-3">Rs. <?php echo $pd["price"]; ?>. 00</label>
                                                        <label class="form-label fs-6 fw-bold text-danger ps-2"><del>Rs.<?php $a = $pd["price"];
                                                                                                                        $newval = ($a / 100) * 5;
                                                                                                                        $val = $a + $newval;
                                                                                                                        echo $val;       ?>.00</del></label>
                                                    </div>

                                                    <hr class="hrbreak1">

                                                    <div class="col-12 mb-3">
                                                        <label class="text-primary fs-6"><b>Warranty : </b>06 months warranty</label><br>
                                                        <label class="text-primary fs-6"><b>Return Policy : </b>01 month return policy</label><br>
                                                        <label class="text-primary fs-6"><b>In Stock : </b><?php echo $pd["qty"]; ?> Items Left</label>
                                                    </div>

                                                    <hr class="hrbreak1">

                                                    <div class="col-12 mb-3">
                                                        <a class="btn btn-warning border border-1 border-primary" href="<?php echo "messages.php?email=" . ($user_emails) . "&id=" . ($pid) ?>">Message</a>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <label class="text-dark fs-5 fw-bold">Seller Details</label><br>
                                                        <?php
                                                        $userrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $pd["user_email"] . "' ;");
                                                        $userd = $userrs->fetch_assoc();
                                                        ?>
                                                        <label class="text-success fs-6"><?php echo  $userd["fname"] . " " . $userd["lname"] ?></label><br>
                                                        <label class="text-success fs-6"><?php echo  $userd["email"];  ?></label><br>
                                                        <label class="text-success fs-6"><?php echo  $userd["mobile"];  ?></label>
                                                    </div>

                                                    <hr class="hrbreak1">

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="border border-success border-1 col-11 m-2 col-md-6 rounded ms-md-2">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <img src="resources/singleview/pricetag.png">
                                                                    </div>
                                                                    <div class="col-10">
                                                                        <label class="text-start text-black-50">Stand a chance to get instant 5% discount by using VISA</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="row mt-3 mb-3">
                                                            <div class="col-mb-6">
                                                                <label class="fs-6 mt-1">Colour Options : </label><br>
                                                                <button class="btn btn-sm btn-primary">Black</button>
                                                                <button class="btn btn-sm btn-primary">Gold</button>
                                                                <button class="btn btn-sm btn-primary">Blue</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="hrbreak1">

                                                    <div class="col-12">
                                                        <div class="row mt-2 mb-3">
                                                            <div class="col-md-6">
                                                                <div class="row">


                                                                    <div class="border border-1 border-secondary rounded overflow-hidden float-start position-relative product_qty">
                                                                        <span class="mt-2">QTY :</span>
                                                                        <input id="qtyinput" class="border-0 fs-6 fw-bold test-start mt-2" type="number" min="1" pattern="[0-9]*" value="1">
                                                                        <div class="position-absolute qty-buttons">
                                                                            <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                                <i class="fas fa-chevron-up" onclick="qty_inc();"></i>
                                                                            </div>
                                                                            <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                                <i class="fas fa-chevron-down" onclick="qty_dec();"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-10 col-md-5">
                                                                        <div class="row">
                                                                            <div class="col-6 d-grid">
                                                                                <button class="btn btn-primary">Add to cart</button>
                                                                            </div>
                                                                            <div class="col-6 d-grid">
                                                                                <button class="btn btn-success" id="payhere-payment" type="submit" onclick="">Buy now</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 mt-2">
                                                                        <i class="fa fa-heart fs-5 bg-light text-black-50 rounded"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row p-2">

                                            <?php

                                            $brandrs = Database::search("SELECT * FROM `model_has_brand` WHERE `id`= '" . $pd["model_has_brand_id"] . "' ;");
                                            $bd = $brandrs->fetch_assoc();

                                            $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $bd["brand_id"] . "' ;");

                                            ?>

                                            <div class="card me-1" style="width: 18rem;">
                                                <img src="new resources/mobile images/htc_u.jpg" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">Apple iPhone 12</h5>
                                                    <p class="card-text">Rs.100,000.00</p>
                                                    <a href="#"><i class="fa fa-heart text-black-50"></i></a><br>
                                                    <a href="#" class="btn btn-primary mt-2">Add to cart</a>
                                                    <a href="#" class="btn btn-success mt-2">Buy now</a>

                                                </div>
                                            </div>
                                            <div class="card me-1" style="width: 18rem;">
                                                <img src="new resources/mobile images/htc_u.jpg" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">Apple iPhone 12</h5>
                                                    <p class="card-text">Rs.100,000.00</p>
                                                    <a href="#"><i class="fa fa-heart text-black-50"></i></a></br>
                                                    <a href="#" class="btn btn-primary mt-2">Add to cart</a>
                                                    <a href="#" class="btn btn-success mt-2">Buy now</a>

                                                </div>
                                            </div>
                                            <div class="card me-1" style="width: 18rem;">
                                                <img src="new resources/mobile images/htc_u.jpg" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">Apple iPhone 12</h5>
                                                    <p class="card-text">Rs.100,000.00</p>
                                                    <a href="#"><i class="fa fa-heart text-black-50"></i></a><br>
                                                    <a href="#" class="btn btn-primary mt-2">Add to cart</a>
                                                    <a href="#" class="btn btn-success mt-2">Buy now</a>

                                                </div>
                                            </div>
                                            <div class="card me-1" style="width: 18rem;">
                                                <img src="new resources/mobile images/htc_u.jpg" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">Apple iPhone 12</h5>
                                                    <p class="card-text">Rs.100,000.00</p>
                                                    <a href="#"><i class="fa fa-heart text-black-50"></i></a><br>
                                                    <a href="#" class="btn btn-primary mt-2">Add to cart</a>
                                                    <a href="#" class="btn btn-success mt-2">Buy now</a>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Product Details</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-6 fw-bold">Brand</label>
                                            </div>
                                            <div class="col-10">
                                                <label class="form-label">Apple</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-6 fw-bold">Model</label>
                                            </div>
                                            <div class="col-10">
                                                <label class="form-label">iPhone 12</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <label class="form-label fs-6 fw-bold">Description</label>
                                            </div>
                                            <div class="col-10">
                                                <textarea class="form-control shadow-none" id="" rows="10" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 bg-white">
                        <div class="row d-block me-0 ms-0 mt-4 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-primary">
                            <div class="col-12">
                                <span class="fs-3 fw-bold">Feedbacks...</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row g-1">
                            <?php

                            $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                            $feed = $feedbackrs->num_rows;

                            if ($feed == 0) {
                            ?>
                                <div class="col-12">
                                    <label class="form-label fs-3 text-center text-black-50">There are no feedbacks to view.</label>
                                </div>
                                <?php
                            } else {
                                for ($a = 0; $a < $feed; $a++) {
                                    $feedrow = $feedbackrs->fetch_assoc();
                                ?>
                                    <div class="col-12 col-lg-4 border border-2 border-danger rounded">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fs-5 fw-bold text-primary">Amindu</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="fs-5 text-dark">Quality Product. Thankyou For your service.</span>
                                            </div>
                                            <div class="col-12 text-end">
                                                <span class="fs-6 text-black-50">2021-10-19 22:33:54</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- footer -->
                    <?php
                    require "footer.php";
                    ?>
                    <!-- footer -->


                </div>
            </div>





            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="script.js"></script>
            <script src="bootstrap.bundle.js"></script>
        </body>

        </html>
<?php
    }
}
?>