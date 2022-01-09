<?php
session_start();


//jika barang sudah ada
if(isset($_SESSION['cart'][$_GET['id']]))
	$_SESSION['cart'][$_GET['id']]+=$_GET['qty'];

//jika barang blm ada
else
	$_SESSION['cart'][$_GET['id']]=1;





//pindah ke halaman cart
echo "<script>
        window.alert('produk berhasil dimasukkan ke keranjang !'); 
        window.location ='dashuser.php'; 
      </script>";
?>
