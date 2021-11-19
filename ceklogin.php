<?php
include "koneksidb.php";

session_start();

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password1 = mysqli_real_escape_string($conn,$_POST['password']);
    $sql = "select * from user where u_username='".$username."'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    //echo $row['u_password'];

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $row['u_username'];
        $_SESSION['name'] = $row['u_name'];

        // cek password
        $hash = $row['u_password'];

        if(password_verify($password1, $hash) ){
            header ("location: user/dashuser.php");
            //$_SESSION['grup'] = $row['gakses'];  
        }
        else {
            echo "salah pw";
            // echo '<script> alert("Password salah!") </script>';
            header ("location: register.php");

        }

        //if($_SESSION['grup'] == 0)
        //    header("location: admin/dashadmin.php");
        //elseif($_SESSION['grup'] == 1)
        //    header("location: seller/dashseller.php");
        //else
        //    header("location: user/dashuser.php");
    } 
    else {
        echo '<script> alert("username atau password salah") </script>';
        header ("location: login.php");

    }
}
?>