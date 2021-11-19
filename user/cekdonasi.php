<?php
include "../koneksidb.php";

session_start();
if(!isset($_SESSION['username']) and $_SESSION['grup'] == 2){
    header("location: login.php");
}

if (isset($_POST['submit'])) {
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


    $sql = "INSERT INTO detail_donasi (nama_donasi, berat, alamatdon, tgl_kirim, u_username) VALUES ('". $barang ."', '" .$berat. "', '" .$alamat. "', '" .$tanggal. "', '" .$_SESSION['username']. "')";

    echo "<h2>Your Input:</h2>";
    echo $barang;
    echo "<br>";
    echo $berat;
    echo "<br>";
    echo $alamat;
    echo "<br>";
    echo $tanggal;

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert ("donasi berhasil diinput!")</script>';
        header ("location: dashuser.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>