<?php  
session_start();

/*$id_produk = $_GET['id'];*/


unset($_SESSION['carts'][$_GET['ids']]);

echo "<script>
        window.location ='cart.php'; 
      </script>";


?>