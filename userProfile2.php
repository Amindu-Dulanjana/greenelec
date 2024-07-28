<!DOCTYPE html>
<html>

<head>
    <title>eShop | User Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/G_logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-primary">
    <?php

    session_start();


    if (isset($_SESSION['u'])) {


        require "connection.php";
    ?>

        <div class="container-fluid bg-white  rounded mt-5 mb-5">
            <div class="row">

                <!-- user profile -->
                <div class="col-md-3 border-end">
                    <div class="d-flex  flex-column align-items-center text-center p-3 py-5">



                        <?php

                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION['u']["email"] . "';");
                        $pn = $profileimg->num_rows;

                        if ($pn == 1) {
                            $p = $profileimg->fetch_assoc();
                        ?>
                            <img class="rounded-circle mt-5" id="prv" class="card-img-top" width="150px" src="<?php echo $p["code"]; ?>">

                        <?php
                        } else {
                        ?>
                            <image class="rounded mt-5" id="prv" width="150px" src="resources/demoProfileImg.jpg" />
                        <?php
                        }
                        ?>
                        <span class="font-weight-bold"><?php echo $_SESSION["u"]['fname'] . " " . $_SESSION["u"]["lname"]; ?>
                        </span>
                        <span class="text-black-50"><?php echo $_SESSION["u"]['email']; ?></span>

                        <input class="d-none" type="file" id="profileimg" accept="img/" />
                        <label class="btn btn-primary mt-3" for="profileimg" onclick="changeImg3();">Update Profile Image</label>
                    </div>
                </div>


                <!-- user profile close -->

                <!-- profile setting -->
                <div class="col-md-5 border-end">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="first name" id="fname" value="<?php echo $_SESSION['u']['fname']; ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Surname</label>
                                <input type="text" class="form-control" placeholder="last name" id="lname" value="<?php echo $_SESSION['u']['lname']; ?>" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12  mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number" id="mobile" value="<?php echo $_SESSION['u']['mobile']; ?>" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter Password" value="<?php echo $_SESSION['u']['password']; ?>" readonly value="" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter email id" readonly value="<?php echo $_SESSION['u']['email']; ?>" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Registered Date & Time</label>
                                <input type="text" class="form-control" placeholder="registered date" readonly value="<?php echo $_SESSION['u']['register_date']; ?>" />
                            </div>

                            <?php
                            $useremail = $_SESSION['u']['email'];
                            $useraddress = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $useremail . "';");
                            $n = $useraddress->num_rows;

                            if ($n == 1) {
                                $d = $useraddress->fetch_assoc();
                            ?>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address Line 01</label>
                                    <input type="text" class="form-control" placeholder="address line 01" id="line1" value="<?php echo $d["line1"]; ?>" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address Line 02</label>
                                    <input type="text" class="form-control" placeholder="address line 02" id="line2" value="<?php echo $d["line2"]; ?>" />
                                </div>
                        </div>
                        <?php


                                $cityid = $d["city_id"];
                                $ucity = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "';");
                                $c = $ucity->fetch_assoc();


                                $districtid = $c["district_id"];
                                $udist = Database::search("SELECT * FROM `district` WHERE `id`='" . $districtid . "';");
                                $k = $udist->fetch_assoc();


                                $provinceid = $k["province_id"];
                                $uprovince = Database::search("SELECT * FROM `province` WHERE `id`='" . $provinceid . "';");
                                $l = $uprovince->fetch_assoc();

                        ?>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Province</label>
                                <Select id="province" class="form-control">
                                    <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>
                                    <?php
                                    $provincers = Database::search("SELECT * FROM `province` WHERE `id`!='" . $l["id"] . "';");
                                    $pn = $provincers->num_rows;

                                    for ($i = 0; $i < $pn; $i++) {
                                        $pr = $provincers->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>
                                    <?php

                                    }
                                    ?>
                                </Select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">District</label>
                                <Select id="district" class="form-control">
                                    <option value="<?php echo $k["id"]; ?>"><?php echo $k["name"]; ?></option>
                                    <?php
                                    $districtu = Database::search("SELECT * FROM `district` WHERE `id`!='" . $k["id"] . "';");
                                    $du = $districtu->num_rows;

                                    for ($i = 0; $i < $du; $i++) {
                                        $distu = $districtu->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $distu["id"]; ?>"><?php echo $distu["name"]; ?></option>
                                    <?php

                                    }
                                    ?>

                                </Select>
                            </div>
                            <?php
                                $cityid = $d["city_id"];

                                $cityrs = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "';");
                                $c = $cityrs->num_rows;

                                if ($c == 1) {
                                    $rs = $cityrs->fetch_assoc(); ?>
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">City</label>

                                    <select class="form-control" id="city">
                                        <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["name"]; ?></option>
                                    </select>

                                </div>

                            <?php
                                } else {
                                }
                            } else { ?>



                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 01</label>
                                <input type="text" class="form-control" placeholder="address line 01" id="line1" value="" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 02</label>
                                <input type="text" class="form-control" placeholder="address line 02" id="line2" value="" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Province</label>
                                <Select id="province" class="form-control">
                                    <option value="">elect Province</option>
                                    <option value="">Central</option>
                                    <option value="">Western</option>
                                    <option value="">North</option>
                                    <option value="">South</option>
                                </Select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">District</label>
                                <Select id="district" class="form-control">
                                    <option class="text-primary" value="0">Select District</option>
                                    <option value="">Kandy</option>
                                    <option value="">Colombo</option>
                                    <option value="">Galle</option>
                                    <option value="">Anuradhapura</option>
                                </Select>
                            </div>
                            <div class="col-md-6">

                                <label class="form-label">City</label>
                                <input type="text" class="form-control" placeholder="Enter your City" id="city" value="" />
                            </div>



                        <?php

                            }
                        ?>
                        <?php
                        $gender_id = $_SESSION['u']["gender_id"];
                        $ugender = Database::search("SELECT * FROM `gender`WHERE `id`='" . $gender_id . "';");
                        $g = $ugender->fetch_assoc();

                        ?>




                        <div class="col-md-6 mt-2">
                            <label class="form-label">Gender</label>
                            <input type="text " class="form-control" placeholder="Gender" readonly value="<?php echo $g["name"]; ?>" />
                        </div>



                        </div>
                        <!-- profile setting  close-->
                        <!-- button -->
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary" onclick="updateProfile();">Update Profile</button>
                        </div>
                        <!-- button  close-->
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

</html>            <?php
        } else {

            ?>

                <script>
                    window.location = "index.php";
                </script>
            <?php

        }
            ?>