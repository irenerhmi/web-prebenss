<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prebens - Donasi</title>

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
    <?php require "headeruser.php";?>

    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                        <h3 class="breadcrumb-title">Donasi</h3>
                        <div class="breadcrumb-nav">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="dashuser.php">Home</a></li>                            
                                    <li class="active" aria-current="page">Donasi</li>
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
                        <h3>Donasi</h3>
                        <form action="cekdonasi2.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="default-form-box mb-20">
                                <label>Foto Barang <span>*</span></label>
                                <input name="imgbarang" type="file" value="">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Nama Barang <span>*</span></label>
                                <input name="barang" type="text" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Deskripsi <span>*</span></label>
                                <input name="deskripsi" type="text" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="default-form-box mb-20" class="has-dropdown">
                                <label for="select">Kategori <span>*</span></label>
                                <input type="text" name="kat" list="listkat" placeholder="Pilih Kategori Produk">
                                <datalist id="listkat">
                                    <select name="id_ongkir" class="form-control">
                                        <option value="">Pilih Ongkos Kirim</option>
                                        <?php
                                        $ambil = $conn->query("SELECT * from kategori");
                                        while($pecah = $ambil->fetch_assoc()){
                                        ?>                                      
                                        <option value="<?php echo $pecah['id_kategori'] ?>">
                                            <?php echo $pecah['k_name']?>
                                        </option>
                                        <?php } ?>
                                    </select>
                            </datalist>
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Berat (g)  <span>*</span></label>
                                <input name="berat" type="number" placeholder="Masukkan Berat">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Jumlah <span>*</span></label>
                                <input name="jumlah" type="number" placeholder="Masukkan Jumlah Barang">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Tanggal Kirim <span>*</span></label>
                                <input name="tglkirim" type="date" placeholder="Masukkan Tanggal Kirim">
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Alamat Pengiriman <span>*</span></label>
                                <input name="alamat" type="text" placeholder="Masukkan Alamat Kirim" list="listalamat">
                                    <datalist id="listalamat">
                                        <select>
                                            <option value="Jl. Nangka no.7 Jakarta Barat">
                                            <option value="Ruko Jeruk, Arcamanik, Bandung">
                                            <option value="Jl. Bintang 8, Jawa Tengah">
                                        </select>
                                    </datalist>
                            </div>
                            <div class="login_submit">
                                <button name="submit" type="submit" value="submit">Submit Donasi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

    <!-- untuk nangkep data dan insert ke database -->
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
