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
    <title>Prebens - Riwayat Beli </title>

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

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                        <h3 class="breadcrumb-title">My Account</h3>
                        <div class="breadcrumb-nav">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                    <li class="active" aria-current="page">Profile</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account_dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" >
                        <ul  class="nav flex-column dashboard-list">
                            <li><a href="acc-profile.php"  class="nav-link">Profile</a></li>
                            <li><a href="ajukan-jual"  class="nav-link ">Ajukan Jual</a></li>
                            <li><a href="ajukan-sewa.php"  class="nav-link ">Ajukan Sewa</a></li>
                            <li><a href="#orders"  class="nav-link active">Pesanan Produk Jual</a></li>
                            <li><a href="pesanan-sewa.php"  class="nav-link">Pesanan Produk Sewa</a></li>
                            <li><a href="../logout.php" class="nav-link">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes Riwayat Pending -->
                    <div class="tab-content dashboard_content" data-aos="fade-up"  data-aos-delay="200" >
                        <div class="tab-pane fade show active" id="orders">
                            <h4>Pesanan Pending</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $idsup = $_SESSION['id_supplier'];
                                    ?>
                                    <tbody>
                                        <?php 
                                        $nomor = 1;

                                        $sql2 = "SELECT p.id_supplier as idsup, p.id_jenis as idjenis,t.id_transaksi as id_transaksi, t.status_trans as status_trans,t.tgl_transaksi as tgl_trans , t.total_trans as total_trans 
                                            FROM dilakukan d 
                                            LEFT JOIN transaksi t on d.id_transaksi=t.id_transaksi 
                                            LEFT JOIN produk p on d.id_produk=p.id_produk 
                                            WHERE p.id_supplier=$idsup AND p.id_jenis=1 AND t.status_trans ='Menunggu Pengiriman'";

                                        $ambil2 = mysqli_query($conn, $sql2); 
                                        $rowsl2 = mysqli_fetch_array($ambil2);
                                        

                                        while($perproduk2 = $ambil2->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $perproduk2['tgl_trans'] ?></td>
                                            <td><span class="success"><?php echo $perproduk2['status_trans']; ?></span></td>
                                            <td>Rp. <?php echo number_format($perproduk2['total_trans']); ?></td>
                                            <td>
                                                <a href="pengiriman.php?id=<?php echo $perproduk2['id_transaksi']; ?>" class="btn btn-danger" name="bayar">Pengiriman</a>
                                            </td>
                                        </tr>
                                        <?php 
                                        $nomor++;
                                        }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                    <!-- Tab panes Riwayat Dikirim -->
                            <br>
                            <br>
                            <h4>Pesanan Diproses</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <form action="diterima.php" method="POST">
                                    <tbody>
                                        <?php 
                                        $nomor = 1;

                                        $sql1 = "SELECT t.id_transaksi as id_transaksi, t.status_trans as status_trans,t.tgl_transaksi as tgl_trans , t.total_trans as total_trans FROM dilakukan d 
                                            JOIN transaksi t on d.id_transaksi=t.id_transaksi 
                                            JOIN produk p on d.id_produk=p.id_produk 
                                            WHERE p.id_supplier=$idsup AND p.id_jenis=1 AND t.status_trans='Pesanan Dikirim'";

                                        $ambil1 = mysqli_query($conn, $sql1); 
                                        $rowsl1 = mysqli_fetch_array($ambil1);
                                        

                                        while($perproduk1 = $ambil1->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $perproduk1['tgl_trans'] ?></td>
                                            <td><span class="success"><?php echo $perproduk1['status_trans']; ?></span></td>
                                            <td>Rp. <?php echo number_format($perproduk1['total_trans']); ?></td>
                                        </tr>
                                        <?php 
                                        $nomor++;
                                        }
                                        ?>      
                                    </tbody>
                                    </form>
                                </table>
                            </div>
                    <!-- Tab panes Riwayat Review -->
                            <br>
                            <br>
                            <h4>Pesanan Selesai</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                        $nomor = 1;

                                        $sql = "SELECT t.id_transaksi as id_transaksi, t.status_trans as status_trans,t.tgl_transaksi as tgl_trans , t.total_trans as total_trans FROM dilakukan d 
                                            JOIN transaksi t on d.id_transaksi=t.id_transaksi 
                                            JOIN produk p on d.id_produk=p.id_produk 
                                            WHERE p.id_supplier=$idsup AND p.id_jenis=1 AND t.status_trans='Pesanan Diterima'";

                                        $ambil = mysqli_query($conn, $sql); 
                                        $rowsl = mysqli_fetch_array($ambil);
                                        

                                        while($perproduk = $ambil->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $perproduk['tgl_trans'] ?></td>
                                            <td><span class="success"><?php echo $perproduk['status_trans']; ?></span></td>
                                            <td>Rp. <?php echo number_format($perproduk['total_trans']); ?></td>
                                        </tr>
                                        <?php 
                                        $nomor++;
                                        }
                                        ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>  
            </div>              
        </div>   
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
    <!-- ...:::: Start Footer Section:::... -->
    <?php require "footer.php"; ?>
    <!-- ...:::: End Footer Section:::... -->

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
                                            <a href="cart.html">View Cart</a>
                                            <a href="checkout.html">Checkout</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickview" tabindex="-1" role="dialog" aria-hidden="true">
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



</body>

</html>

</body>
