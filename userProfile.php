<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {


?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Greenelec | User Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/G_logo.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="bg-success">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1 bg-white mt-lg-5 mb-lg-5 rounded-3 fw-bold">
                    <div class="row">
                        <div class="col-12 col-lg-4 border-end">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 d-flex flex-column align-items-center text-center p-3 py-5">
                                            <?php
                                            $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                            $pn = $profileimg->num_rows;
                                            if ($pn == 1) {
                                                $p = $profileimg->fetch_assoc();
                                            ?>
                                                <img class="rounded-circle mt-5" width="150px" src="<?php echo $p["code"]; ?>" id="prv" />
                                            <?php
                                            } else {
                                            ?>
                                                <img class="rounded-circle mt-5" width="150px" src="resources/demoProfileImg.jpg" id="prv" />
                                            <?php
                                            }
                                            ?>

                                            <br />
                                            <span class="font-weight-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                            <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>
                                            <input class="d-none" type="file" id="profileimg" accept="img/*" />
                                            <label class="btn btn-warning fw-bold mt-3" for="profileimg" onclick="changeImg3();">Update Profile Image</label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter email id" value="<?php echo $_SESSION["u"]["email"]; ?>" readonly />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" placeholder="Enter password" readonly value="<?php echo $_SESSION["u"]["password"]; ?>" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Registered Date & time</label>
                                            <input type="text" class="form-control" placeholder="registered date" readonly value="<?php echo $_SESSION["u"]["register_date"]; ?>" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Gender</label>
                                            <?php
                                            $genderid = $_SESSION["u"]["gender_id"];
                                            $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $genderid . "'");
                                            $g = $ugender->fetch_assoc();
                                            ?>
                                            <input type="text" class="form-control" placeholder="Gender" value="<?php echo $g["name"]; ?>" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between align-items-center mb-3 mt-lg-5 ms-lg-5 mt-2 mb-lg-5">
                                    <h1 class="fw-bold">Profile Settings</h1>
                                </div>
                                <hr />
                                <div class="col-12">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" id="fname" placeholder="first name" value="<?php echo $_SESSION["u"]["fname"]; ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Surname</label>
                                            <input type="text" class="form-control" id="lname" placeholder="last name" value="<?php echo $_SESSION["u"]["lname"]; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row mt-3">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" placeholder="Enter Phone Number" value="<?php echo $_SESSION["u"]["mobile"]; ?>" />
                                        </div>
                                        <?php
                                        $useremail = $_SESSION["u"]["email"];
                                        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $useremail . "' ORDER BY `id` DESC");
                                        $n = $addressrs->num_rows;

                                        if ($n == 1) {
                                            $d = $addressrs->fetch_assoc();
                                        ?>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 01</label>
                                                <input type="text" class="form-control" id="line1" placeholder="Enter address line 01" value="<?php echo $d["line1"]; ?>" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 02</label>
                                                <input type="text" class="form-control" id="line2" placeholder="Enter address line 02" value="<?php echo $d["line2"]; ?>" />
                                            </div>
                                            <?php
                                            $cityid = $d["city_id"];
                                            $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "'");
                                            $c = $ucity->fetch_assoc();

                                            $districtid = $c["district_id"];
                                            $udist = Database::search("SELECT * FROM `district` WHERE `id`='" . $districtid . "'");
                                            $k = $udist->fetch_assoc();

                                            $provinceid = $k["province_id"];
                                            $uprovince = Database::search("SELECT * FROM `province` WHERE `id`='" . $provinceid . "'");
                                            $l = $uprovince->fetch_assoc();
                                            ?>

                                            <div class="col-md-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-control" id="province">
                                                    <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>
                                                    <?php
                                                    $provincers = Database::search("SELECT * FROM `province` WHERE `name`!='" . $l["id"] . "'");
                                                    $pn = $provincers->num_rows;

                                                    for ($i = 0; $i < $pn; $i++) {
                                                        $pr = $provincers->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">District</label>
                                                <select class="form-control" id="district">
                                                    <option value="<?php echo $k["id"]; ?>"><?php echo $k["name"]; ?></option>
                                                    <?php
                                                    $districtrs = Database::search("SELECT * FROM `district` WHERE `name`!='" . $k["name"] . "'");
                                                    $dn = $districtrs->num_rows;

                                                    for ($i = 0; $i < $dn; $i++) {
                                                        $dr = $districtrs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $dr["id"]; ?>"><?php echo $dr["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <?php
                                                $cityid = $d["city_id"];
                                                $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "'");
                                                $c = $ucity->fetch_assoc();

                                                ?>
                                                <input type="text" class="form-control" id="city" placeholder="Enter Your city" value="<?php echo $c["name"]; ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Postal Code</label>
                                                <input type="text" class="form-control" id="postalcode" placeholder="postal code" value="<?php echo $c["postal_code"]; ?>" />
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 01</label>
                                                <input type="text" id="line1" class="form-control" placeholder="Enter address line 01" value="" />
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Address Line 02</label>
                                                <input type="text" id="line2" class="form-control" placeholder="Enter address line 02" value="" />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Province</label>
                                                <select class="form-control" id="province">

                                                    <?php
                                                    $provincers = Database::search("SELECT * FROM `province`");
                                                    $pn = $provincers->num_rows;

                                                    for ($i = 0; $i < $pn; $i++) {
                                                        $pr = $provincers->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">District</label>
                                                <select class="form-control" id="district">

                                                    <?php
                                                    $districtrs = Database::search("SELECT * FROM `district`");
                                                    $dn = $districtrs->num_rows;

                                                    for ($i = 0; $i < $dn; $i++) {
                                                        $dr = $districtrs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $dr["id"]; ?>"><?php echo $dr["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">City</label>

                                                <input type="text" id="city" class="form-control" placeholder="Enter Your city" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Postal Code</label>
                                                <input type="text" id="postalcode" class="form-control" placeholder="postal code" value="" />
                                            </div>

                                        <?php
                                        }
                                        ?>
                                        <div class="col-12 col-md-6 offset-md-3 mt-5 text-center d-grid mb-5">
                                            <button class="btn btn-primary fw-bold" style="height: 50px;" onclick="updateProfile();">Update Your Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                require "footer.php";

                ?>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>