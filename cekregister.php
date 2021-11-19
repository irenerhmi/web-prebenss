<?php
include "koneksidb.php";

if (isset($_POST['submit'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $nama = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);
    $alamat = test_input($_POST["alamat"]);

    // cek uname sudah ada tau belum
    $result = mysqli_query($conn, "SELECT u_username FROM user where username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert ('username sudah terdaftar')
              </script>";
        return false;
    }

    // enkripsi password

    // algoritma nya pake algoritma default: alg yg dipilih scr default sm php akan selalu berubah kalo ada pengamanan baru

    $password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO user (u_username, u_email, u_name, u_password, u_alamat) VALUES ('" . $username . "','" . $email . "', '" . $nama . "', '" . $password . "', '" . $alamat . "')";

    echo "<h2>Your Input:</h2>";
    echo $username;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $nama;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $alamat;

    if ($conn->query($sql) === TRUE) {
        header ("location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>