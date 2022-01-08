<?php
session_start();

require "../koneksidb.php";




foreach ($_SESSION['cart'] as $id => $qty):
	$sql = "SELECT * FROM produk WHERE id_produk = $id AND id_jenis=1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);

	echo $row['nama_produk'];

	// if ($row['id_jenis' != 1]) {
	//  	echo $id;
	//  	echo "jumlah beli". $qty;

	//  	// if ($row['id_jenis' === 2]) {
	//  	// 	$_SESSION['idsewa'] = $id;

	//  	// } else {

	//  	// }

	// } else {
	// 	echo $id;

	// }
endforeach



//pindah ke halaman cart
// echo "<script>location='cart.php'; </script>";
// echo "<script>
//         window.alert('produk berhasil dimasukkan ke keranjang !'); 
//         window.location ='cart.php'; 
//       </script>";
?>
