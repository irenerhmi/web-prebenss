<?php
include "koneksidb.php";
session_start();

$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$info = $_POST["info"];

	    
if(isset($_POST["editcontact"])) {

	$sql = "UPDATE contact_us 
	    	SET c_nama= '$nama' ,
	    	c_address = '$alamat',
	    	c_contact = '$info'
	    	WHERE id_contact= 1";

	echo $sql; 

	$result = mysqli_query($conn, $sql);


	if ($conn->query($sql) === TRUE) {
	  echo " update data berhasil";
	  header("location: kontak.php");
	  
	} else {
	  echo  "update data tidak berhasil";
	}
}
