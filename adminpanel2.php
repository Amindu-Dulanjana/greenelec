<!DOCTYPE html>
<html>

<head>
    <title>eShop | Addmin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,  #74EBD5 0%, #9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2">
                <div class="row">
                    <div class=" align-items-start bg-dark col-12 text-center">
                        <div class="row g-1">
                            <div class="col-12 mt-5 ">
                                <h4 class="text-white">Amindu Dulanjana</h4>
                                <hr class="border border-1 border-white" />
                            </div>

                            <div class=" nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                <nav class="nav flex-column">
                                    <a class="nav-link active fs-5 fw-bold" aria-current="page" href="#">Dashboard</a>
                                    <a class="nav-link fs-5" href="manageusers.php">Manage Users</a>
                                    <a class="nav-link fs-5" href="manageproduct.php">Manage Products</a>
                                </nav>
                            </div>

                            <div class="col-12 mt-3">
                                <hr class="border border-1 border-white" />
                                <h4 class="text-white fw-bold">Selling History</h4>
                                <hr class="border border-1 border-white" />
                            </div>

                            <div class="col-12 mt-2 d-grid">
                                <label class="form-label fs-6 fw-bold text-white">From Date</label>
                                <input type="date" class="form-control" id="fromdate" />

                                <label class="form-label fs-6 fw-bold text-white mt-2">To Date</label>
                                <input type="date" class="form-control " id="todate" />

                                <a class="btn btn-primary mt-2" href="" id="historylink" onclick="dailysellings();">View Sellings</a>

                                <hr class="border border-1 border-white" />
                                <hr class="border border-1 border-white" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <div class="row">
                    <div class="col-12 mt-3 mb-3 text-white">
                        <h2 class="fw-bold">Dashboard</h2>
                    </div>
                    <div class="col-12 ">
                        <hr />
                    </div>
                </div>
                <div class="col-12">
                    <div class="row g-1">
                        <!-- div 1 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-primary text-white text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Daily Earnings</span>
                                    <br />
                                    <span class="fs-5 fw-bold">Rs. 120000 . 00 </span>
                                </div>
                            </div>
                        </div>
                        <!-- div 2 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-light text-dark text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Monthly Earnings</span>
                                    <br />
                                    <span class="fs-5 fw-bold">Rs. 690000 . 00 </span>
                                </div>
                            </div>
                        </div>
                        <!-- div 3 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-dark text-white text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Today Sellings</span>
                                    <br />
                                    <span class="fs-5 fw-bold">1 Items </span>
                                </div>
                            </div>
                        </div>
                        <!-- div 4 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-secondary text-white text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Monthly Sellings</span>
                                    <br />
                                    <span class="fs-5 fw-bold">4 Items </span>
                                </div>
                            </div>
                        </div>
                        <!-- div 5 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-success text-white text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Total Sellings</span>
                                    <br />
                                    <span class="fs-5 fw-bold">4 Items </span>
                                </div>
                            </div>
                        </div>
                        <!-- div 6 -->
                        <div class="col-6 col-lg-4 px-1">
                            <div class="row g-1">
                                <div class="col-12 bg-danger text-white text-center  rounded " style="height: 100px;">
                                    <br />
                                    <span class="fs-4 fw-bold">Total Engagements</span>
                                    <br />

                                    <span class="fs-5 fw-bold">2 Members </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12 bg-dark">
                        <div class="row">
                            <div class="col-lg-2 col-12 text-center mt-3 mb-3">
                                <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                            </div>

                            <div class="col-12 col-lg-10 text-center mt-3 mb-3">
                                <label class="form-label fs-4 fw-bold text-success">
                                   00Years 0Months 27Days 10Hours 24Minutes 15Seconds
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row g-1">
                            <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                <div class="row g-1">

                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold">Mostly Sold Items</label>
                                        <div class="col-12">
                                            <img src="new resources/mobile images/huawei_p20.png" class="img-fluid rounded-top" style="height:285px;" />
                                            <hr />
                                            <div class="col-12 text-center">
                                                <span class="fs-5 fw-bold">Huawei P20</span>
                                                <br />
                                                <span class="fs-6 fw-bold">1 Items</span>
                                                <br />
                                                <span class="fs-6 fw-bold">Rs.85000 . 00</span>
                                            </div>

                                            <div class="col-12">
                                                <div class="firstplace"></div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                <div class="row g-1">

                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold">Mostly Famouse Seller</label>
                                        <div class="col-12">
                                            <img src="resources/demoProfileImg.jpg" class="img-fluid rounded-top" style="height:285px;" />
                                            <hr />
                                            <div class="col-12 text-center">
                                                <span class="fs-5 fw-bold">Amindu Dulanjana</span>
                                                <br />
                                                <span class="fs-6 fw-bold">umamidu@gmail.com</span>
                                                <br />
                                                <span class="fs-6 fw-bold">0712352353</span>
                                            </div>

                                            <div class="col-12">
                                                <div class="firstplace"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require "footer.php"; ?>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>