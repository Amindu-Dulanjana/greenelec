<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $u = $_SESSION["u"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/logo.svg">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <title>eShop | Sellers Product View</title>

</head>

<body style="background-color: #E9EBEE;">

    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <div class="col-12 bg-primary">
                <div class="row">

                    <div class="col-4">
                        <div class="row">

                            <div class="col-12 col-md-3 mt-2 mb-1">

                                <?php

                                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $u["email"] . "' ");
                                    $pin = $profileimg->num_rows;

                                    if ($pin == 1) {
                                        $pr = $profileimg->fetch_assoc();

                                    ?>
                                <img class="rounded-circle" height="60px" width="60px" src="<?php echo $pr["code"]; ?>">
                                <?php

                                    } else {
                                    ?>
                                <img class="rounded-circle" height="60px" width="60px"
                                    src="resources/demoProfileImg.jpg">
                                <?php
                                    }


                                    ?>


                            </div>

                            <div class="col-12 col-md-9">
                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <span class="fw-bold"><?php echo $u["fname"]; ?></span>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-white"><?php echo $u["email"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="row">
                            <div class="col-12 offset-0 offset-md-2 col-md-10 mt-5 mt-md-0">
                                <h2 class="fw-bold text-white mt-md-3">My Products</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- header -->

            <div class="col-12">
                <div class="row">

                    <!-- sortings -->

                    <div class="col-lg-2 my-3 rounded bg-body border border-primary">
                        <div class="row">
                            <div class="col-12 mt-3 fs-5">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label">Filters</label>
                                    </div>

                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="text" class="form-control shadow-none" id="s"
                                                    placeholder="Search...">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label fs-3 bi bi-search"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold">Active Time</label>
                                    </div>
                                    <div class="col-12">
                                        <hr width="80%">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault1" id="n">
                                            <label class="form-check-label fs-6" for="n">
                                                Newer To Oldest
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault1" id="o">
                                            <label class="form-check-label fs-6" for="o">
                                                Oldest To Newer
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-bold">By Quantity</label>
                                    </div>

                                    <div class="col-12">
                                        <hr width="80%">
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault2" id="l">
                                            <label class="form-check-label fs-6" for="l">
                                                Low To High
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault2" id="h">
                                            <label class="form-check-label fs-6" for="h">
                                                High To Low
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label class="form-label fw-bold">By Condition</label>
                                    </div>

                                    <div class="col-12">
                                        <hr width="80%">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault3" id="b">
                                            <label class="form-check-label fs-6" for="b">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input fs-6 mt-2 shadow-none" type="radio"
                                                name="flexRadioDefault3" id="u">
                                            <label class="form-check-label fs-6" for="u">
                                                Used
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-success fw-bold mb-3 bi bi-search"
                                                    onclick="addFilters();"> Search</button>
                                                <button class="btn btn-primary" onclick="clearfilter();"> Clear Filter</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- sortings close -->

                    <!-- product -->


                    <div class="col-lg-9 col-12 ms-lg-5 mt-3 mb-3 bg-white">
                        <div class=" row">


                        <div class="col-10 offset-1 text-center mt-4">
                            <div class="row" id="pimage">
                                <div class="row" id="pview">


                                    <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $products = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $u["email"] . "' ");
                                        $d = $products->num_rows;

                                        $row = $products->fetch_assoc();

                                        $results_per_page = 6;

                                        $number_of_pages = ceil($d / $results_per_page);




                                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $u["email"] . "' 
                                        LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");

                                        $srn = $selectedrs->num_rows;

                                        while ($srow = $selectedrs->fetch_assoc()) {


                                        ?>



                                    <!-- card 1 -->

                                    <div class="card mb-3 col-12 col-lg-5 ms-lg-5 mt-3 " style="max-width: 540px;">
                                        <div class="row g-0">

                                            <?php

                                                    $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "' ");
                                                    $pir = $pimgrs->fetch_assoc();

                                                    ?>

                                            <div class="col-md-4 mt-4">
                                                <img src="<?php echo $pir["code"]; ?>" class="img-fluid d-grid  "
                                                    style="width:90%">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
                                                    <span
                                                        class="text-primary fw-bold">Rs.<?php echo $srow["price"]; ?></span><br>
                                                    <span class="text-success fw-bold"><?php echo $srow["qty"]; ?> Items
                                                        Left</span><br>

                                                    <!-- switch        -->
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input shadow-none" type="checkbox"
                                                            role="switch" id="check"
                                                            onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php
                                                                                                                if ($srow["status_id"] == 2) {
                                                                                                                ?>checked<?php
                                                                                                                } ?> />
                                                        <label class="form-check-label text-info fw-bold" for="check"
                                                            id="checklabel<?php echo $srow['id']; ?>"><?php
                                                                                                                    if ($srow["status_id"] == 2) {

                                                                                                                    echo "Make Your Product Active";
                                                                                                                    } else {
                                                                                                                    echo "Make Your Product Deactive";
                                                                                                                    }
                                                                                                                    ?></label>
                                                    </div>
                                                    <!-- swich close -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-md-6 d-grid g-1">
                                                                    <a href="#" class="btn btn-success shadow-none"
                                                                        onclick="sendId(<?php echo $srow['id']; ?>);">
                                                                        Update</a>
                                                                </div>
                                                                <div class="col-md-6 d-grid g-1">
                                                                    <a href="#" class="btn btn-danger shadow-none"
                                                                        onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModel<?php echo $srow['id']; ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bolder text-warning"
                                                        id="exampleModalLabel">Warning...</h5>
                                                    <button type="button" class="btn-close shadow-none"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are You Sure You Want To Delete This Product?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success shadow-none"
                                                        data-bs-dismiss="modal">No</button>
                                                    <button type="button" class="btn btn-danger shadow-none"
                                                        onclick="deleteProduct(<?php echo $srow['id']; ?>)">Yes</button>
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

                        </div>

                        <!-- pagination -->
                        <div class="col-12 mt-3 mb-3">
                            <div class="row">

                                <div class="text-center">
                                    <div class="pagination">
                                        <a href="<?php

                                                            if ($pageno <= 1) {
                                                                echo "";
                                                            } else {
                                                                echo "?page=" . ($pageno - 1);
                                                            }

                                                            ?>">&laquo;</a>

                                        <?php

                                                for ($page = 1; $page <= $number_of_pages; $page++) {
                                                    if ($page == $pageno) {
                                                ?>
                                        <a class="ms-1 active"
                                            href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                        <?php
                                                    } else {
                                                    ?>
                                        <a class="ms-1"
                                            href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                        <?php
                                                    }
                                                }

                                                ?>

                                        <a href="<?php

                                                            

                                                            if ($pageno >= $number_of_pages) {
                                                                echo "";
                                                            } else {
                                                                echo "?page=" . ($pageno + 1);
                                                            }


                                                            ?>">&raquo;</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- pagination  close-->

                    </div>
                </div>

                <!-- product close -->

            </div>
        </div>


        <?php
                require "footer.php";
                ?>

    </div>
    </div>

    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
}else{
?>

<script>
alert("Please Signin or Signup First");
window.location = "index.php";
</script>
<?php
}

?>