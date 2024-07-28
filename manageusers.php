<?php
session_start();
require "connection.php";

// $u = "umamidu@gmail.com";
$rcvs = "36";
?>
<!DOCTYPE html>
<html>

<head>
    <title>eShop | Manage Users</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/G_logo.png" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,  #74EBD5 0%, #9FACE6 100%);" onload="refreshrecentarea();">


    <div class="container-fluid">
        <div class="row">


            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary ">Manage All Users</label>
            </div>
            <div class="col-12 bg-light rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-primary" onclick="searchUser();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-2">
                <div class="row">
                    <!-- 
                   div < class="col-10">
                        <div class="row"> -->


                    <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>

                    <div class="col-2  bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold ">Profile Image</span>
                    </div>

                    <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white ">Email</span>
                    </div>

                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2 ">
                        <span class="fs-4 fw-bold ">User Name</span>
                    </div>


                    <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>

                    <div class="col-2  bg-light pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold ">Registered Date</span>
                    </div>


                    <!-- 
                        </div>
                    </div> -->


                    <div class="col-2 col-lg-1 bg-white pt-2 pb-2"></div>



                </div>
            </div>


            <?php
            if (isset($_SESSION['k'])) {
                $u = $_SESSION['k'];

                $user_email_image = $_SESSION['k']['email'];
                $get_image = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user_email_image . "' ;");
                $pimg_rs = $get_image->fetch_assoc();
            ?>

                <div class="col-12  mb-2">
                    <div class="row">
                        <!-- <div class="col-10" onclick="viewmsgmodel();">
                            <div class="row"> -->


                        <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                            <span class="fs-5 fw-bold text-white">1</span>
                        </div>

                        <div class="col-2  bg-light  d-none d-lg-block" onclick="viewmsgmodel();">
                            <?php
                            if (isset($pimg_rs['code'])) {
                            ?>
                                <img src="<?php echo $pimg_rs['code']; ?>" style="height:70px; margin-left:100px ;" />
                            <?php
                            } else {
                            ?>
                                <img src="resources/demoProfileImg.jpg" style="height: 70px; margin-left: 100px;" />
                            <?php
                            }
                            ?>

                        </div>

                        <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold text-white "><?php echo $u["email"]; ?></span>
                        </div>

                        <div class="col-6 col-lg-2 bg-light pt-2 pb-2 ">
                            <span class="fs-5 fw-bold "><?php echo $u['fname'] . " " . $u['lname']; ?></span>
                        </div>


                        <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php echo $u['mobile'] ?></span>
                        </div>

                        <div class="col-2  bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold "> <?php $rd = $u["register_date"];
                                                            $splitrd = explode(" ", $rd);
                                                            echo $splitrd[0];
                                                            ?></span>

                        </div>

                        <!-- </div>
                        </div> -->



                        <div class="col-2 col-lg-1 bg-white pt-2 pb-2 d-grid">
                            <button class="btn btn-danger fs-5 fw-bold rounded ">Block</button>
                        </div>



                    </div>
                </div>
                <div class="offest-1 offset-lg-3 col-10 col-lg-6 rounded mt-3 mb-3">
                    <button class="btn btn-success fs-4 fw-bold rounded col-12" onclick="destroysession(<?php session_destroy(); ?>);">Back</button>
                </div>

            <?php
            } else {
            ?>
                <?php

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $usersrs = Database::search("SELECT * FROM `user` ; ");
                $d = $usersrs->num_rows;

                $row = $usersrs->fetch_assoc();

                $results_per_page = 20;

                $number_of_pages = ceil($d / $results_per_page);





                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                $selectedrs = Database::search("SELECT * FROM `user` 
LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");

                $srn = $selectedrs->num_rows;

                $c = "0";

                while ($srow = $selectedrs->fetch_assoc()) {

                    $c = $c + 1;
                    $get_image = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $srow['email'] . "' ;");
                    $pimg_rs = $get_image->fetch_assoc();

                ?>


                    <div class="col-12  mb-2">
                        <div class="row">


                            <!-- <div class="col-10" onclick="viewmsgmodel();">
                                <div class="row"> -->

                            <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
                            </div>

                            <div class="col-2  bg-light  d-none d-lg-block" onclick="viewmsgmodel();">
                                <?php
                                if (isset($pimg_rs['code'])) {
                                ?>
                                    <img src="<?php echo $pimg_rs['code']; ?>" style="height:70px; margin-left:100px ;" />
                                <?php
                                } else {
                                ?>
                                    <img src="resources/demoProfileImg.jpg" style="height: 70px; margin-left: 100px;" />
                                <?php
                                }
                                ?>
                            </div>

                            <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white "><?php echo $srow['email']; ?></span>
                            </div>

                            <div class="col-6 col-lg-2 bg-light pt-2 pb-2 ">
                                <span class="fs-5 fw-bold "><?php echo $srow["fname"] . " " . $srow["lname"];  ?></span>
                            </div>


                            <div class="col-2  bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php echo $srow['mobile']; ?></span>
                            </div>

                            <div class="col-2  bg-light pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold ">
                                    <?php $rd = $srow["register_date"];
                                    $splitrd = explode(" ", $rd);
                                    echo $splitrd[0];
                                    ?>
                                </span>
                            </div>

                            <!-- 
                                </div>
                            </div> -->

                            <?php
                            $s = $srow["status"];
                            if ($s == 1) {
                            ?>

                                <div class="col-2 col-lg-1 bg-white pt-2 pb-2 d-grid">
                                    <button class="btn btn-danger fs-5 fw-bold rounded" onclick="blockusers('<?php echo  $srow['email'] ?>');">Block</button>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="col-2 col-lg-1 bg-white pt-2 pb-2 d-grid">
                                    <button class="btn btn-success fs-5 fw-bold rounded" onclick="blockusers('<?php echo  $srow['email'] ?>');">Unblock</button>
                                </div>
                            <?php
                            }
                            ?>




                        </div>
                    </div>
                <?php

                }


                ?>

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
                                        <a class="ms-1 active" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
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

            <?php }
            ?>
            <!-- Modal -->
            <div class="modal fade modsl-dialog-scrollable" id="msgmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- modelbody -->

                            <div class="col-12 py-5 px-4">
                                <div class="row rounded-lg overflow-hidden shadow">
                                    <div class="col-12 px-0">
                                        <div class="bg-white">

                                            <div class="bg-gray px-4 py-2 bg-light">
                                                <p class="h5 mb-0 py-1">Recent</p>
                                            </div>

                                            <div class="messages-box">
                                                <div class="list-group rounded-0" id="rcv">



                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <input type="text" id="emails" value="<?php echo $u ?>" class="d-none" />
                                    <input id="ids" value="<?php echo $rcvs; ?>" class=" d-none" />
                                    <!-- massage box -->
                                    <div class="col-7 px-0">
                                        <div class="row px-4 py-5 chat-box bg-white" id="chatrow">
                                            <!-- massage load venne methana -->


                                        </div>
                                    </div>

                                    <div class="offset-5 col-7">
                                        <div class="row bg-white">

                                            <!-- text -->
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="input-group">
                                                        <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                                        <div class="input-group-append">

                                                            <button id="button-addon2" class="btn btn-link fs-1" onclick="sendmessagers();"> <i class="bi bi-cursor-fill"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- text -->

                                        </div>
                                    </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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