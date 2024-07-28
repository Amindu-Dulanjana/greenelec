<?php
require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>eShop|Admin|Manage Products</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/G_logo.png" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); min-height: 100px;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary">Manage All Users</label>
            </div>

            <div class="col-12 mt-3 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Email</span>
                    </div>
                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                        <span class="fs-4 fw-bold">User Name</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-4 col-lg-1 bg-white pt-2 pb-2">

                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">1</span>
                    </div>
                    <div class="col-2 bg-light d-none d-lg-block text-center" onclick="singleviewmodal();">
                        <img src="resources/demoProfileImg.jpg" style="height: 70px;"> 
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold text-white">sasana@gmail.com</span>
                    </div>
                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                        <span class="fs-5 fw-bold">Sasana Sathyajith</span>
                    </div>
                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold text-white">0761472583</span>
                    </div>
                    <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-5 fw-bold">2021-10-01</span>
                    </div>
                    <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                        <button class="btn btn-danger">Block</button>
                    </div>
                </div>
            </div>

            <!-- single product modal start -->
            <div class="modal fade" id="singleproductview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apple iPhone 12</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                            <img src="resources/products/iphone12.jpg" style="height: 250px;" class="img-fluid"><br>
                            </div>
                            <div>
                            <span class="fs-5 fw-bold">Price :</span>&nbsp;
                            <span class="fs-5">Rs. 100000 .00</span><br>

                            <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                            <span class="fs-5">10 Items Left</span><br>

                            <span class="fs-5 fw-bold">Seller :</span>&nbsp;
                            <span class="fs-5">Sasana Sathyajith</span><br>

                            <span class="fs-5 fw-bold">Description :</span>&nbsp;
                            <p class="fs-5">128 GB</p><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                        </div>
                    </div>
                </div>
            </div>
            <!-- single product modal end -->

            <div class="col-12fs-5 fw-bold mt-3 mb-3 d-grid justify-content-center">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>

            <hr />

            <div class="col-12">
                <h3 class="text-primary">Manage Categories</h3>
            </div>

            <hr>

            <div class="col-12 mb-3">
                <div class="row g-1">

                    <?php
                    $categoryrs = Database::search("SELECT * FROM `category`");
                    $num = $categoryrs->num_rows;

                    for ($i = 0; $i < $num; $i++) {

                        $row = $categoryrs->fetch_assoc();

                    ?>
                        <div class="col-12 col-lg-3">
                            <div class="row g-1 px-1">
                                <div class="col-12 text-center bg-white border border-2 border-primary shadow rounded">
                                    <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"]; ?></label>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>




                    <div class="col-12 col-lg-3">
                        <div class="row g-1 px-1">

                            <div class="col-12 text-center bg-white border border-2 border-success shadow rounded" onclick="addnewmodal();">
                                <label class="form-label fs-4 fw-bold py-3 text-black-50"><i class="bi bi-plus-circle fs-4"></i> Add New Category</label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- category modal start -->
            <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Category</label>
                           <input type="text" class="form-control" id="categorytxt">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="savecategory();">Save Category</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- category modal end -->

            

            <?php require "footer.php"; ?>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>