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

    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $rpassword = test_input($_POST["rpassword"]);

    // cek password nya sama atau engga
    if ($password !== $rpassword) {
    echo "password tidak sama";

    die();
    } 


    // enkripsi password
    // algoritma nya pake algoritma default: alg yg dipilih scr default sm php akan selalu berubah kalo ada pengamanan baru

    $password = password_hash($password, PASSWORD_DEFAULT);

    // query update password
    $sql = " UPDATE user SET u_password='" . $password . "' where u_email='" . $email . "' " ;


    if ($conn->query($sql) === TRUE) {
        echo "<script>
                window.alert('password berhasil diubah'); 
                window.location ='login.php'; 
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>