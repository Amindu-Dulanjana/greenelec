<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $uemail = $_SESSION["u"]["email"];

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | Watchlist</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/G_logo.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid" style="background-color: #00d6d6;">
            <div class="row gy-2">

                <?php require "header.php"; ?>

                <div class="col-12 col-lg-11 ms-lg-5 col-md-12 border border-2 border-dark rounded mt-lg-5 mb-lg-5 bg-white pb-5">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                        </div>
                        <!-- <div class="col-12 col-lg-6">
                            <hr class="hrbreak1" />
                        </div> -->
                        <div class="col-12 border-bottom border-warning mb-4">
                            <div class="row">
                                <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Search in Watchlist..."/>
                                </div>
                                <div class="col-12 col-lg-2 d-grid mb-3">
                                    <button class="btn btn-primary fw-bold">Search</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <hr class="hrbreak1" />
                        </div> -->
                        <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end border-2 border-success">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                <a class="nav-link text-success fw-bold" href="cart.php">My Cart</a>
                            </nav>
                        </div>
                        <?php
                        $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $uemail . "' ;");
                        $wn = $watchlistrs->num_rows;

                        if ($wn <= 0) {
                        ?>
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyview"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 mb-3 fw-bolder">You have no items in your Watchlist.</label>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-9">
                                <div class="row g-2">
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
                                            <div class="card mb-3 mx-0 mx-lg-3 col-12">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php
                                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $prodid . "' ;");
                                                        $in = $imagers->num_rows;
                                                        $arr;
                                                        for ($x = 0; $x < $in; $x++) {
                                                            $ir = $imagers->fetch_assoc();
                                                            $arr[$x] = $ir["code"];
                                                        }

                                                        ?>
                                                        <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card-body">
                                                            <h3 class="card-title"><?php echo $pr["title"]; ?></h3>
                                                            <span class="fw-bold text-black-50">Colour : <?php echo $colurid ?></span>&nbsp; |
                                                            &nbsp;<span class="fw-bold text-black-50">Condition : <?php echo $conid ?></span><br />
                                                            <span class="fw-bold text-black-50 fs-5">Price : </span>&nbsp;
                                                            <span class="fw-bolder text-black fs-5">Rs.<?php echo $pr["price"]; ?> .00</span><br />
                                                            <span class="fw-bold text-black-50 fs-5">Seller : </span><br />
                                                            <span class="fw-bolder text-black fs-5"><?php echo $_SESSION['u']["fname"] . " " . $_SESSION["u"]["lname"]; ?></span><br />
                                                            <span class="fw-bolder text-black fs-5"><?php echo $uemail; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <div class="card-body d-grid">
                                                            <a href="<?php echo  "singleproductview.php?id=" .($wid); ?>" class="btn btn-success mb-2 fw-bold">Buy Now</a>
                                                            
                                                            <a class="btn btn-danger mb-2 fw-bold" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
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
        confirm("You have to sign in firstly");
        window.location = "index.php";
    </script>
<?php
}
?>