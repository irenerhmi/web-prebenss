<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prebens - Ajukan Jual</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">


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
    <?php include 'headeruser.php';?>
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                        <h3 class="breadcrumb-title">Ajukan Jual</h3>
                        <div class="breadcrumb-nav">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Ajukan Jual</li>
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
                        <h3>Masukkan Informasi Produk</h3>
                        <form method="POST" action="upload.php" enctype="multipart/form-data">
                            <div class="default-form-box mb-20">
                                <label>Nama Produk <span>*</span></label>
                                <input name="nama_produk" type="text" placeholder="Masukkan Nama Produk">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Deskripsi <span>*</span></label>
                                <input name="deskripsi" type="text" placeholder="Masukkan Deskripsi">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Spesifikasi <span>*</span></label>
                                <input name="spesifikasi" type="text" placeholder="Masukkan Spesifikasi">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Berat <span>*</span></label>
                                <input name="berat" type="number" placeholder="Masukkan Berat">
                            </div>
                            <div class="default-form-box mb-20">
                                <label for="inputGambar">Select image to upload: <span>*</span></label>
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Status <span>*</span></label>
                                <input name="status" type="text" placeholder="Status Produk">
                            </div>
                            <div class="default-form-box mb-20" class="has-dropdown">
                                <label for="select">Kategori <span>*</span></label>
                                <br>
                                <input type="text" name="kat" list="listkat" placeholder="Pilih Kategori Produk">
                                <datalist id="listkat">
                                    <select>
                                        <option value=1>Elektronik & Gadget</option>
                                        <option value=2>Olahraga</option>
                                        <option value=3>Mobil</option>
                                        <option value=4>Motor</option>
                                        <option value=5>Keperluan Rumah Tangga</option>
                                    </select>
                               </datalist>
                            </div>
                            <br>
                            <br>
                            <div class="login_submit">
                                <button name="submit" value="submit" type="submit">Submit Informasi Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Ajukan jual area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <?php include 'footer.php';?>
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