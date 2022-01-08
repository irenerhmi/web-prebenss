<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";

?>
<?php
$idtrans = $_GET['id'];

// $ambil = $conn->query("SELECT * from produk where id_jenis=1 limit 6"); 
// while($perproduk = $ambil->fetch_assoc()){

$tampil = $conn->query("SELECT * from dilakukan WHERE id_transaksi='".$idtrans."'");
while ($produk = $tampil->fetch_assoc()){
	$idpro= $produk['id_produk'];
	$jumlah = $produk['jumlah_p'];

	echo $jumlah;

	$stok = mysqli_query($conn, "UPDATE produk SET stok=stok + $jumlah where id_produk='".$idpro."'");

	if ($stok === TRUE) {

		echo "berhasil";
	} else {
		echo $stok;
	}


	$sql1 = "UPDATE transaksi SET status_trans='Pesanan Dibatalkan' WHERE id_transaksi='$idtrans' ";

	if ($conn->query($sql1) === TRUE) {
		
			echo "<script>
	            window.alert('Pesanan Telah Dibatalkan');
	            window.location='riwayat.php';
	          </script>";

	} else {
	    
	    echo  $sql1;
	}
}
echo "<script>
        window.location('riwayat.php');
      </script>";
?>