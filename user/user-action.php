<?php
include "../koneksidb.php";
session_start();

//$username = $_POST["username"];
//$imgprofile = "../ava.jpg";
$username = $_SESSION["username"];
$email = $_POST["email"];
$nama = $_POST["nama"];
$phone = $_POST["phone"];
$alamat = $_POST["alamat"];
$imgprofile = $_FILES["imgprofile"];

/* if ($password !== $rpassword) {
    echo "password tidak sama";
    die();
} */

$target_dir = "../image/user/";
$namafile =  "profileimg." . $phone . "." .strtolower(pathinfo($imgprofile["name"], PATHINFO_EXTENSION)); 

$target_file = $target_dir . $namafile;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($imgprofile["name"],PATHINFO_EXTENSION));
//echo $imageFileType;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($imgprofile["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($imgprofile["size"] > 1000000) {
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
  if (move_uploaded_file($imgprofile["tmp_name"], $target_file)) {
      $sql = " UPDATE user SET u_email='" . $email . "' , u_name= '" . $nama . "' , u_phone = '" . $phone . "' , u_alamat='" . $alamat . "' , u_image='" . $namafile . "' where u_username='" . $username . "' " ;
      echo $sql; 
      $result = mysqli_query($conn, $sql);


      if ($conn->query($sql) === TRUE) {
          echo " update data berhasil";
          header("location: acc-profile.php");
          
      } else {
          echo  "update data tidak berhasil";
      }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


?>