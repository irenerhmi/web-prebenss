<?php

if(!isset($_SESSION['username'])){
    header("location: login.php");
}
?>
<div>
<nav>
    <ul>
        <li class="has-dropdown">
            <a class="main-menu-link" href="dashuser.php">Home</i></a>
        </li>
        <li class="has-dropdown has-megaitem">
            <a href="product-details-default.html">Produk <i class="fa fa-angle-down"></i></a> 
            <!-- Mega Menu -->
            <div class="mega-menu">
                <ul class="mega-menu-inner">
                    <!-- Mega Menu Sub Link -->
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-item-title">Kategori Produk Dijual</a>
                        <ul class="mega-menu-sub">
                            <?php
                            $ambil = $conn->query("SELECT * from kategori");
                            while($pecah = $ambil->fetch_assoc()){
                            ?>
                            <li><a href="shop-kat-jual.php?id=<?php echo $pecah['id_kategori'];?>"><?php echo $pecah['k_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-item-title">Kategori Produk Disewa</a>
                        <ul class="mega-menu-sub">
                            <?php
                            $ambil = $conn->query("SELECT * from kategori");
                            while($pecah = $ambil->fetch_assoc()){
                            ?>
                            <li><a href="shop-kat-sewa.php?id=<?php echo $pecah['id_kategori'];?>"><?php echo $pecah['k_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <!-- Mega Menu Sub Link -->
                    <li class="mega-menu-item">
                        <a href="#" class="mega-menu-item-title">Produk</a>
                        <ul class="mega-menu-sub">
                            <li><a href="shop-grid-jual.php">Produk Dijual</a></li>
                            <li><a href="shop-grid-sewa.php">Produk Disewa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <a href="donasi.php">Donasi</a>
        </li>
        <li class="has-dropdown">
            <a href="acc-profile.php">My Account <i class="fa fa-angle-down"></i></a>
            <!-- Sub Menu -->
            <ul class="sub-menu">
                <li><a href="acc-profile.php">Profile</a></li>
                <li><a href="riwayat.php">Riwayat Transaksi</a></li>
                <li><a href="../logout.php">Log Out</a></li>
            </ul>
        </li>
        <li>
            <a href="ajukan-jual.php">Buka Toko</a>
        </li>
    </ul>
</nav>							
</div>