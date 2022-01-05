<?php
include "../koneksidb.php";

session_start();


/* if (isset($_POST['submit'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 
  $barang = test_input($_POST["barang"]);
    $berat = test_input($_POST["berat"]);
    $alamat = test_input($_POST["alamat"]);
    $tanggal = test_input($_POST["tglkirim"]);
    $imgbarang = test_input($_FILES["imgbarang"]);
    $phone = $_SESSION['phone'];
*/


    $barang = $_POST["barang"];
    $berat = $_POST["berat"];
    $alamat = $_POST["alamat"];
    $tanggal = $_POST["tglkirim"];
    $deskripsi = $_POST["deskripsi"];
    $imgbarang = $_FILES["imgbarang"];
    $kat = $_POST['kat'];
    $phone = $_SESSION['phone'];


    $target_dir = "../image/donasi/";
    $namafile =  "imgbarang." . $phone . "." .strtolower(pathinfo($imgbarang["name"], PATHINFO_EXTENSION)); 

    $target_file = $target_dir . $namafile;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imgbarang["name"],PATHINFO_EXTENSION));
    //echo $imageFileType;


    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($imgbarang["tmp_name"]);
      if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check file size
   

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    /* echo $username;
    echo $email;
    echo $nama;
    echo $phone;
    echo $alamat;
    echo $namafile;*/

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($imgbarang["tmp_name"], $target_file)) {
          $sql = mysqli_query($conn, "INSERT INTO produk (nama_produk, berat, harga, deskripsi, image, id_kategori, id_jenis) VALUES ('" . $barang . "', '" . (int)$berat . "', 0 , '" . $deskripsi. "','" . $namafile . "', '" . (int)$kat . "' , 3 )");
          $id_probaru = $conn->insert_id; 

          if ($sql === TRUE) {
            $sql1 = mysqli_query($conn, "INSERT INTO donasi (tgl_donasi, alamatdon) VALUES ('" . $tanggal . "','" .$alamat. "')");
            $id_don = $conn->insert_id; 
    
            if($sql1 === TRUE) {
              $sql2 = mysqli_query($conn, "INSERT INTO menginput (id_produk, id_pelanggan, id_donasi) VALUES ('" . $id_probaru . "','" . $_SESSION['id_pelanggan'] . "','" . $id_don . "')");
              
              if ($sql2 === TRUE) {
                echo "<script>
                        window.alert('Donasi Berhasil Diinput!');
                        window.location='donasi.php'; 
                      </script> ";
              } 
              else {

                echo $sql2;
              }

            } 
            echo "<script>
                    window.location('donasi.php'); 
                  </script> ";

          } else {
            // echo  "update data donasi tidak berhasil";
            echo $sql;
          }

        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
    echo "<script>
            window.location('donasi.php'); 
          </script>";

/* 
}
  echo "<h2>Your Input:</h2>";
    echo $barang;
    echo "<br>";
    echo $berat;
    echo "<br>";
    echo $alamat;
    echo "<br>";
    echo $tanggal; */
?>
 

   