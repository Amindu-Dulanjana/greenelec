<?php

require "connection.php";

if (isset($_POST["s"])) {

    $search = $_POST["s"];

if(empty($search)){
    echo "Please enter your serching data.";
}else{


    if ($search == "") {

        $rs = Database::search("SELECT * FROM category;");

        $n = $rs->num_rows;

        for ($x = 0; $x < $n; $x++) {
            $c = $rs->fetch_assoc();
?>

            <div class="col-12">
                <a class="link-dark link2" href="#"><?php echo $c["name"]; ?></a>&nbsp;&nbsp;
                <a class="link-dark link3" href="#">See All &rarr;</a>
            </div>

            <?php

            $resultset = Database::search("SELECT * FROM `product` WHERE `category`='" . $c["id"] . "' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0;");
            ?>

            <!-- product view -->

            <div class="col-12">
                <div class="row border border-primary">
                    <div class="col-10 offset-1">
                        <div class="row" id="pdetails">

                            <?php

                            $nr = $resultset->num_rows;
                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resultset->fetch_assoc();

                            ?>

                                <div class="col-12 col-lg-3 mt-4">
                                    <div class="card h-100 cd">

                                        <?php

                                        $pimage = Database::search("SELECT * FROM `images` WHERE product_id = '" . $prod["id"] . "'; ");
                                        $imgn = $pimage->num_rows;
                                        $imgrow = $pimage->fetch_assoc();

                                        if ($imgn > 0) {
                                        ?>
                                            <img src="<?php echo $imgrow["code"]; ?>" class="cardTopImg">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="resources/no-image.jpg" class="cardTopImg">
                                        <?php
                                        }

                                        ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $prod["title"]; ?> <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs.<?php echo $prod["price"]; ?></span>
                                            <br>

                                            <?php

                                            if ((int)$prod["qty"] > 0) {
                                            ?>
                                                <span class="card-text text-warning"><b>In Stock</b></span>
                                                <input value="1" min="0" type="number" class="form-control mb-1" id="qtytxt<?php echo $prod['id']; ?>">
                                                <a href="<?php echo "singleproductview.php?id=" . ($prod["id"]) ?>" class="btn btn-success">Buy Now</a>
                                                <a href="#" class="btn btn-primary" onclick="addToCart(<?php echo $prod['id']; ?>);">Add to cart</a>
                                                <a href="#" class="btn btn-secondary" onclick="addToWatchlist(<?php echo $prod['id'] ?>);"><i class="bi bi-heart-fill"></i></a>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="card-text text-danger"><b>Out of Stock</b></span>
                                                <input value="1" type="number" class="form-control mb-1" disabled>
                                                <a href="#" class="btn btn-success disabled">Buy Now</a>
                                                <a href="#" class="btn btn-danger disabled">Add To Cart</a>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- product view -->
        <?php
        }
    } else {


        $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%' ");
        ?>
        <!-- product view -->

        <div class="col-12">
            <div class="row border border-primary">
                <div class="col-10 offset-1">
                    <div class="row" id="pdetails">

                        <?php

                        $pn = $productrs->num_rows;

                        if ($pn == 0) {
                        ?>
                            <h2 class="mt-3 mb-3 text-center fw-bold">No Results Found!</h2>
                            <?php
                        } else {
                            for ($y = 0; $y < $pn; $y++) {
                                $pd = $productrs->fetch_assoc();

                            ?>

                                <div class="col-12 col-lg-3 mt-4">
                                    <div class="card h-100 cd">

                                        <?php

                                        $pimage = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pd["id"] . "'; ");
                                        $imgn = $pimage->num_rows;
                                        $imgrow = $pimage->fetch_assoc();

                                        if ($imgn > 0) {
                                        ?>
                                            <img src="<?php echo $imgrow["code"]; ?>" class="card-img-top">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="resources/no-image.jpg" class="card-img-top">
                                        <?php
                                        }


                                        ?>

                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $pd["title"]; ?> <span class="badge bg-info">New</span></h5>
                                            <span class="card-text text-primary">Rs.<?php echo $pd["price"]; ?></span>
                                            <br>

                                            <?php

                                            if ((int)$pd["qty"] > 0) {
                                            ?>
                                                <span class="card-text text-warning"><b>In Stock</b></span>
                                                <input value="1" min="0" type="number" class="form-control mb-1" id="qtytxt<?php echo $pd['id']; ?>">
                                                <a href="<?php echo "singleproductview.php?id=" . ($pd["id"]) ?>" class="btn btn-success">Buy Now</a>
                                                <a href="#" class="btn btn-primary" onclick="addToCart(<?php echo $pd['id']; ?>);">Add to cart</a>
                                                <a href="#" class="btn btn-secondary" onclick="addToWatchlist(<?php echo $pd['id'] ?>);"><i class="bi bi-heart-fill"></i></a>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="card-text text-danger"><b>Out of Stock</b></span>
                                                <input value="1" type="number" class="form-control mb-1" disabled>
                                                <a href="#" class="btn btn-success disabled">Buy Now</a>
                                                <a href="#" class="btn btn-danger disabled">Add To Cart</a>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>

        <!-- product view -->
<?php
    }
  }
}
?>