<!DOCTYPE html>
<html>

<head>
  <title>eShop Home</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="icon" href="new resources/logo.svg" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">



</head>

<body>



  <div class="container-fluid">

    <div class="row">

      <!-- Header -->

      <?php
      require "header.php";

      ?>


      <!-- header close -->

      <!-- hr -->

      <hr class="hrbreak1" />


      <!-- search -->

      <div class="col-12 justify-content-center">
        <div class="row mb-3">
          <div class="offset-lg-1 col-12 col-lg-1 mt-2 mt-lg-0 logoimage" style="background-position: center;"></div>

          <div class="col-8 col-lg-6 ">
            <div class="input-group input-group-lg col- mb-3 mt-3">
              <input type="text" class="form-control" aria-label="Text input with dropdown button" id="search">


              <select class="btn btn-outline-primary" id="basic_search_select">
                <option value="0">Category</option>

                <?php
                require "connection.php";

                $rs = Database::search("SELECT * FROM `category`;");
                $n = $rs->num_rows;


                for ($i = 1; $i < $n; $i++) {
                  $cat = $rs->fetch_assoc();

                ?>


                  <option class="dropdown-item" value=<?php echo $cat["id"]; ?>><?php echo $cat["name"]; ?></option>

                <?php

                }

                ?>
              </select>
            </div>
          </div>

          <div class="col-2 d-grid">
            <button class="btn btn-primary mt-3 searchbutton" onclick="basicSearch();">Search</button>
          </div>

          <div class="col-2 mt-4">
            <a class="link-secondary link1" href="advancedSearch.php">Advanced</a>
          </div>

        </div>
      </div>
      <!-- search close -->

      <!-- hr -->
      <hr class="hrbreak1" />

      <!-- slider -->
      <div class="col-12 d-none d-lg-block" id="slider">
        <div class="row ">

          <div id="carouselExampleCaptions" class="carousel slide offset-2 col-8" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="new resources/slider images/posterimg.jpg" class="d-block  posterimg1">
                <div class="carousel-caption d-none d-md-block postercaption">
                  <h5 class="postertitle">Welcome to eShop</h5>
                  <p class="postertext">The World Best Online Store By One Click . </p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="new resources/slider images/posterimg2.jpg" class="d-block posterimg1">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="new resources/slider images/posterimg3.jpg" class="d-block  posterimg1">
                <div class="carousel-caption d-none d-md-block postercaption1">
                  <h5 class="postertitle">Be Free....</h5>
                  <p class="postertext">Experience the Lowest Delivery Cost With Us.</p>
                </div>
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" cl data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>

      </div>
      <div class="col-12" id="view"></div>

      <!-- slider close -->
      <!-- product view -->


      <!-- product view close -->

      <!-- products -->


      <?php

      $rs = Database::search("SELECT * FROM category;");

      $n = $rs->num_rows;

      for ($x = 0; $x < $n; $x++) {
        $c = $rs->fetch_assoc();
      ?>



        <div class="col-12" id="pcat">
          <a class="link-dark link2" href="#"><?php echo $c["name"]; ?></a>&nbsp;&nbsp;
          <a class="link-dark link3" href="#">See All &rarr;</a>
        </div>
        <!-- <div class="col-12">
          <div class="row border border-primary">
            <div class="col-10 offset-1">
              <div class="row" id="pdetails">
              </div>
            </div>
          </div>
        </div> -->

        <?php

        $resultset = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $c["id"] . "' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0;");
        ?>

        <!-- product view -->

        <div class="col-12" id="pshow">
          <div class="row border border-primary">
            <div class="col-10 offset-1">
              <div class="row" id="pdetails">

                <?php

                $nr = $resultset->num_rows;
                for ($y = 0; $y < $nr; $y++) {
                  $prod = $resultset->fetch_assoc();

                ?>

                  <div class=" col-6 col-lg-3  mb-2">
                    <div class="card  " style="width: 18.5rem; ">

                      <?php

                      $pimage = Database::search("SELECT * FROM `images` WHERE product_id = '" . $prod["id"] . "'; ");
                      $imgrow = $pimage->fetch_assoc();

                      ?>
                      <img src="<?php echo $imgrow["code"]; ?>" class="   cardTopImg">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $prod["title"]; ?> <span class="badge bg-info">New</span></h5>
                        <span class="card-text text-primary">Rs.<?php echo $prod["price"]; ?></span>
                        <br>

                        <?php

                        $pstatus = Database::search("SELECT * FROM `status` WHERE `id` = '" . $prod["status_id"] . "'; ");
                        $statusrow = $pstatus->fetch_assoc();
                        ?>


                        <?php
                        if ((int)$prod["qty"] > 0) {
                        ?>

                          <span class="card-text text-warning">In Stock</span>


                          <input type="number" class="form-control mb-1" id="qtytxt<?php echo $prod['id']; ?>" Value=<?php echo $prod["qty"]; ?> />
                          <a href="<?php echo "singleproductview.php?id=" . ($prod["id"]) ?>" class="btn btn-success">Buy Now</a>
                          <a href="#" class="btn btn-danger" onclick="AddToCart(<?php echo $prod['id']; ?>);">Add Cart</a>
                          <a class="btn btn-secondary" onclick="addToWatchlist(<?php echo $prod['id']; ?>);"><i class="bi bi-heart-fill"></i></a>

                        <?php
                        } else {
                        ?>
                          <span class="card-text text-danger">Out of Stock</span>


                          <input type="number" class="form-control mb-1 text-danger" value="0" disabled />
                          <a href="#" class="btn btn-success col-12 col-lg-5 me-3">Buy Now</a>
                          <a href="#" class="btn btn-danger  mt-1">Add To Cart</a>
                          <a href="#" class="btn  "><i class="bi bi-heart-fill"></i></a>

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



      <?php
      }

      ?>


      <!-- products close -->

      <!-- footer -->

      <?php
      require "footer.php";
      ?>

      <!-- footer close -->


    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>