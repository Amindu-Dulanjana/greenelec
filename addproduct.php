<?php
session_start();
if (isset($_SESSION["u"])) { 
    require "connection.php";
?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop|Add Product</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="resources/G_logo.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row gy-3">
                <!-- heading -->
                <div id="addproductbox">
                    <div class="col-12 border-bottom border-warning bg-light">
                        <div class="row">
                            <div class="col-10 col-lg-11">
                                <h1 class="logot mt-2 fw-bold">Greenelec</h1>
                            </div>
                            <div class="col-2 col-lg-1 text-end"><a class="btn btn-primary fw-bold mt-2" href="home.php">Home</a></div>
                        </div>
                    </div>
                    <div class="col-12 mb-4 mt-2 border-bottom border-warning pb-2 pt-2">
                        <h1 class="h2 text-center text-success fw-bold">Add Your Products.</h1>
                    </div>
                    <!-- heading -->
                    <!-- category,brand,model -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Category</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" id="ca">
                                            <option>Select Category</option>
                                            <?php

                                            $categoey = Database::search("SELECT * FROM `category`");
                                            $cn = $categoey->num_rows;
                                            for ($x = 0; $x < $cn; $x++) {
                                                $cat = $categoey->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"]; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row ">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Brand</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" id="br">
                                            <option>Select Brand</option>
                                            <?php

                                            $brand = Database::search("SELECT * FROM `brand`");
                                            $bn = $brand->num_rows;
                                            for ($i = 0; $i < $bn; $i++) {
                                                $bra = $brand->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $bra["id"]; ?>"><?php echo $bra["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Model</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select" id="mo">
                                            <option>Select Model</option>
                                            <?php

                                            $model = Database::search("SELECT * FROM `model`");
                                            $mn = $model->num_rows;
                                            for ($y = 0; $y < $mn; $y++) {
                                                $mod = $model->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $mod["id"]; ?>"><?php echo $mod["name"]; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- category,brand,model -->
                    <hr class="hrbreak1" />
                    <!-- title -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Add a Title to your Product</label>
                            </div>
                            <div class="offset-lg-2 col-12 col-lg-8">
                                <input class="form-control" type="text" id="ti" />
                            </div>
                        </div>
                    </div>
                    <!-- title -->
                    <hr class="hrbreak1" />
                    <!-- condition,color,qty -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Condition</label>
                                    </div>
                                    <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check">
                                        <input class="form-check-input" type="radio" id="bn" name="flexRadioDefault" checked>
                                        <label class="form-check-label" for="bn">
                                            Brandnew
                                        </label>
                                    </div>
                                    <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
                                        <label class="form-check-label" for="us">
                                            Used
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product Colour</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr1" checked>
                                                <label class="form-check-label" for="clr1">
                                                    Gold
                                                </label>
                                            </div>
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr2">
                                                <label class="form-check-label" for="clr2">
                                                    Silver
                                                </label>
                                            </div>
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr3">
                                                <label class="form-check-label" for="clr3">
                                                    Graphite
                                                </label>
                                            </div>
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr4">
                                                <label class="form-check-label" for="clr4">
                                                    Pasific Blue
                                                </label>
                                            </div>
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr5">
                                                <label class="form-check-label" for="clr5">
                                                    Jet Black
                                                </label>
                                            </div>
                                            <div class="offset-1 col-5 offset-lg-0 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" id="clr6">
                                                <label class="form-check-label" for="clr6">
                                                    Rose Gold
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Quantity</label>
                                        <input class="form-control" type="number" value="0" min="0" id="qty" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- condition,color,qty -->
                    <hr class="hrbreak1" />
                    <!-- cost,payment method -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Cost per Item</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Approved Payment Methods</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="pm pm1 offset-2 col-2"></div>
                                            <div class="pm pm2 col-2"></div>
                                            <div class="pm pm3 col-2"></div>
                                            <div class="pm pm4 col-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- cost,payment method -->
                    <hr class="hrbreak1" />
                    <!-- delivery cost -->
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Delivery Costs</label>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-3">
                                <label class="form-label">Delivery Cost Within Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1"></label>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-3 mt-lg-3">
                                <label class="form-label">Delivery Cost Out Of Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7 mt-lg-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delivery cost -->
                    <hr class="hrbreak1" />
                    <!-- description -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Product Description</label>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" cols="100" rows="30" style="background-color: honeydew;" id="desc"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- description -->
                    <hr class="hrbreak1" />
                    <!-- product img -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Add Product Image</label>
                            </div>
                            <img class="col-5 col-lg-2 productimg ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev" />
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mt-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-6"><input type="file" accept="img/*" class="d-none" id="imguploader" />
                                                <label class="btn btn-warning col-5 col-lg-8 fw-bold" for="imguploader" onclick="changeImg();">Upload</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product img -->
                    <hr class="hrbreak1" />
                    <!-- notice -->
                    <div class="col-12">
                        <label class="form-label lbl1">Notice...</label>
                        <br />
                        <label class="form-label fw-bold">We are taking 5% of the product price from every product as a service charge.</label>
                    </div>
                    <!-- notice -->
                    <!-- save btn -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 offset-0 col-lg-4 offset-lg-4 d-grid">
                                <button class="btn btn-primary searchbtn fw-bold" onclick="addProduct();">Add Product</button>
                            </div>
                        </div>
                    </div>
                    <!-- save btn -->
                </div>
                <!-- footer -->
                <?php
                require "footer.php";
                ?>
                <!-- footer -->
            </div>
        </div>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        confirm("You have to sign in firstly");
        window.location = "index.php";
    </script>
<?php
}
?>