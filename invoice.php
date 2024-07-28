<?php
// session_start();
require "connection.php";

// if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]['email'];
    $oid = $_GET["id"];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | Invoice</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/G_logo.png" />

        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="mt-2" style="background-color: #f7f7ff;">
        <div class="container-fluid">
            <div class="row">
                <!-- header -->
                <?php require "header.php"; ?>

                <div class="col-12">
                    <hr />
                </div>

                <!-- save & print -->

                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printDiv();"><i class="bi bi-printer-fill"></i> &nbsp;Print</button>
                    <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Save as PDF</button>
                </div>

                <div class="col-12">
                    <hr />
                </div>

                <div id="GFG">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-6">
                            <!-- <h1 class="logot fw-bold ">Greenelec</h1> -->
                                <!-- <div class="invoiceheaderimg"></div> -->
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-end text-decoration-underline text-success">
                                        <h2>Greenelec</h2>
                                    </div>
                                    <div class=" col-12 text-end fw-bold">
                                        <span>Kollupitiya, Colombo 03, Sri Lanka.</span><br />
                                        <span>+94112546978</span><br />
                                        <span>Greenelec@gmail.com</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="border border-1 border-warning" />
                    </div>
                    <div class="col-12 mb-4">
                        <div class="row">

                            <div class="col-6">
                                <h5>INVOICE TO :</h5>
                                <?php

                                $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ;");
                                $ar = $addressrs->fetch_assoc();
                                ?>
                                <h2><?php echo $_SESSION['u']['fname'] . " " . $_SESSION['u']['lname']; ?></h2>
                                <span class="fw-bold"><?php echo $ar["line1"] . " " . $ar["line2"]; ?></span><br />
                                <span><?php echo $umail; ?></span>
                            </div>

                            <?php
                            $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "' ;");
                            $in = $invoicers->num_rows;
                            $ir = $invoicers->fetch_assoc();


                            ?>

                            <div class="col-6 text-end mt-4">
                                <h1 class="text-success fw-bold">INVOICE 0<?php echo $ir["id"]; ?></h1>
                                <span class="fw-bold">Date and Time of invoice :</span> &nbsp;
                                <span class="wf-bold"><?php echo $ir["date"]; ?></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <!-- table -->
                    <div class="col-12">
                        <table class="table ">

                            <!-- table head -->
                            <thead>
                                <tr class=" border border-1 border-white">
                                    <th>#</th>
                                    <th>Order Id & product</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>

                            <!-- table body -->
                            <tbody>
                                <?php

                                $invo = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "' ;");
                                $inr = $invo->num_rows;


                                $subtotal = "0";



                                for ($i = 0; $i < $inr; $i++) {

                                    $irs = $invo->fetch_assoc();
                                    $product_id = $irs["product_id"];

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $product_id . "' ;");
                                    $pr = $productrs->fetch_assoc();


                                    $subtotal = $subtotal + $irs["total"];

                                ?>
                                    <tr style="height: 70px;">
                                        <td class="bg-primary text-white fs-3"><?php echo $irs["id"]; ?></td>
                                        <td><a href="#" class="fs-6 fw-bold p-2"><?php echo  $irs["order_id"]; ?></a> <br>

                                            <a href="#" class="fs-6 fw-bold p-2"><?php echo $pr["title"]; ?></a>
                                        </td>

                                        <td class="fs-6 text-end pt-3" style="background-color: rgb(199, 199, 199)">Rs .
                                            <?php echo $pr["price"]; ?> .00</td>
                                        <td class="fs-6 text-end pt-3"><?php echo $irs["qty"]; ?></td>
                                        <td class="fs-6 text-end pt-3 bg-primary text-white">Rs . <?php echo $irs["total"]; ?> .00</td>

                                    </tr>
                            </tbody>
                        <?php
                                }
                        ?>
                        <!-- table footer -->
                        <tfoot>
                            <tr>
                                <td colspan="2" class="border-0"></td>
                                <td colspan="2" class="fs-5 text-end">SUBTOTAL</td>
                                <td class="fs-5 text-end">Rs . <?php echo $subtotal; ?> .00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-0"></td>
                                <td colspan="2" class="fs-5 text-end border-success">Discount</td>
                                <td class="fs-5 text-end border-success">Rs . 00 .00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-0"></td>
                                <td colspan="2" class="fs-5 text-end border-0 border-success">GRAND TOTAL</td>
                                <td class="fs-5  text-end border-0 border-primary">Rs . <?php echo $subtotal; ?> .00</td>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- table  close-->
                    <div class="col-4 text-center" style="margin-top : -100px; margin-bottom :50px;">
                        <span class="fs-1"> Thank You !</span>
                    </div>
                    <!-- </div>
                    </div> -->
                    <!-- </div> -->
                    <div class="col-12 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-success ps-2 rounded" style="background-color: rgb(203, 255, 203);">
                        <div class="row">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold">NOTICE :</label> <br>
                                <label class="form-label fs-5 ">Purchased items can return befor 7 days of delivery .. </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="border border-1 border-warning" />
                    </div>
                    <div class="col-12 mb-3 text-center">
                        <label class="form-label fs-6 text-black-50 ">Invoice was created on a computer and is valid without the
                            Signature and Seal . </label>
                    </div>
                </div>
                <!-- footer -->
                <?php require "footer.php"; ?>

            </div>
        </div>

        <script src="script.js"></script>

    </body>

    </html>


<!-- <?php
// }
?> -->