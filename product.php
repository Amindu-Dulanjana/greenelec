<?php
session_start();
require "connection.php";
$c = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Greenelec Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/G_logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "header.php"; ?>
            <hr class="hrbreak1" />
            <div class="col-12 text-center ">
                <div class="row">
                    <div class="col-12 col-lg-10 bg-success">
                        <?php
                        $cat = Database::search("SELECT * FROM `category` WHERE `id`='" . $c . "'");
                        $cr = $cat->fetch_assoc();
                        ?>

                        <h1 class="text-white"><?php echo $cr["name"]; ?></h1>
                        
                    </div>
                    <div class="col-12 col-lg-2 p-2"><a class="btn btn-primary fw-bold" href="allproducts.php">All Products</a></div>
                </div>
            </div>
            <hr class="hrbreak1" />
            <div class="col-12">
                <div class="row justify-content-center">
                    <?php
                    $resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c . "';");
                    $nr = $resultset->num_rows;
                    for ($y = 0; $y < $nr; $y++) {
                        $prod = $resultset->fetch_assoc();

                        $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prod["id"] . "'");
                        $imgrow = $pimage->fetch_assoc();
                    ?>
                        <!-- card -->
                        <div class="card col-6 col-lg-2 mt-1 mb-3 ms-1" style="width: 18.5rem;">
                            <img src="<?php echo $imgrow["code"]; ?>" class="cardTopImg" />
                            <hr />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $prod["title"]; ?> <span class="badge bg-info">New</span></h5>
                                <span class="card-text text-primary">Rs. <?php echo $prod["price"]; ?> .00</span><br />
                                <?php
                                if ((int)$prod["qty"] > 0) {
                                ?>
                                    <span class="card-text text-warning"><b>In Stock</b></span>
                                    <input type="number" value="1" class="form-control mb-1" min="0" id="qtytxt<?php echo $prod['id']; ?>" />
                                    <a href="<?php echo  "singleproductview.php?id=" . ($prod['id']); ?>" class="btn btn-success">Buy Now</a>
                                    <a class="btn btn-danger" onclick="addToCart(<?php echo $prod['id']; ?>);">Add Cart</a>
                                    <a class="btn btn-secondary" onclick="addToWatchlist(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill fs-6"></i></a>
                                <?php
                                } else {
                                ?>
                                    <span class="card-text text-danger"><b>Out of Stock</b></span>
                                    <input type="number" value="1" class="form-control mb-1" min="0" disabled />
                                    <a class="btn btn-success" disabled>Buy Now</a>
                                    <a href="#" class="btn btn-danger" disabled>Add Cart</a>
                                    <a class="btn btn-secondary" disabled><i class="bi bi-heart-fill fs-6"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- card -->
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php require "footer.php"; ?>
        </div>
    </div>
</body>

</html>