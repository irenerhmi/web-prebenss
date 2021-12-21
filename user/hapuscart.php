<?php  
session_start();

/*$id_produk = $_GET['id'];*/


unset($_SESSION['cart'][$_GET['id']]);


?>