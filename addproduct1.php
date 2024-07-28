<?php
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>
   

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <title>e-Shop | Add Product</title>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div id="addProductBox">
                <!-- heading -->
                <div class="col-12 mt-2 mb-3">
                    <h3 class="h2 text-center text-primary">Product Listing</h3>
                </div>
                <!-- heading -->

                <!-- category,brand,model -->
                <div class="col-lg-12 mb-3">
                    <div class="row">

                        <div class="col-12 col-lg-4">
                            <div class="row p-2">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>

                                <div class="col-12">
                                    <select class="form-select shadow-none" name="" id="ca">
                                        <option>Select Category</option>
                                        <?php
                                    $cato = Database::search("SELECT * FROM `category`");
                                    $cat = $cato->num_rows;
                                    for($i=0;$i<$cat;$i++) {
                                        $category = $cato ->fetch_assoc();
                                    

                                ?>
                                        <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?>
                                        </option>
                                        <?php
                                    }
                                        ?>


                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row p-2">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Brand</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select shadow-none" id="br">
                                        <option>Select Brand</option>
                                        <?php
                                        $probrand = Database::search("SELECT * FROM `brand`");
                                        $prob = $probrand->num_rows;
                                        for($i=0;$i<$prob;$i++) {
                                        $pb = $probrand ->fetch_assoc();
                                    

                                        ?>
                                        <option value="<?php echo $pb["id"]; ?>"><?php echo $pb["name"]; ?></option>
                                        <?php
                                            }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row p-2">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Model</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select shadow-none" id="mo">
                                        <option>Select Model</option>
                                        <?php
                                        $umodel = Database::search("SELECT * FROM `model`");
                                        $mod = $umodel->num_rows;
                                        for($i=0;$i<$mod;$i++) {
                                        $model = $umodel ->fetch_assoc();
                                    

                                        ?>
                                        <option value="<?php echo $model["id"]; ?>"><?php echo $model["name"]; ?></option>
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

                <hr class="hrbreak1">

                <!-- title -->
                <div class="col-12 mb-3">
                    <div class="row p-2">
                        <div class="col-12">
                            <label class="form-label lbl1">Add a title to your product</label>
                        </div>
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <input class="form-control" type="text" id="ti">
                        </div>
                    </div>
                </div>
                <!-- title -->

                <hr class="hrbreak1">

                <!-- condition,colour,qty -->
                <div class="col-12 mb-3">
                    <div class="row p-2">
                        <div class="col-lg-4 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Condition</label>
                                </div>

                                <div class="offset-lg-1 col-12 col-lg-3 form-check ms-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault1" id="bn"
                                        checked>
                                    <label class="form-check-label" for="bn">
                                        Brandnew
                                    </label>
                                </div>

                                <div class="offset-lg-1 col-12 col-lg-3 form-check ms-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault1" id="us">
                                    <label class="form-check-label" for="us">
                                        Used
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Colour</label>
                                </div>
                                <div class="col-12">
                                    <div class="row p-2">
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr1" checked>
                                            <label class="form-check-label" for="clr1">
                                                Gold
                                            </label>
                                        </div>
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr2">
                                            <label class="form-check-label" for="clr2">
                                                Silver
                                            </label>
                                        </div>
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr3">
                                            <label class="form-check-label" for="clr3">
                                                Graphite
                                            </label>
                                        </div>
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr4">
                                            <label class="form-check-label" for="clr4">
                                                Pacific Blue
                                            </label>
                                        </div>
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr5">
                                            <label class="form-check-label" for="clr5">
                                                Jet Black
                                            </label>
                                        </div>
                                        <div class="col-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio"
                                                id="clr6">
                                            <label class="form-check-label" for="clr6">
                                                Rose Gold
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Quantity</label>
                                    <input value="0" min="0" class="form-control" type="number" id="qty">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- condition,colour,qty -->

                <hr class="hrbreak1">

                <!-- price, payment method -->
                <div class="col-12">
                    <div class="row p-2">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Cost per Item</label>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest ruppee)"
                                        id="cost">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Approved Payment Methods</label>
                                </div>
                                <div class="col-10 offset-1">
                                    <div class="row">
                                        <div class="col-3 pm1"></div>
                                        <div class="col-3 pm2"></div>
                                        <div class="col-3 pm3"></div>
                                        <div class="col-3 pm4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- price, payment method -->

                <hr class="hrbreak1">

                <!-- delivery cost-->
                <div class="col-12">
                    <div class="row p-2">
                        <div class="col-12">
                            <label class="form-label lbl1">Delivery Cost</label>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="offset-lg-1 col-lg-3 col-12">
                                    <span class="deltxt">Delivery cost within Colombo</span>
                                </div>
                                <div class="col-lg-7 col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control"
                                            aria-label="Amount (to the nearest ruppee)" id="dwc">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="offset-lg-1 col-lg-3 col-12">
                                    <span class="deltxt">Delivery cost out of Colombo</span>
                                </div>
                                <div class="col-lg-7 col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control"
                                            aria-label="Amount (to the nearest ruppee)" id="doc">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- delivery cost-->

                <hr class="hrbreak1">

                <!-- product description -->
                <div class="col-12 mb-3">
                    <div class="row p-2">
                        <div class="col-12">
                            <label class="form-label lbl1">Product Description</label>
                        </div>

                        <div class="col-12">
                            <textarea class="form-control bg-light" cols="100" rows="30" id="desc"></textarea>
                        </div>
                    </div>
                </div>
                <!-- product description -->

                <hr class="hrbreak1">

                <!--product img -->
                <div class="col-12 mb-3">
                    <div class="row p-2">
                        <div class="col-12">
                            <label class="form-label lbl1">Add Product Image</label>
                        </div>

                        <img class="img-fluid col-4 col-md-2 ms-3 img-thumbnail" src="resources/addproductimg.svg" id="prev">

                        <div class="col-12 mt-1">
                            <input class="d-none" type="file" accept="img/*" id="imguploader">
                            <label class="col-4 col-md-2 ms-1 btn btn-primary" for="imguploader" onclick="changeImg();">Upload</label>
                        </div>
                    </div>
                </div>
                <!--product img -->

                <hr class="hrbreak1">

                <!-- notice -->
                <div class="col-12">
                    <div class="row p-2">
                        <div class="col-12">
                            <label class="form-label lbl1">Notice...</label>
                        </div>
                        <div class="col-12">
                            <span>We are taking 5% of the product price from every product as a service charge</span>
                        </div>

                        <!-- save btn -->
                        <div class="col-10 offset-2 offset-md-1 col-md-5 d-grid mt-3">
                            <button class="btn btn-success" onclick="addProduct();">Add Product</button>
                        </div>
                       

                    </div>
                </div>
                <!-- notice -->
            </div>

            <!-- --------------------------------------------------------------------- -->
            
          

            <!-- footer -->
            <?php
            require "footer.php";
            ?>
            <!-- footer -->

        </div>
    </div>

    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>