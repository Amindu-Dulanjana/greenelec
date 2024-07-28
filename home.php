<?php
session_start();
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
       
            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->

            <!-- search bar -->
            <div class="col-12 justify-content-center border-bottom border-2 border-warning bg-light mb-3">
                <div class="row mb-1">
                    <div class="col-12 col-lg-2 text-center"><h1 class="text-success fw-bold mt-lg-2"></h1></div>
                    <!-- <div class="offset-lg-1 col-12 col-lg-1 logoimg"></div> -->
                    <div class="col-8 col-lg-6">
                        <div class="input-group input-group-lg mt-3 mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">

                            <select class="btn btn-outline-success" id="basic_search_select">
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
                        <button class="btn btn-success mt-3 searchbtn" onclick="basicSearch(1);">Search</button>
                    </div>
                    <div class="col-2 mt-4">
                        <a class="link-dark link1" href="advancedSearch.php">Advanced</a>
                    </div>
                </div>
            </div>
            <!-- search bar -->
            <!-- <hr class="hrbreak1" /> -->
            <!-- slide -->
            <div class="col-12 d-none d-lg-block border-bottom border-2 border-warning" id="imgslide">
                <div class="row mb-3">
                    <div id="carouselExampleCaptions" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="new resources/slider images/business-layout-full-page-3778.jpg" class="d-block posterimg1">
                                <div class="carousel-caption d-none d-md-block postercaption">
                                    <h5 class="postertitle">Welcome to Greenelec</h5>
                                    <p class="postertxt">The World Best Online Store By One Click.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/Top-5-Best-Mobile-Phones-Under-12000-Budget-Best-768x432.jpg" class="d-block posterimg1">
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/Preview-Galaxy-A30-Galaxy-A50-flashfly-800x417.jpg" class="d-block posterimg1">
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/Rb00d7967275020b1ee257b67db03de92.jpg" class="d-block posterimg1">
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/R (5).jpg" class="d-block posterimg1">
                            </div>
                            <div class="carousel-item">
                                <img src="new resources/slider images/R.jpg" class="d-block posterimg1">
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
            <div id="basicresult"></div>
            <?php
            $rs = Database::search("SELECT * FROM category;");
            $n = $rs->num_rows;
            for ($x = 0; $x < $n; $x++) {
                $c = $rs->fetch_assoc();
            ?>

                <div class="col-12 mt-3">
                    <a class="link-dark link2" href="<?php echo "product.php?id=".($c['id']);?>"><?php echo $c["name"]; ?></a>&nbsp;&nbsp;
                    <a class="link-dark link3" href="<?php echo "product.php?id=".($c['id']);?>">See All &rightarrow;</a>
                </div>

                <?php
                $resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c["id"] . "' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
                ?>
               

                <div class="col-12 mb-5">
                    <div class="row border border-success">
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
                                        <hr/>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $prod["title"]; ?> <span class="badge" style="background-color: orange;">New</span></h5>
                                            <span class="card-text text-primary">Rs. <?php echo $prod["price"]; ?> .00</span><br />
                                            <?php
                                            if ((int)$prod["qty"] > 0) {
                                            ?>
                                                <span class="card-text text-warning"><b>In Stock</b></span>
                                                <input type="number" value="1" class="form-control mb-1" min="0" id="qtytxt<?php echo $prod['id']; ?>" />
                                                <a href="<?php echo  "singleproductview.php?id=" .($prod['id']); ?>" class="btn btn-success">Buy Now</a>
                                                <a class="btn btn-primary" onclick="addToCart(<?php echo $prod['id']; ?>);">Add Cart</a>
                                                <a class="btn btn-secondary" onclick="addToWatchlist(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill fs-6"></i></a>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="card-text text-danger"><b>Out of Stock</b></span>
                                                <input type="number" value="1" class="form-control mb-1" min="0" disabled />
                                                <a class="btn btn-dark" disabled>Buy Now</a>
                                                <a href="#" class="btn btn-dark" disabled>Add Cart</a>
                                                <a class="btn btn-dark" disabled><i class="bi bi-heart-fill fs-6"></i></a>
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