<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../login.php");

require "../koneksidb.php";
/* require "act-displaynyoba.php"; */
}

print_r($_SESSION);
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prebens</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png"> -->

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
    <?php require "headeruser.php"; ?>


    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Hero Area Section:::... -->
    <div class="hero-area">
        <div class="hero-area-wrapper hero-slider-dots fix-slider-dots">
            <!-- Start Hero Slider Single -->
            <div class="hero-area-single">
                <div class="hero-area-bg">
                    <img class="hero-img" src="../header4.jpg" alt="">
                </div>
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-md-8 col-xl-6">
                                <h5>Punya Barang Bekas? Prebens Aja</h5>
                                <h2>Prebens</h2>
                                <br>
                                <a href="shop-grid-jual.php" class="hero-button">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Slider Single -->
            <!-- Start Hero Slider Single -->
            <div class="hero-area-single">
                <div class="hero-area-bg">
                    <img class="hero-img" src="../header2.jpg" alt="">
                </div>
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-10 col-md-8 col-xl-6">
                                <h5>Punya Barang Bekas? Prebens Aja</h5>
                                <h2>Prebens</h2>
                                <br>
                                <a href="shop-grid-sewa.php" class="hero-button">Sewa Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Slider Single -->
        </div>
    </div> <!-- ...:::: End Hero Area Section:::... -->

    <!-- ...:::: Start Product Catagory Section:::... -->
    <!-- ...:::: End Product Catagory Section:::... -->

    <!-- ...:::: Start Product Tab Section:::... -->
    <div class="product-tab-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap">
            <div class="container">
                <div class="row">
                    <div class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                        <h3 class="section-title" data-aos="fade-up" data-aos-delay="0">New Arrivals Produk Dijual</h3>
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Tab Wrapper -->
        <div class="product-tab-wrapper" data-aos="fade-up"  data-aos-delay="50">
            <div class="container">
                <div class="row g-5">
                    <?php $ambil = $conn->query("SELECT * from produk where id_jenis=1 limit 6"); ?>
                    <?php while($perproduk = $ambil->fetch_assoc()){?>
                    <div class="col-4">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active">
                                <div class="product-default-slider product-default-slider-1rows">
                                    <!-- Start Product Defautlt Single -->
                                    <div class="product-default-single border-around">
                                        <div class="product-img-warp">
                                            <a href="product-details.php?id=<?php echo $perproduk['id_produk'];?>" class="product-default-img-link">
                                                <img src="../image/seller/<?php echo $perproduk['image'] ?>" width="320px" height="400px">
                                            </a>
                                            <div class="product-action-icon-link">
                                                <ul>
                                                    <li><a type="button" href="product-details.php?id=<?php echo $perproduk['id_produk'];?>"><i class="icon-eye"></i></a></li>
                                                    <li><a type="button" href="beli.php?id=<?php echo $perproduk['id_produk'];?>&qty=1"><i class="icon-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-default-content">
                                            <h6 class="product-default-link"><a href="product-details.php?id=<?php echo $perproduk['id_produk'];?>"><?php echo $perproduk['nama_produk'] ?></a></h6>
                                            <span class="product-default-price">Rp <?php echo $perproduk['harga']
                                            ?>
                                            </span>
                                        </div> 
                                    </div> <!-- End Product Defautlt Single -->
                                      <!-- Start Product Defautlt Single -->
                                </div>
                            </div>
                            <div class="tab-pane" id="Sewa">
                                <div class="product-default-slider product-default-slider-4grids-1row">
                                    <!-- Start Product Defautlt Single -->
                                     <!-- End Product Defautlt Single -->   
                                </div>
                            </div>                            
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div> <!-- End Catagory Wrapper -->
    </div> <!-- ...:::: End Product Tab Section:::... -->
    <!-- ...:::: Start Product Tab Section:::... -->
    <div class="product-tab-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap">
            <div class="container">
                <div class="row">
                    <div class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                        <h3 class="section-title" data-aos="fade-up" data-aos-delay="0">New Arrivals Produk Disewa</h3>
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Tab Wrapper -->
        <div class="product-tab-wrapper" data-aos="fade-up"  data-aos-delay="50">
            <div class="container">
                <div class="row g-5">
                    <?php $ambil = $conn->query("SELECT * from produk where id_jenis=2 limit 6"); ?>
                    <?php while($perproduk = $ambil->fetch_assoc()){?>
                    <div class="col-4">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active">
                                <div class="product-default-slider product-default-slider-1rows">
                                    <!-- Start Product Defautlt Single -->
                                    <div class="product-default-single border-around">
                                        <div class="product-img-warp">
                                            <a href="product-detailse.php?ids=<?php echo $perproduk['id_produk'];?>" class="product-default-img-link">
                                                <img src="../image/seller/<?php echo $perproduk['image'] ?>" width="320px" height="400px">
                                            </a>
                                            <div class="product-action-icon-link">
                                                <ul>
                                                    <li><a type="button" href="product-detailse.php?ids=<?php echo $perproduk['id_produk'];?>"><i class="icon-eye"></i></a></li>
                                                    <li><a type="button" href="sewa.php?ids=<?php echo $perproduk['id_produk'];?>&qtys=1"><i class="icon-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-default-content">
                                            <h6 class="product-default-link"><a href="product-detailse.php?ids=<?php echo $perproduk['id_produk'];?>"><?php echo $perproduk['nama_produk'] ?></a></h6>
                                            <span class="product-default-price">Rp <?php echo $perproduk['harga']
                                            ?>
                                            </span>
                                        </div> 
                                    </div> <!-- End Product Defautlt Single -->
                                      <!-- Start Product Defautlt Single -->
                                </div>
                            </div>
                            <div class="tab-pane" id="Sewa">
                                <div class="product-default-slider product-default-slider-4grids-1row">
                                    <!-- Start Product Defautlt Single -->
                                     <!-- End Product Defautlt Single -->   
                                </div>
                            </div>                            
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div> <!-- End Catagory Wrapper -->
    </div> <!-- ...:::: End Product Tab Section:::... -->
    <!-- ...:::: Start Product Tab Section:::... -->
    <div class="product-tab-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap">
            <div class="container">
                <div class="row">
                    <div class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                        <h3 class="section-title"  data-aos="fade-up"  data-aos-delay="0">Hot Deals Dijual</h3>
                        <!-- <ul class="tablist nav product-tab-btn" data-aos="fade-up"  data-aos-delay="200" >
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#car_and_drive">Dijual </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#bike">Disewa </a></li>                          
                        </ul>-->
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Tab Wrapper -->
        <div class="product-tab-wrapper" data-aos="fade-up" data-aos-delay="50">
            <div class="container">
                <div class="row g-5">
                    <?php $tampil = $conn->query("SELECT * from produk where id_jenis = 1 limit 6"); ?>
                    <?php while($produk = $tampil->fetch_assoc()){?>
                    <div class="col-4">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active" >
                                <div class="product-default-slider product-default-slider">
                                    <!-- Start Product Defautlt Single -->
                                    <div class="product-default-single border-around">
                                        <div class="product-img-warp">
                                            <a href="product-details.php?id=<?php echo $produk['id_produk'];?>" class="product-default-img-link">
                                                <img src="../image/seller/<?php echo $produk['image'] ?>" width="320px" height="400px">
                                            </a>
                                            <div class="product-action-icon-link">
                                                <ul>
                                                    <li><a href="product-details.php?id=<?php echo $produk['id_produk'];?>"><i class="icon-eye"></i></a></li>
                                                    <li><a href="beli.php?id=<?php echo $produk['id_produk'];?>&qty=1;?>"><i class="icon-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-default-content">
                                            <h6 class="product-default-link"><a href="product-details.php?id=<?php echo $produk['id_produk'];?>"><?php echo $produk['nama_produk'] ?></a></h6>
                                            <span class="product-default-price">Rp <?php echo $produk['harga']
                                            ?></span>
                                        </div>
                                    </div> <!-- End Product Defautlt Single -->
                                </div>
                            </div>                     
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- End Catagory Wrapper -->
    </div> <!-- ...:::: End Product Tab Section:::... -->

    <!-- ...:::: Start Product Tab Section:::... -->
    <div class="product-tab-section section-top-gap-100">
        <!-- Start Section Content -->
        <div class="section-content-gap">
            <div class="container">
                <div class="row">
                    <div class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                        <h3 class="section-title"  data-aos="fade-up"  data-aos-delay="0">Hot Deals Disewa</h3>
                        <!-- <ul class="tablist nav product-tab-btn" data-aos="fade-up"  data-aos-delay="200" >
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#car_and_drive">Dijual </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#bike">Disewa </a></li>                          
                        </ul>-->
                    </div>
                </div>
            </div>
        </div> <!-- End Section Content -->

        <!-- Start Tab Wrapper -->
        <div class="product-tab-wrapper" data-aos="fade-up" data-aos-delay="50">
            <div class="container">
                <div class="row g-5">
                    <?php $tampil = $conn->query("SELECT * from produk where id_jenis = 2 limit 6"); ?>
                    <?php while($produk = $tampil->fetch_assoc()){?>
                    <div class="col-4">
                        <div class="tab-content tab-animate-zoom">
                            <div class="tab-pane show active" >
                                <div class="product-default-slider product-default-slider">
                                    <!-- Start Product Defautlt Single -->
                                    <div class="product-default-single border-around">
                                        <div class="product-img-warp">
                                            <a href="product-detailse.php?ids=<?php echo $produk['id_produk'];?>" class="product-default-img-link">
                                                <img src="../image/seller/<?php echo $produk['image'] ?>" width="320px" height="400px">
                                            </a>
                                            <div class="product-action-icon-link">
                                                <ul>
                                                    <li><a href="product-detailse.php?ids=<?php echo $produk['id_produk'];?>"><i class="icon-eye"></i></a></li>
                                                    <li><a href="sewa.php?ids=<?php echo $produk['id_produk'];?>&qtys=1;?>"><i class="icon-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-default-content">
                                            <h6 class="product-default-link"><a href="product-detailse.php?ids=<?php echo $produk['id_produk'];?>"><?php echo $produk['nama_produk'] ?></a></h6>
                                            <span class="product-default-price">Rp <?php echo $produk['harga']
                                            ?>
                                            </span>
                                        </div>
                                    </div> <!-- End Product Defautlt Single -->
                                </div>
                            </div>                     
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- End Catagory Wrapper -->
    </div> <!-- ...:::: End Product Tab Section:::... -->

    <!-- ...:::: Start Footer Section:::... -->
    <?php require "footer.php"; ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <!-- notif barang masuk ke cart -->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to cart successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="cart.php">View Cart</a>
                                            <a href="checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#" data-bs-dismiss="modal">CONTINUE SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- bates -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickview<?php echo $perproduk['id_produk']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-details-gallery-area">
                                    <div class="product-large-image modal-product-image-large">
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_1.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_2.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_3.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_4.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_5.jpg" alt="">
                                        </div>
                                        <div class="product-image-large-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="product-image-thumb modal-product-image-thumb">
                                        <div class="zoom-active product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_1.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_2.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_3.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_4.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_5.jpg" alt="">
                                        </div>
                                        <div class="product-image-thumb-single">
                                            <img class="img-fluid" src="assets/images/products_images/aments_products_image_6.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details-content-area">
                                    <!-- Start  Product Details Text Area-->
                                    <div class="product-details-text">
                                        <h4 class="title">Nonstick Dishwasher PFOA</h4>
                                        <div class="price"><del>$70.00</del>$80.00</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae</p>
                                    </div> <!-- End  Product Details Text Area-->
                                    <!-- Start Product Variable Area -->
                                    <div class="product-details-variable">
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item">
                                            <span>Color</span>
                                            <div class="product-variable-color">
                                                <label for="modal-product-color-red">
                                                    <input name="modal-product-color" id="modal-product-color-red" class="color-select" type="radio" checked>
                                                    <span class="product-color-red"></span>
                                                </label>
                                                <label for="modal-product-color-tomato">
                                                    <input name="modal-product-color" id="modal-product-color-tomato" class="color-select" type="radio">
                                                    <span class="product-color-tomato"></span>
                                                </label>
                                                <label for="modal-product-color-green">
                                                    <input name="modal-product-color" id="modal-product-color-green" class="color-select" type="radio">
                                                    <span class="product-color-green"></span>
                                                </label>
                                                <label for="modal-product-color-light-green">
                                                    <input name="modal-product-color" id="modal-product-color-light-green" class="color-select" type="radio">
                                                    <span class="product-color-light-green"></span>
                                                </label>
                                                <label for="modal-product-color-blue">
                                                    <input name="modal-product-color" id="modal-product-color-blue" class="color-select" type="radio">
                                                    <span class="product-color-blue"></span>
                                                </label>
                                                <label for="modal-product-color-light-blue">
                                                    <input name="modal-product-color" id="modal-product-color-light-blue" class="color-select" type="radio">
                                                    <span class="product-color-light-blue"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- Product Variable Single Item -->
                                        <div class="variable-single-item ">
                                            <span>Quantity</span>
                                            <div class="product-variable-quantity">
                                                <input min="1" max="100" value="1" type="number">
                                            </div>
                                        </div>
                                    </div> <!-- End Product Variable Area -->
                                    <!-- Start  Product Details Meta Area-->
                                    <div class="product-details-meta mb-20">
                                        <ul>
                                            <li><a href=""><i class="icon-heart"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="icon-repeat"></i>Compare</a></li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-shopping-cart"></i>Add To Cart</a></li>
                                        </ul>
                                    </div> <!-- End  Product Details Meta Area-->
                                    <!-- Start  Product Details Social Area-->
                                    <ul class="modal-product-details-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul> <!-- End  Product Details Social Area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->

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
    <script src="scriptcart.js"></script>

</body>

</html>