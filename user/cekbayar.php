<?php
include "../koneksidb.php";

session_start();

if (isset($_POST['submit'])) {
  $imgbukti = $_FILES["imgbukti"];
  $tgl_bayar =  date("Y-m-d");
  $idtrans = $_SESSION['cekbayar'];
  echo $idtrans;

  $target_dir = "../image/bukti/";
  $namafile =  "imgbukti." . $idtrans . "." .strtolower(pathinfo($imgbukti["name"], PATHINFO_EXTENSION)); 

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
      $resultr = mysqli_query($conn,"SELECT * from pembayaran where id_transaksi='$idtrans'");
      $rowm = mysqli_fetch_array($resultr);
      $idmet = $rowm['id_bayar'];

      $sql = "UPDATE pembayaran  SET status_bayar='Menunggu Konfirmasi', bukti_bayar='" .$namafile. "',tgl_bayar='" .$tgl_bayar. "' WHERE id_bayar='$idmet' ";

       echo $sql; 

      if ($conn->query($sql) === TRUE) {
        $resultd = mysqli_query($conn, "UPDATE transaksi SET status_trans='Menunggu Konfirmasi' WHERE id_transaksi='$idtrans'") ;
        echo "<script>
                window.alert('Bukti pembayaran berhasil diupload!'); 
                window.location ='riwayat.php'; 
              </script>";

      } else {
        echo  "Upload bukti pembayaran tidak berhasil";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
 

   