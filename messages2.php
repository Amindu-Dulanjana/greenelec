
<!DOCTYPE html>
<html>

<head>
    <title>eShop | Messages</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->
            <div class="col-12">
                <hr />
            </div>
            <div class="col-12 py-5 px-4">
                <div class="row rounded overflow-hidden shadow">
                    <div class="col-lg-5 col-12 px-0">
                        <div class="bg-white">
                            <div class="bg-light px-4 py-2">
                                <h5 class="mb-0 py-1">Recent</h5>
                            </div>
                            <div class="message-box">
                                <div class="list-group rounded-0">
                                    <a href="#" class="list-group-item list-group-item-action text-white rounded-0 bg-primary">
                                        <div class="media">
                                            <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle" />
                                            <div class="me-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Amindu</h6>
                                                    <small class="small fw-bold">01-10</small>
                                                </div>
                                                <p class="mb-0">Got the product.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12 px-0">
                        <div class="row px-4 py-5 text-white chatbox">
                            <!-- sender's message -->
                            <div class="media mb-3 w-50">
                                <img src="resources/demoProfileImg.jpg" width="50px" class="rounded-circle mb-1" />
                                <div class="media-body me-3">
                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                        <p class="mb-0 text-black-50">Got it. Thankyou!</p>
                                    </div>
                                    <p class="small text-black-50 text-end">22:55 | 17.10.2021</p>
                                </div>
                            </div>
                            <!-- sender's message -->
                            <!-- receiver's message -->
                            <div class="media w-50 mb-3">
                                <div class="media-body">
                                    <div class="bg-primary rounded py-2 px-3 mb-2">
                                        <p class="mb-0 text-white">Have You got the product?</p>
                                    </div>
                                    <p class="small text-black-50 text-end">22:46 | 17.10.2021</p>
                                </div>
                            </div>
                            <!-- receiver's message -->
                            <!-- text -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" placeholder="Type a message..." aria-describedby="sendbtn" class="form-control rounded-0 border-0 py-4 bg-light" />
                                        <div class="input-group-append">
                                            <button id="sendbtn" class="btn btn-link fs-1"><i class="bi bi-cursor-fill"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- text -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php require "footer.php"; ?>
            <!-- footer -->
        </div>
    </div>
</body>

</html>
