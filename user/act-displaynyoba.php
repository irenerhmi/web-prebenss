<?php 
function component($productimage, $productname, $productprice){
    $element = "

        
        <div class="col-12">
            <div class="tab-content tab-animate-zoom">
                <div class="tab-pane show active" id="car_and_drive">
                    <div class="product-default-slider product-default-slider-4grids-1row">    
                        <div class="product-default-single border-around">
                            <form method="POST" action="index.php">
                                <div class="product-img-warp">
                                    <a href="product-details-default.php" class="product-default-img-link">
                                        <img src="../image/seller/<?php echo $row['image'] ?>" alt="" class="product-default-img img-fluid">
                                    </a>
                                    <div class="product-action-icon-link">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="icon-heart"></i></a></li>
                                            <li><a href="compare.html"><i class="icon-repeat"></i></a></li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-eye"></i></a></li>
                                            <li><button type="submit" name="add"><a href="" data-bs-toggle="modal" data-bs-target="#modalAddcart"><i class="icon-shopping-cart"></i></a></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-default-content">
                                    <h6 class="product-default-link"><a href="product-details-default.php"><?php echo $row['nama_produk'] ?></a></h6>
                                    <span class="product-default-price"><del class="product-default-price-off">Rp <?php echo $row['harga_jual'] ?></del> Rp
                                        <?php 
                                        $har = $row['harga_jual'];
                                        $diskon = (int)$har-(5/100*(int)$har);
                                        echo $diskon;
                                        ?></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div> 
    ";

echo $element;

}

?>        
                  
