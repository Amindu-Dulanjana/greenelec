<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>eShop | Advanced Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-info">
    <div class="container-fluid" id="maindiv">
        <div class="row">

            <!-- header start  -->
            <div class="col-12 bg-body border border-primary border-start-0 border-end-0 border-top-0">
                <?php require "header.php"; ?>
            </div>
            <!-- header close  -->

            <div class="col-12 bg-white">
                <div class="row">
                    <div class="offset-1 offset-lg-4 col-12 col-lg-4">
                        <div class="row">

                            <!-- logo -->
                            <div class="col-2 mt-2">
                                <div class="mb-3 logo"> </div>
                            </div>

                            <div class="col-10">
                                <label class="form-label text-black-50  fw-bold fs-2 mt-4">Advanced Search</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--body design start -->
            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">
                <div class="row">


                    <!-- search start -->
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12 col-lg-10 mt-3 mb-2">
                                <input type="text" class="form-control" placeholder="Type Keyword to Search..." id="k" />
                            </div>
                            <div class="col-4 col-lg-2 mt-3 mb-2">
                                <button class="btn btn-primary searchbutton1" onclick="advancedSearch();">Search</button>
                            </div>
                            <div class="col-12">
                                <hr class="border border-primary border-3">
                            </div>
                        </div>
                    </div>
                    <!-- search close -->

                    <!-- category,brand,model start-->
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class="col-lg-4 col-12 mb-3">
                                        <select class="form-select" id="c">
                                            <option value="0">Select Category</option>

                                            <?php
                                            $categoryrs = Database::search("SELECT * FROM  `category` ;");
                                            $cn = $categoryrs->num_rows;
                                            for ($a = 0; $a < $cn; $a++) {
                                                $cr = $categoryrs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $cr['id']; ?>"><?php echo  $cr['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <select class="form-select" id="b">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $brandrs = Database::search("SELECT * FROM  `brand` ;");
                                            $bn = $brandrs->num_rows;
                                            for ($a = 0; $a < $bn; $a++) {
                                                $br = $brandrs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $br['id']; ?>"><?php echo  $br['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-12 mb-3">
                                        <select class="form-select" id="m">
                                            <option value="0">Select Model</option>

                                            <?php
                                            $modelrs = Database::search("SELECT * FROM  `model` ;");
                                            $mn = $modelrs->num_rows;
                                            for ($a = 0; $a < $mn; $a++) {
                                                $mr = $modelrs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $mr['id']; ?>"><?php echo  $mr['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- category,brand,model start-->

                    <!-- condition , colour start -->
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-3">
                                <select class="form-select" id="con">
                                    <option value="0">Select Condition</option>

                                    <?php
                                    $conditionrs = Database::search("SELECT * FROM  `condition` ;");
                                    $con = $conditionrs->num_rows;
                                    for ($a = 0; $a < $con; $a++) {
                                        $con_r = $conditionrs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $con_r['id']; ?>"><?php echo  $con_r['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-lg-6 col-12 mb-3">
                                <select class="form-select" id="clr">
                                    <option value="0">Select Colour</option>

                                    <?php
                                    $color_rs = Database::search("SELECT * FROM  `color` ;");
                                    $col = $color_rs->num_rows;
                                    for ($a = 0; $a < $col; $a++) {
                                        $colrs = $color_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $colrs['id']; ?>"><?php echo  $colrs['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <!-- condition , colour close -->

                    <!-- price start -->
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-6 mb-3">
                                <input class="form-control" placeholder="Price From" id="pf" />
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <input class="form-control" placeholder="Price To" id="pt" />
                            </div>

                        </div>
                    </div>
                    <!-- price close -->


                    <!-- card open -->
                    <div class=" col-12 col-lg-12 bg-white mt-3 mb-3 rounded">
                        <div class="row">
                            <div class="col-12 offset-0 col-lg-10 offset-lg-1 text-center">
                                <div class="row" id="viewResults">

                                    <!-- card -->
                                    <div class="card mb-3 col-12 col-lg-5 mt-3 ms-lg-5 d-grid" style="max-width: 540px;">
                                        <div class="row g-0">

                                            <div class="col-md-4 mt-4">


                                                <img src="new resources/mobile images/iphone12.jpg" class="img-fluid d-grid">

                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold">apple 12</h5>
                                                    <span class="text-primary fw-bold">Rs. 100 . 00</span><br>
                                                    <span class="text-success fw-bold">10 Items Left</span><br>
                                                    <div class="form-check form-switch">

                                                        <label class="form-check-label text-info fw-bold" for="check" id="checklabel"></label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-md-6 d-grid g-1">
                                                                    <a href="#" class="btn btn-success shadow-none">Update</a>
                                                                </div>
                                                                <div class="col-md-6 d-grid g-1">
                                                                    <a href="#" class="btn btn-danger shadow-none">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- pagination -->
                                    <!-- <div class="col-12">
                                    <div class="row">
                                        <div class="offset-4 col-4 text-center">
                                            <div class="offset-3 mb-5 pagination">
                                                <a href="#">&laquo;</a>
                                                <a href="#" class="active">1</a>
                                                <a href="#" class="">2</a>
                                                <a href="#">&raquo;</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                    <!-- pagination -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    </div>

    <!-- footer -->

    <?php
    require "footer.php";
    ?>

    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php
    }
?>