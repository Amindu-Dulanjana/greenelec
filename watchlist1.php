<?php
session_start();
require "connection.php";
if (isset($_SESSION['u'])) {
    $uemail = $_SESSION['u']["email"];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | Watch List</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <?php require "header.php";



                ?>

                <div class="col-12 border border-1 border-secondary rounded">
                    <div class="row">

                        <!-- topic start -->
                        <div class="col-12">
                            <label class="form-label  fs-1 fw-bolder">Watchlist &heartsuit;</label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr class="hrbreak1" />
                        </div>
                        <!-- topic close -->

                        <div class="col-12">
                            <div class="row">

                                <!-- Search and button start -->

                                <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Watchlist" />
                                </div>
                                <div class="col-12 col-lg-2 d-grid mb-3">
                                    <button class="btn btn-outline-primary">Search</button>
                                </div>
                                <div class="col-12 ">
                                    <hr class="hrbreak1" />
                                </div>

                                <!-- Search and button close -->
                                <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end border-2 border-primary">

                                    <!-- breadcrumb and  title -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link" href="#">My Cart</a>
                                        <a class="nav-link" href="#">Recently Viewed</a>
                                    </nav>
                                </div>

                                <?php
                                $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $uemail . "' ;");
                                $wn = $watchlistrs->num_rows;


                                if ($wn <= 0) {


                                ?>


                                    <!-- without items  start-->

                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyview"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 mb-3 fw-bolder">You have no items in your
                                                    Watchlist</label>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                } else { ?>
                                    <div class="col-12 col-lg-9">
                                        <div class="row g-2"></div>
                                        <?php
                                        for ($i = 0; $i < $wn; $i++) {
                                            $wr = $watchlistrs->fetch_assoc();
                                            $wid =  $wr["product_id"];

                                            $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $wid . "'  ;");
                                            $pn = $productrs->num_rows;
                                            $colurid;
                                            $conid;
                                            if ($pn == 1) {
                                                $pr = $productrs->fetch_assoc();

                                                $prodid = $pr["id"];

                                                if ($pr["condition_id"] == 1) {
                                                    $conid = "Brand New";
                                                } else if ($pr["condition_id"] == 2) {
                                                    $conid = "Used";
                                                }

                                                if ($pr["color_id"] == 1) {
                                                    $colurid = "Gold";
                                                } else if ($pr["color_id"] == 2) {
                                                    $colurid = "Silver";
                                                } else if ($pr["color_id"] == 3) {
                                                    $colurid = "Graphite";
                                                } else if ($pr["color_id"] == 4) {
                                                    $colurid = "Pacific Blue";
                                                } else if ($pr["color_id"] == 5) {
                                                    $colurid = "Jet Black";
                                                } else if ($pr["color_id"] == 6) {
                                                    $colurid = "Rose Gold";
                                                }
                                        ?>
                                                <!-- without items  close -->

                                                <!--items card start-->

                                                <!-- card -->

                                                <div class="card mb-3 mx-3 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <?php
                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $prodid . "' ;");
                                                            $in = $imagers->num_rows;
                                                            $arr;
                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $imagers->fetch_assoc();
                                                                $arr[$x] = $ir["code"];

                                                                // $arr = $ir["code"];

                                                            }

                                                            ?>
                                                            <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h3 class="card-title"><?php echo $pr["title"]; ?> </h3>
                                                                <span class="fw-bold text-black-50">Colour :
                                                                    <?php echo $colurid ?></span>
                                                                &nbsp; | &nbsp; <span class="fw-bold text-black-50">Condition :
                                                                    <?php echo $conid ?></span>
                                                                <br />
                                                                <span class="fw-bold text-black-50 fs-5">Price : </span> &nbsp;
                                                                <span class="fw-bold text-black fs-5">Rs.<?php echo $pr["price"]; ?>. 00
                                                                </span>
                                                                <br />
                                                                <span class="fw-bold text-black-50 fs-5">Seller : </span>
                                                                <br />
                                                                <span class="fw-bold text-black fs-5"><?php echo $_SESSION['u']["fname"] . " " . $_SESSION["u"]["lname"]; ?>
                                                                </span>
                                                                <br />
                                                                <span class="fw-bold text-black fs-5"><?php echo $uemail ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-4 ">
                                                            <div class="card-body d-grid">
                                                                <a href="#" class="btn btn-outline-success fw-bold mb-2">Buy Now</a>
                                                                <a href="#" class="btn btn-outline-warning fw-bold mb-2">Add
                                                                    Cart</a>
                                                                <a class="btn btn-outline-danger fw-bold mb-2" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <!--items card close-->
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>


                <?php require "footer.php"; ?>
            </div>
        </div>


        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
?>
    <script>
        window.location = "index.php"
    </script>
<?php
}
?>