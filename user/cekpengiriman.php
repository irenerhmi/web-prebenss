<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
if (isset($_POST['pengiriman'])) {
  $imgbukti = $_FILES["imgbuktipeng"];
  $tglpeng =  date("Y-m-d");
  $idtrans = $_SESSION['cekpeng'];
  echo $idtrans;

  $target_dir = "../image/buktipeng/";
  $namafile =  "imgbuktipeng." . $idtrans . "." .strtolower(pathinfo($imgbukti["name"], PATHINFO_EXTENSION)); 

  $target_file = $target_dir . $namafile;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($imgbukti["name"],PATHINFO_EXTENSION));
  //echo $imageFileType;


  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($imgbukti["tmp_name"]);
    if($check !== false) {
       //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<script>
            window.alert('Sorry, your file was not uploaded.');
          </script>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($imgbukti["tmp_name"], $target_file)) {
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

        $sql3 = "UPDATE pengiriman SET status_peng='Pesanan Dikirim', buktipeng ='".$namafile."' WHERE id_bayar='$idbay'";
        $resultd = mysqli_query($conn, $sql3) ;


        if ($resultd === TRUE) {

          // $sqlt1 = "UPDATE transaksi SET status_trans='Pesanan Dikirim' WHERE id_transaksi='$idtrans'";
          $resultr = mysqli_query($conn, "UPDATE transaksi SET status_trans='Pesanan Dikirim' WHERE id_transaksi='$idtrans'");
          echo "<script>
                  window.alert('Bukti pembayaran berhasil diupload!');
                </script>";

        } else {

          echo $sql3;

        }

      } else {
        echo  "Upload bukti pembayaran tidak berhasil";
        echo $sql; 
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
} else {

  echo "tidak ada data";
}

?>