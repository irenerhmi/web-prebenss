<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
$idtrans = $_GET['id'];

$sql = "UPDATE pengiriman SET status_trans='Pesanan Dikirim' tgl_peng='date("Y-m-d")' WHERE id_transaksi='$idtrans' ";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            window.alert('Pesanan Diterima');
            window.location('riwayat.php');
           </script>";
} else {
    echo  "update data tidak berhasil";
}
?>