<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>eShop Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->
            <hr class="hrbreak1" />
            <!-- search bar -->
            <div class="col-12 justify-content-center">
                <div class="row mb-3">
                    <div class="offset-lg-1 col-12 col-lg-1 logoimg"></div>
                    <div class="col-8 col-lg-6">
                        <div class="input-group input-group-lg mt-3 mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="search">

                            <select class="btn btn-outline-primary" id="basic_search_select">
                                <option value="0">Category</option>
                                <?php
                                require "connection.php";
                                $rs = Database::search("SELECT * FROM `category`");
                                $n = $rs->num_rows;
                                for ($i = 1; $i <= $n; $i++) {
                                    $category = $rs->fetch_assoc();
                                ?>
                                    <option class="dropdown-item" value=<?php echo $category["id"]; ?>><?php echo $category["name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-2 d-grid gap-2">
                        <button class="btn btn-primary mt-3 searchbtn" onclick="basicSearch();">Search</button>
                    </div>
                    <div class="col-2 mt-4">
                        <a class="link-secondary link1" href="advancedSearch.php">Advanced</a>
                    </div>
                </div>
            </div>
            <!-- search bar -->
            <hr class="hrbreak1" />
            <!-- slide -->
            <div class="col-12 d-none d-lg-block" id="slider">
                <div class="row">
                    <div id="carouselExampleCaptions" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="new resources/slider images/posterimg.jpg" class="d-block posterimg1">
                                <div class="carousel-caption d-none d-md-block postercaption">
                                    <h5 class="postertitle">Welcome to eShop</h5>
                                    <p class="postertxt">The World Best Online Store By One Click.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/posterimg2.jpg" class="d-block posterimg1">
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/posterimg3.jpg" class="d-block posterimg1">
                                <div class="carousel-caption d-none d-md-block postercaption1">
                                    <h5 class="postertitle">Be Free.....</h5>
                                    <p class="postertxt">Experience the lowest Delivery Costs With Us.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- slide -->
            <div class="col-12" id="view"></div>
            <?php
            $rs = Database::search("SELECT * FROM category;");
            $n = $rs->num_rows;
            for ($x = 0; $x < $n; $x++) {
                $c = $rs->fetch_assoc();
            ?>

                <div class="col-12 mt-3">
                    <a class="link-dark link2"><?php echo $c["name"]; ?></a>&nbsp;&nbsp;
                    <a class="link-dark link3">See All &rightarrow;</a>
                </div>

                <?php
                $resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c["id"] . "' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                ?>
                <!-- product view -->
                <div class="col-12" id="pshow">
                    <div class="row border border-primary">
                        <div class="col-10 offset-1">
                            <div class="row" id="pdetails">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-5">
                    <div class="row border border-primary">
                        <div class="col-12 col-lg-12">
                            <div class="row justify-content-center">
                                <?php
                                $nr = $resultset->num_rows;
                                for ($y = 0; $y < $nr; $y++) {
                                    $prod = $resultset->fetch_assoc();

                                    $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prod["id"] . "'");
                                    $imgrow = $pimage->fetch_assoc();
                                ?>
                                    <!-- card -->
                                    <div class="card col-6 col-lg-2 mt-1 mb-1 ms-1" style="width: 18.5rem;">
                                        <img src="<?php echo $imgrow["code"]; ?>" class="cardTopImg" />
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
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- product view -->
            <!-- footer -->
            <?php require "footer.php"; ?>
            <!-- footer -->
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>