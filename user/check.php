<?php
session_start();


//jika barang sudah ada
if(isset($_SESSION['cart'][$_GET['id']]))
	$_SESSION['cart'][$_GET['id']]+=$_GET['qty'];

//jika barang blm ada
else
	$_SESSION['cart'][$_GET['id']]=1;


echo "<pre>";
print_r($_SESSION['cart']);
echo "<pre>";



//pindah ke halaman cart
echo "<script>location='cart.php'; </script>";
echo "<script>
        window.alert('produk berhasil dimasukkan ke keranjang !'); 
        window.location ='cart.php'; 
      </script>";
?>
