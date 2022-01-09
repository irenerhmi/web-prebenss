<?php
session_start();


//jika barang sudah ada
if(isset($_SESSION['carts'][$_GET['ids']]))
	$_SESSION['carts'][$_GET['ids']]+=$_GET['qtys'];

//jika barang blm ada
else
	$_SESSION['carts'][$_GET['ids']]=1;




//pindah ke halaman cart
echo "<script>
        window.alert('produk berhasil dimasukkan ke keranjang !'); 
        window.location ='dashuser.php';
      </script>";
?>
