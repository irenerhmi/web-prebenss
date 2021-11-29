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
    $imgbarang = $_FILES["imgbarang"];
    $phone = $_SESSION['phone'];

    $sql="select count(id_donasi) as urutan from detail_donasi";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $hasil = $row['urutan']; 


    $target_dir = "../image/donasi/";
    $namafile =  "imgbarang." . $hasil . "." .strtolower(pathinfo($imgbarang["name"], PATHINFO_EXTENSION)); 

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
    if ($imgbarang["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

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
          $sql = "INSERT INTO detail_donasi (nama_donasi, berat, alamatdon, tgl_kirim, d_image, u_username) VALUES ('". $barang ."', '" .$berat. "', '" .$alamat. "', '" .$tanggal. "', '" .$namafile. "', '" .$_SESSION['username']. "')";

          //echo $sql; 


          if ($conn->query($sql) === TRUE) {
            echo "<script>
                    window.alert('donasi berhasil diinput'); 
                    window.location ='donasi.php'; 
                  </script>";
          } 

          else {
            echo  "update data tidak berhasil";
          }

        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

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
 

   