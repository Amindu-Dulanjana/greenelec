<?php

session_start();

require "connection.php";


if (isset($_SESSION["product"])) {
    $productrow = Database::search("SELECT * FROM `product` WHERE `id` = '" . $_SESSION["product"]["id"] . "'");
    $product = $productrow->fetch_assoc();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Update Product</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/G_logo.png" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <div class="container-fluid">
            <div class="row gy-3">



                <div class="col-12">
                    <div class="row gy-3">
                        <!-- heading -->
                        <div class="col-12 mt-5 mb-2">
                            <h3 class="h1 text-center text-primary">Update Product</h3>
                        </div>
                        <!-- heading -->


                        <!-- category,brand,model -->
                        <div class="col-lg-12">
                            <div class="row mb-3">
                                <!-- category -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Category</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="category" disabled>

                                                <?php
                                                $categ = Database::search("SELECT * FROM `category` WHERE `id`='" . $product["category_id"] . "'");
                                                $category = $categ->fetch_assoc();

                                                ?>
                                                <option value="0"><?php echo $category["name"] ?></option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- category -->

                                <?php
                                $mhb = Database::search("SELECT * FROM `model_has_brand` WHERE `id`='" . $product["model_has_brand_id"] . "'");
                                $mhbr = $mhb->fetch_assoc();

                                ?>

                                <!-- brand -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Brand</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="brand" disabled>
                                                <?php
                                                $brnd = Database::search("SELECT * FROM `brand` WHERE `id`='" . $mhbr["brand_id"] . "'");
                                                $brand = $brnd->fetch_assoc();

                                                ?>
                                                <option value="0"><?php echo $brand["name"] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- brand -->

                                <!-- model -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Model</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="model" disabled>
                                                <?php
                                                $modl = Database::search("SELECT * FROM `model` WHERE `id`='" . $mhbr["model_id"] . "'");
                                                $model = $modl->fetch_assoc();

                                                ?>
                                                <option value="0"><?php echo $model["name"] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- model -->
                            </div>
                        </div>
                        <!-- category,brand,model -->

                        <hr class="hrbreak">

                        <!-- title -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Update the Title of Your Product</label>
                                </div>
                                <div class="offset-lg-2 col-12 col-lg-8 mb-3">
                                    <input type="text" class="form-control" id="title" value="<?php echo $product["title"]; ?>" />
                                </div>
                            </div>
                        </div>
                        <!-- title -->

                        <hr class="hrbreak">

                        <!-- condition,color,quantity -->
                        <div class="col-12">
                            <div class="row">
                                <!-- condition -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Condition</label>
                                        </div>
                                        <?php
                                        $cndtn = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product['condition_id'] . "'");
                                        $condition = $cndtn->fetch_assoc();

                                        if ($condition["name"] == "Brandnew") {
                                        ?>
                                            <div class="offset-1 col-10 col-lg-3 form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="new" checked disabled>
                                                <label class="form-check-label" for="new">
                                                    Brandnew
                                                </label>
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="offset-1 col-10 col-lg-3 form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="used" checked disabled>
                                                <label class="form-check-label" for="used">
                                                    Used
                                                </label>
                                            </div>
                                        <?php
                                        }

                                        ?>


                                    </div>
                                </div>
                                <!-- condition -->

                                <!-- color -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Colour</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <?php
                                                $clr = Database::search("SELECT * FROM `color` WHERE `id`='" . $product["color_id"] . "'");
                                                $color = $clr->fetch_assoc();
                                                ?>
                                                <div class="offset-1 col-10 col-lg-3  form-check">
                                                    <input class="form-check-input" type="radio" value="" id="color" name="colorRadio" disabled checked>
                                                    <label class="form-check-label" for="color">
                                                        <?php echo $color["name"] ?>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- color -->

                                <!-- quantity -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Change Product Quantity</label>
                                            <input class="form-control" type="number" value="<?php echo $product["qty"]; ?>" min="0" id="qty" />
                                        </div>
                                    </div>
                                </div>
                                <!-- quantity -->

                            </div>
                        </div>
                        <!-- condition,color,quantity -->

                        <hr class="hrbreak">

                        <!-- cost,payment_method -->
                        <div class="col-12">
                            <div class="row">
                                <!-- cost -->
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Cost Per Item</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost" value="<?php echo $product["price"]; ?>" disabled>
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- cost -->

                                <!-- payment_method -->
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Approved Payments Methods</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="offset-2 col-2 pm pm1"></div>
                                                <div class="col-2 pm pm2"></div>
                                                <div class="col-2 pm pm3"></div>
                                                <div class="col-2 pm pm4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- payment_method -->
                            </div>
                        </div>
                        <!-- cost,payment_method -->

                        <hr class="hrbreak">

                        <!-- delivery cost -->
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Delivery Cost</label>
                                        </div>
                                        <div class="offset-lg-1 col-12 col-lg-3">
                                            <label class="form-label">Delivery Cost Within Colombo</label>
                                        </div>
                                        <div class="col-12 col-lg-7">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["delivery_fee_colombo"]; ?>" id="colombo">
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
                                        <div class="offset-lg-1 col-12 col-lg-3 mt-lg-4">
                                            <label class="form-label">Delivery Cost Out of Colombo</label>
                                        </div>
                                        <div class="col-12 col-lg-7 mt-lg-4">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="notcolombo" value="<?php echo $product["delivery_fee_other"]; ?>">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- delivery cost -->

                        <hr class="hrbreak">

                        <!-- description -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Product Description</label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" cols="100" rows="30" style="background-color: whitesmoke;" id="description"><?php echo $product["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- description -->

                        <hr class="hrbreak">


                        <!-- product image -->
                        <div class="col-12">
                            <div class="row">
                                <?php
                                $img = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                $in = $img->num_rows;
                                
                                
                                    $ir = $img->fetch_assoc();
                                    $arr=$ir["code"];
                                    $arr1=$ir["code1"];
                                    $arr2=$ir["code2"];

                                
                                ?>
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mt-3" >
                                            <?php
                                            if (isset($arr)) {
                                                
                                            ?>
                                                <img src="<?php echo $arr; ?>" class="col-5 col-lg-6 img-thumbnail productimg ms-2" id="prev">
                                            <?php
                                            } else {
                                            ?>
                                                <img class="col-5 col-lg-6 productimg ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev" />
                                            <?php
                                            }
                                            ?>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mt-2">
                                                        <div class="row">
                                                            <div class="col-12"><input type="file" accept="img/*" class="d-none" id="imguploader" />
                                                                <label class="btn btn-primary ms-2 col-5 col-lg-12" for="imguploader" onclick="changeImg();">Upload 01</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-3" >
                                            <?php
                                            
                                            if (isset($arr1)) {
                                                
                                            ?>
                                                <img src="<?php echo $arr1; ?>" class="col-5 col-lg-6 img-thumbnail productimg ms-2" id="prev1">
                                            <?php
                                            } else {
                                            ?>
                                                <img class="col-5 col-lg-6 productimg ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev1" />
                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mt-2">
                                                        <div class="row">
                                                            <div class="col-12"><input type="file" accept="img/*" class="d-none" id="imguploader1" />
                                                                <label class="btn btn-primary ms-2 col-5 col-lg-12" for="imguploader1" onclick="changeImg1();">Upload 02</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-3" >
                                            <?php
                                           
                                            if (isset($arr2)) {
                                                $ir = $img->fetch_assoc();
                                            ?> 
                                                <img src="<?php echo $arr2; ?>" class="col-5 col-lg-6 img-thumbnail productimg ms-2" id="prev2">
                                            <?php
                                            } else {
                                            ?>
                                               <img class="col-5 col-lg-6 productimg ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev2" />
                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 col-lg-6 mt-2">
                                                        <div class="row">
                                                            <div class="col-12"><input type="file" accept="img/*" class="d-none" id="imguploader2" />
                                                                <label class="btn btn-primary ms-2 col-5 col-lg-12" for="imguploader2" onclick="changeImg2();">Upload 03</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- product image -->

                        <hr class="hrbreak">

                        <!-- notice -->
                        <div class="col-12">
                            <label class="form-label lbl1">Notice...</label>
                            <br>
                            <label class="form-labe">We are taking 5% of the product price from every product as a service charge.</label>
                        </div>
                        <!-- notice -->

                        <!--  buttons -->
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid">
                                    <button class="btn btn-warning fw-bold searchbtn" onclick="updateProduct();">Update Product</button>
                                </div>

                            </div>
                        </div>
                        <!--  buttons -->
                    </div>
                </div>



                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                <!-- footer -->
                <?php
                require 'footer.php';
                ?>
                <!-- footer -->
            </div>

        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
}
?>