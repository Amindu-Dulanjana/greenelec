<!DOCTYPE html>
<html>

<head>
    <title>eShop | Admin Singnin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/G_logo.png" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,  #74EBD5 0%, #9FACE6 100%);">

    <div class="container-fluid  fustify-content-center" style="margin-top:150px;">
        <div class="row align-content-center">

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="logot fw-bold ">Greenelec</h1>
                    </div>
                    <div class="col-12 text-center">
                        <span class="text-center title">Hi,Welcome to Greenelec Admins.</span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <div class="text-center title1">Hi, Welcome To eShop Admins</div>
                    </div>
                </div>
            </div> -->

            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background "></div>
                    <div class="col-12 col-lg-6 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title2">Sign In To Your Account.</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control " type="email" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="adminverification();">Send Verification Code to Login</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger">Back to User's Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy;2022 Greenelec.lk All Rights Reserved</p>
            </div>


        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Enter the verification Code you got by an Email...</label>
                    <input type="text" class="form-control" id="v" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="Verify();">Verify</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>