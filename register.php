<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prebens - Register</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <!--<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">-->


    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->



</head>

<body>
    <!-- ...:::: Start Header Section:::... -->
    <?php require "header.php";?>

    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                        <h3 class="breadcrumb-title">Register</h3>
                        <div class="breadcrumb-nav">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <li class="active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up"  data-aos-delay="200">
                        <h3>Register</h3>
                        <form method="POST" action="cekregister.php" autocomplete="off">
                            <!-- <label> <br></label>                        
                            <input type="file" name="imgprofile"> -->                         
                            <div class="default-form-box mb-20">
                                <label>Username <span>*</span></label>
                                <input name="username" type="text" placeholder="Masukkan Username">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Email address <span>*</span></label>
                                <input name="email" type="email" placeholder="Masukkan Email">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Name <span>*</span></label>
                                <input name="name" type="text" placeholder="Masukkan Nama">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Phone <span>*</span></label>
                                <input name="phone" type="text" placeholder="Masukkan Nomor Telfon">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Passwords <span>*</span></label>
                                <input name="password" type="password" placeholder="password">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Alamat <span>*</span></label>
                                <input name="alamat" type="text" placeholder="Masukkan Alamat">
                            </div>
                            <div class="login_submit">
                                <button name="submit" type="submit" value="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <?php require "footer.php";?>
    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
