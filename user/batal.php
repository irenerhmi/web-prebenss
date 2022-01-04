<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
$idtrans = $_GET['id'];

$sql1 = "UPDATE transaksi SET status_trans='Pesanan Dibatalkan' WHERE id_transaksi='$idtrans' ";

if ($conn->query($sql1) === TRUE) {
	
		echo "<script>
            window.alert('Pesanan Telah Dibatalkan');
            window.location='riwayat.php';
          </script>";

} else {
    
    echo  $sql1;
}
echo "<script>
        window.location('riwayat.php');
      </script>";
?>