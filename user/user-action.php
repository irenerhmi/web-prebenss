<?php
include "../koneksidb.php";

$username = $_POST["username"];
$email = $_POST["email"];
$nama = $_POST["name"];
$password = $_POST["pass"];
$rpassword = $_POST["rpass"];
$alamat = $_POST["alamat"];
$imgprofile = $_FILES["imgprofile"];

$target_dir = "image/user";
$namafile =  "profileimg." .strtolower(pathinfo($imgprofile["name"],PATHINFO_EXTENSION))
$target_file = $target_dir . $namafile;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// echo $target_file;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["imgprofile"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
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
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($imgprofile["tmp_name"], $target_file)) {
  	$sql = 
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


?>