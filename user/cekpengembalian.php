<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
$idtrans = $_GET['id'];
$tglpeng = date('Y-m-d');

$sql = "UPDATE transaksi SET tgl_pengembalian='$tglpeng' WHERE id_transaksi='$idtrans' ";

if ($conn->query($sql) === TRUE) {
	$sql1 ="UPDATE transaksi SET status_trans='Pesanan Selesai' WHERE id_transaksi='$idtrans'";

	if ($conn->query($sql1) === TRUE) {
    echo "<script>
            window.alert('Pesanan Dikembalikan');
            window.location='riwayats.php';
          </script>";
    }

} else {
    echo  $sql;

}
echo "<script>
        window.location('riwayats.php');
      </script>";
?>