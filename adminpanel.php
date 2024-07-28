<?php

session_start();

if (isset($_SESSION["a"])) {

    $user_se = $_SESSION["a"];

    require "connection.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | Addmin Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/G_logo.png" />
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
                                    <h4 class="text-white"><?php echo $user_se['fname'] . " " . $user_se['lname'] ?></h4>
                                    <hr class="border border-1 border-white" />
                                </div>

                                <div class=" nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active fs-5 fw-bold" aria-current="page" href="#">Dashboard</a>
                                        <a class="nav-link fs-5" href="manuser.php">Manage Users</a>
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
                                    <!-- <hr class="border border-1 border-white" />
                                <h4 class="text-white fw-bold" style="cursor:pointer;" onclick="">Daily Sellings</h4> -->
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

                                        <?php
                                        $today = date("Y-m-d");

                                        $thismonth = Date("m");

                                        $thisyear = Date("Y");

                                        $a = "0";
                                        $b = "0";
                                        $c = "0";
                                        $e = "0";
                                        $f = "0";

                                        $invoicers = Database::search("SELECT * FROM `invoice` ; ");
                                        $in = $invoicers->num_rows;

                                        for ($x = 0; $x < $in; $x++) {
                                            $ir =  $invoicers->fetch_assoc();

                                            $f = $f + $ir["qty"];

                                            $d = $ir["date"];
                                            $splitdate = explode(" ", $d);
                                            $pdate = $splitdate[0];

                                            if ($pdate == $today) {
                                                $a =  $a + $ir["total"];
                                                $c =  $c + $ir["qty"];
                                            }
                                            $splitmonth = explode("-", $pdate);

                                            $pyear = $splitmonth[0];
                                            $pmonth = $splitmonth[1];

                                            if ($pyear == $thisyear) {
                                                if ($pmonth == $thismonth) {
                                                    $b = $b + $ir["total"];
                                                    $e = $e + $ir["qty"];
                                                }
                                            }
                                        }
                                        ?>
                                        <span class="fs-5 fw-bold">Rs. <?php echo $a; ?>. 00 </span>
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
                                        <span class="fs-5 fw-bold">Rs. <?php echo $b ?> . 00 </span>
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
                                        <span class="fs-5 fw-bold"> <?php echo $c ?> Items </span>
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
                                        <span class="fs-5 fw-bold"><?php echo $e; ?> Items </span>
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
                                        <span class="fs-5 fw-bold"><?php echo $f; ?> Items </span>
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
                                        <?php
                                        $usersrs = Database::search("SELECT * FROM `user`");
                                        $un = $usersrs->num_rows;
                                        ?>
                                        <span class="fs-5 fw-bold"><?php echo $un ?> Members </span>
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
                                <?php
                                $startdate = new DateTime('2021-10-01 00:00:00');

                                $tdate = new DateTime();
                                $tz = new DateTimeZone('Asia/Colombo');
                                $tdate->setTimezone($tz);
                                $endDate = new DateTime($tdate->format('Y-m-d H:i:s'));

                                $difference = $endDate->diff($startdate);
                                ?>
                                <div class="col-12 col-lg-10 text-center mt-3 mb-3">
                                    <label class="form-label fs-4 fw-bold text-success">
                                        <?php
                                        echo $difference->format('%Y') . " Years  " . $difference->format('%m') . " Months  " .
                                            $difference->format('%d') . " Days  " . $difference->format('%H') . " Hours  " .
                                            $difference->format('%i') . " Minutes  " . $difference->format('%s') . " Seconds  ";
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-1">
                                <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                    <div class="row g-1">
                                        <?php
                                        $umail = "0";
                                        $freq = Database::search("SELECT `product_id`,`user_email`, COUNT(`product_id`) AS `value_occurrence` FROM `invoice` WHERE `date` LIKE '%" . $thismonth . "%' GROUP BY `product_id` ORDER BY `value_occurrence` DESC LIMIT 1;");
                                        $freqnum = $freq->num_rows;

                                        for ($z = 0; $z < $freqnum; $z++) {
                                            $freqrow = $freq->fetch_assoc();

                                            $umail =  $freqrow["user_email"];

                                            $product_id = $freqrow["product_id"];

                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $product_id . "' ;");
                                            $pro_rs = $product_rs->fetch_assoc();

                                            $imges = Database::search("SELECT * FROM `images` WHERE `product_id` ='" . $product_id . "' ;");

                                            $img_rs = $imges->fetch_assoc();

                                        ?>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-4 fw-bold">Mostly Sold Items</label>
                                                <div class="col-12">
                                                    <img src="<?php echo $img_rs["code"]; ?>" class="img-fluid rounded-top" style="height:285px;" />
                                                    <hr />
                                                    <div class="col-12 text-center">
                                                        <span class="fs-5 fw-bold"><?php echo $pro_rs["title"]; ?></span>
                                                        <br />
                                                        <span class="fs-6 fw-bold"><?php echo $pro_rs["qty"]; ?> Items</span>
                                                        <br />
                                                        <span class="fs-6 fw-bold">Rs. <?php echo $pro_rs["price"]; ?> . 00</span>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="firstplace"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                    <div class="row g-1">
                                        <?php
                                        $user_details = Database::search("SELECT * FROM `user` WHERE `email`= '" . $umail . "' ;");
                                        $user_rs = $user_details->fetch_assoc();

                                        $profile_img = Database::search("SELECT * FROM `profile_img` WHERE `user_email` ='" . $umail . "' ;");

                                        $profile_rs = $profile_img->fetch_assoc();
                                        ?>
                                        <div class="col-12 text-center">
                                            <label class="form-label fs-4 fw-bold">Mostly Famouse Seller</label>
                                            <div class="col-12">
                                                <img src="<?php echo $profile_rs["code"]; ?>" class="img-fluid rounded-top" style="height:285px;" />
                                                <hr />
                                                <div class="col-12 text-center">
                                                    <span class="fs-5 fw-bold"><?php echo $user_rs["fname"] . " " . $user_rs["lname"]; ?></span>
                                                    <br />
                                                    <span class="fs-6 fw-bold"><?php echo $user_rs["email"]; ?></span>
                                                    <br />
                                                    <span class="fs-6 fw-bold"><?php echo $user_rs["mobile"]; ?></span>
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
<?php

} else {
?>
    <script>
        confirm("You have to sign in firstly");
        window.location = "adminsingnin.php";
    </script>
<?php
}

?>