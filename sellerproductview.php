<?php
session_start();

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];

    require "connection.php";

?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop| Seller Product View</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/G_logo.png" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>

    <body style="background-color: #E9EBEE;">

        <div class="container-fluid">
            <div class="row">

                <!-- head -->
                <div class="col-12 py-1 bg-primary">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 col-lg-2 mt-1 mb-1 me-3">
                                    <?php

                                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user["email"] . "'");
                                    $pn = $profileimg->num_rows;

                                    if ($pn == 1) {
                                        $pr = $profileimg->fetch_assoc();
                                    ?>
                                        <img class="rounded-circle" src="<?php echo $pr["code"]; ?>" width="90px">
                                    <?php
                                    } else {
                                    ?>
                                        <img class="rounded-circle" src="resources/demoProfileImg.jpg" width="90px">
                                    <?php
                                    }

                                    ?>

                                </div>

                                <div class="offset-lg-1 col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span class="fw-bold"><?php echo $user["fname"] . " " . $user["lname"]; ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-white"><?php echo $user["email"]; ?></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-8 mt-3">
                            <div class="row">
                                <div class="col-12 mt-5 mt-lg-3">
                                    <h1 class="text-white fw-bold offset-5 offset-lg-2">My Products</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- head -->

                <!-- product view -->
                <div class="col-12">
                    <div class="row justify-content-center">

                        <!-- sortings -->
                        <div class="col-12 col-lg-2 mx-3 mx-lg-3 my-3 rounded bg-white border border-primary">
                            <div class="row justify-content-center">
                                <div class="col-12 mt-3 ms-3 fs-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-3">Filters</label>
                                        </div>

                                        <div class="col-11">
                                            <div class="row">

                                                <div class="input-group flex-nowrap">
                                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="addon-wrapping" id="search">
                                                    <span class="input-group-text fs-5 bi bi-search" id="addon-wrapping" onclick="addFilters(1);"></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-5">Active Time:</label>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="late">
                                                <label class="form-check-label" for="late">
                                                    Latest to Oldest
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="old">
                                                <label class="form-check-label" for="old">
                                                    Oldest to Latest
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-5">Quantity:</label>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="low">
                                                <label class="form-check-label" for="low">
                                                    Low to High
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="high">
                                                <label class="form-check-label" for="high">
                                                    High to Low
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>

                                        <div class="col-12 ">
                                            <label class="form-label fw-bold fs-5">Condition:</label>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="new">
                                                <label class="form-check-label" for="new">
                                                    Brandnew
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="used">
                                                <label class="form-check-label" for="used">
                                                    Used
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-11  d-grid text-center mb-3 mt-3">
                                            <button class="btn btn-success mb-3" onclick="addFilters(1);">Search</button>
                                            <button class="btn btn-primary" onclick="clearFilters();">Clear Filters</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- sortings -->

                        <!-- product -->
                        <div class="col-12 col-lg-9 mt-3 mb-3 bg-white border border-primary rounded" id="filter_result">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row  justify-content-center">


                                                <?php
                                                if (isset($_GET["page"])) {
                                                    $pageno = $_GET["page"];
                                                } else {
                                                    $pageno = 1;
                                                }
                                                $products = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
                                                $d = $products->num_rows;
                                                $row = $products->fetch_assoc();

                                                $results_per_page = 6;

                                                $num_of_pages = ceil($d / $results_per_page);

                                                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                                $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");

                                                $srn = $selectedrs->num_rows;

                                                while ($srow = $selectedrs->fetch_assoc()) {

                                                ?>

                                                    <!-- card start -->
                                                    <div class="card mb-3 col-12 col-lg-5  mt-3 mx-lg-3">
                                                        <div class="row g-0">

                                                            <?php
                                                            $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "'");
                                                            $pir = $pimgrs->fetch_assoc();

                                                            ?>
                                                            <div class="col-md-4 mt-2">
                                                                <img src="<?php echo $pir["code"]; ?>" class="img-fluid rounded-start">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
                                                                    <span class="card-text fw-bold text-primary">Rs.<?php echo $srow["price"]; ?>.00</span>
                                                                    <br>
                                                                    <span class="card-text fw-bold text-success"><?php echo $srow["qty"]; ?> Items left</span>
                                                                    <!-- switch        -->
                                                                    <div class="form-check form-switch" >
                                                                        <input class="form-check-input shadow-none" type="checkbox" role="switch" id="check" onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                                                                                                                                                                    if ($srow["status_id"] == 2) {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                    } ?> />
                                                                        <label class="form-check-label text-info fw-bold" for="check" id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                                                                                                                                if ($srow["status_id"] == 2) {

                                                                                                                                                                                    echo "Make Your Product Active";
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo "Make Your Product Deactive";
                                                                                                                                                                                }
                                                                                                                                                                                ?></label>
                                                                    </div>
                                                                    <!-- swich close -->
                                                                    
                                                                    <div class="col-12">
                                                                        <div class="row mt-3">
                                                                            <div class="col-12 col-lg-6">
                                                                                <a href="#" class="btn btn-success d-grid" onclick="sendID(<?php echo $srow['id']; ?>);">Update</a>
                                                                            </div>
                                                                            <div class="col-12 col-lg-6 mt-2 mt-lg-0 d-grid">
                                                                                <a href="#" class="btn btn-danger" onclick="deleteModal(<?php echo $srow['id']; ?>);">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- card end -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal<?php echo $srow['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Warning!</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Are you sure you want to delete this product?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                    <button type="button" class="btn btn-primary btn-danger" onclick="deleteProduct(<?php echo $srow['id']; ?>);">Yes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->

                                                <?php
                                                }

                                                ?>

                                            </div>
                                        </div>

                                        <!-- pagination -->
                                        <div class="col-12 mb-3 d-grid justify-content-center">
                                            <div class="pagination">
                                                <a href="<?php

                                                            if ($pageno <= 1) {
                                                                echo "";
                                                            } else {
                                                                echo "?page=" . ($pageno - 1);
                                                            }


                                                            ?>">&laquo;</a>


                                                <?php

                                                for ($page = 1; $page  <= $num_of_pages; $page++) {
                                                    if ($page == $pageno) {
                                                ?>
                                                        <a href="<?php echo "?page=" . ($page); ?>" class="active m-1"><?php echo $page; ?></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="<?php echo "?page=" . ($page); ?>" class="m-1"><?php echo $page; ?></a>
                                                <?php
                                                    }
                                                }

                                                ?>
                                                <a href="<?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo "";
                                                            } else {
                                                                echo "?page=" . ($pageno + 1);
                                                            }

                                                            ?>">&raquo;</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product -->
                    </div>
                </div>
                <!-- product view -->

                <!-- footer -->
                <?php
                require "footer.php";
                ?>
                <!-- footer -->
            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        confirm("You have to sign in or sign up first");
        window.location = "index.php";
    </script>
<?php
}
?>