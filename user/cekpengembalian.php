<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
if (isset($_POST['pengembalian'])) {
  $bukti = $_POST["resipeng"];
  $tglpeng =  date("Y-m-d");
  $idtrans = $_SESSION['cekpengem'];
  echo $idtrans;

  $sql1 ="UPDATE pengembalian SET status_p='Pesanan Telah Dikembalikan', bukti_p='" .$bukti. "' WHERE id_transaksi='$idtrans'";

  if ($conn->query($sql1) === TRUE) {

  	$sql = "UPDATE transaksi SET status_trans='Pesanan Selesai' WHERE id_transaksi='$idtrans' ";

  	if ($conn->query($sql) === TRUE) {

      echo "<script>
              window.alert('Pesanan Dikembalikan');
              window.location='riwayats.php';
            </script>";
    } else {

      echo  $sql;
    }

  } else {
      echo  $sql1;

  }
  echo "<script>
          window.location('riwayats.php');
        </script>";
} else {

  echo "tidak ada data";
}
?>