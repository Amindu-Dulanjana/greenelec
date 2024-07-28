<?php
require "connection.php";

if(empty($_GET["t"]) && empty($_GET["s"])){
    echo "error";
}else{

$seachText = $_GET["t"];
$seachSelect = $_GET["s"];

$results_per_page = 4;

$pageno = $_GET["p"];

if (!empty($seachText) && $seachSelect == 0) { //only text
    $product = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $seachText . "%'");
    $d = $product->num_rows;
    $row = $product->fetch_assoc();
    $results_per_page = 4;
    $number_of_pages = ceil($d / $results_per_page);
    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $seachText . "%' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $n = $textSearch->num_rows;
} else if ($seachSelect != 0 && empty($seachText)) { //only Select
    $product = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "'");
    $d = $product->num_rows;
    $row = $product->fetch_assoc();
    $results_per_page = 4;
    $number_of_pages = ceil($d / $results_per_page);
    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `category_id` LIKE '%" . $seachSelect . "%' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $n = $textSearch->num_rows;
} else if (!empty($seachText) && $seachSelect != 0) { //both select & text
    $product = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' AND `title` LIKE '%" . $seachText . "%'");
    $d = $product->num_rows;
    $row = $product->fetch_assoc();
    $results_per_page = 4;
    $number_of_pages = ceil($d / $results_per_page);
    $page_first_result = ((int)$pageno - 1) * $results_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' AND `title` LIKE '%" . $seachText . "%' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $n = $textSearch->num_rows;
}
?>
<div class="col-12 mt-2">
    <div class="row border border-primary mb-5">
        <div class="col-12 col-lg-12">
            <div class="row justify-content-center">
                <?php

                for ($y = 0; $y < $n; $y++) {
                    $prod = $textSearch->fetch_assoc();

                    $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prod["id"] . "'");
                    $imgrow = $pimage->fetch_assoc();
                ?>
                    <!-- card -->
                    <div class="card col-6 col-lg-2 mt-1 mb-1 ms-1" style="width: 18.5rem;">
                        <img src="<?php echo $imgrow["code"]; ?>" class="cardTopImg" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prod["title"]; ?> <span class="badge bg-info">New</span></h5>
                            <span class="card-text text-primary">Rs. <?php echo $prod["price"]; ?> .00</span><br />
                            <?php
                            if ((int)$prod["qty"] > 0) {
                            ?>
                                <span class="card-text text-warning"><b>In Stock</b></span>
                                <input type="number" value="1" class="form-control mb-1" min="0" id="qtytxt<?php echo $prod['id']; ?>" />
                                <a href="<?php echo  "singleproductview.php?id=" . ($prod['id']); ?>" class="btn btn-success">Buy Now</a>
                                <a class="btn btn-primary" onclick="addToCart(<?php echo $prod['id']; ?>);">Add Cart</a>
                                <a class="btn btn-secondary" onclick="addToWatchlist(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill fs-6"></i></a>
                            <?php
                            } else {
                            ?>
                                <span class="card-text text-danger"><b>Out of Stock</b></span>
                                <input type="number" value="0" class="form-control mb-1" min="0" disabled />
                                <a class="btn btn-success" disabled>Buy Now</a>
                                <a href="#" class="btn btn-danger" disabled>Add Cart</a>
                                <a class="btn btn-secondary" disabled><i class="bi bi-heart-fill fs-6"></i></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- card -->
                <?php
                }
                ?>
                <!-- pagination -->
                <div class="col-12 mb-3 mt-3">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        if ($pageno != 1) {
                        ?>
                            <button class=" btn btn-dark" onclick="basicSearch(<?php echo $pageno - 1; ?>);">&laquo;</button>
                            <?php
                        }

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                            ?>
                                <button class="ms-1 btn btn-dark" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                            <?php
                            } else {
                            ?>
                                <button class="ms-1 btn btn-dark" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($pageno < $number_of_pages) {
                        ?>
                            <button class="ms-1 btn btn-dark" onclick="basicSearch(<?php echo $pageno + 1; ?>);">&raquo;</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</div>
<?php
}
?>