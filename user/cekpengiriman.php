<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
if (isset($_POST['pengiriman'])) {
  $bukti = $_POST["buktipeng"];
  $tglpeng =  date("Y-m-d");
  $idtrans = $_SESSION['cekpeng'];
  echo $idtrans;

  
      $sql2 = "SELECT b.id_bayar as id_bayar  
        FROM transaksi t 
        LEFT JOIN pembayaran b on t.id_transaksi=b.id_transaksi 
        LEFT JOIN pengiriman k on b.id_bayar=k.id_bayar 
        WHERE t.id_transaksi=$idtrans";

      $ambil2 = mysqli_query($conn, $sql2); 
      $rowsl2 = mysqli_fetch_array($ambil2);
      $idbay = $rowsl2['id_bayar'];

      $sql = "UPDATE pengiriman SET tgl_peng='$tglpeng' WHERE id_bayar='$idbay' ";

      if ($conn->query($sql) === TRUE) {

        $sql3 = "UPDATE pengiriman SET status_peng='Pesanan Dikirim', buktipeng ='".$bukti."' WHERE id_bayar='$idbay'";
        $resultd = mysqli_query($conn, $sql3) ;


        if ($resultd === TRUE) {

          // $sqlt1 = "UPDATE transaksi SET status_trans='Pesanan Dikirim' WHERE id_transaksi='$idtrans'";
          $resultr = mysqli_query($conn, "UPDATE transaksi SET status_trans='Pesanan Dikirim' WHERE id_transaksi='$idtrans'");
          echo "<script>
                  window.alert('Bukti pembayaran berhasil diupload!');
                  window.location='pesanan-jual.php';
                </script>";

        } else {

          echo $sql3;

        }

      } else {
        echo  "Upload bukti pembayaran tidak berhasil";
        echo $sql; 
      }

} else {

  echo "tidak ada data";
}

?>