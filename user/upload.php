<?php
//file_uploads = On

include '../koneksidb.php';

session_start();


    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $berat = $_POST['berat']; 
    $image = $_FILES['image'];
    $kat = $_POST['kat'];
    $harga = $_POST['harga'];

    $target_dir = "../image/seller/";
    $namafile = "jual." . $nama . "." . strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
    $target_file = $target_dir . $namafile;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($image["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        echo (int)$kat;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    /* if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    } */

    // Check file size
    if ($image["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
          $sql = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, berat, harga, image, id_kategori, id_jenis, id_supplier) VALUES ('" . $nama . "','" . $deskripsi . "', '" . (int)$berat . "' , '" . (int)$harga . "','" . $namafile . "', '" . (int)$kat . "' , 1 ,'" . $_SESSION['id_supplier'] . "')");
            //$sql .= "INSERT INTO detail_penjualan(harga_jual) VALUES ('" . $harga . "')";
            //$result = mysql_query($conn, $sql);
  
          if ($conn->query($sql) === TRUE) {
            echo "<script>
                    window.alert('produk berhasil diinput'); 
                    window.location ='ajukan-jual.php'; 
                  </script>";
          } 
          else {
            
            echo $sql;
          }

        } 
        else {
          
          echo "Sorry, there was an error uploading your file.";
        }
    }

?>