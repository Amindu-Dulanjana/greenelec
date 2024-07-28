<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="col-12 bg-light border-top border-bottom border-2 border-warning">
        <div class="row mt-1">
        <div class="col-12 col-lg-2"><h2 class="fw-bold mt-lg-2 logot">Greenelec</h2></div>
            <div class="col-12 col-md-6 col-lg-6 mt-lg-3 mt-md-1 mb-1 mb-md-0 mb-lg-0 align-self-start text-nowrap text-lg-center">
                <span class="text-start label1"><b>Welcome</b>
                    <?php
                    if (isset($_SESSION["u"])) {
                        $u = $_SESSION["u"];
                        echo $u["fname"];
                    ?>
                        | <span class="text-start label2" onclick="signOut();">Sign Out</span>
                    <?php
                    } else {
                    ?>
                        <a href="index.php">Hi! Sign in or register</a>
                    <?php
                    }
                    ?>
                </span> |
                <span class="text-start label2">Help and Contact</span>
            </div>
            <div class="col-12 col-md-6 col-lg-3 offset-lg-1 align-self-end" style="text-align: center;">
                <div class="row mb-1">
                    <div class="col-1 col-lg-2 col-md-3 mt-1 ">
                        <span class="text-start label2" onclick="goToAddProduct();">Sell</span>
                    </div>
                    <div class="col-2 col-md-6 col-lg-7 mb-1 dropdown">
                        <button class="btn btn-outline-success dropdown-toggle fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            All Greenelec
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item fw-bold" href="watchlist.php">Wishlist</a></li>
                            <li><a class="dropdown-item fw-bold" href="purchasehistory.php">Purchase History</a></li>
                            <li><a class="dropdown-item fw-bold" href="messages.php">Message</a></li>
                            <li><a class="dropdown-item fw-bold" href="sellerproductview.php">My Products</a></li>
                            <li><a class="dropdown-item fw-bold" href="userprofile.php">My Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="#">My Sellings</a></li> -->
                        </ul>
                    </div>
                    <div class="col-1 col-md-1 col-lg-3 ms-5 ms-lg-0 carticon" onclick="cart();"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>