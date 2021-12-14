<?php
session_start();


//$_SESSION['id_produk'] = $_GET['id'];

//echo $_SESSION['id_produk'];


if(isset($_SESSION['cart']['0'])){
    array_push($_SESSION['cart'],$_GET['id']);
}
else{
    $_SESSION['cart']['0']=$_GET['id'];
}

/*if (isset($_SESSION['cart'][$id_produk])) {

	$_SESSION['cart'][$id_produk]+=1;

}

else{

	$_SESSION['cart']['$id_produk'] = 1;
} */

echo "<pre>";
print_r($_SESSION['cart']);
echo "<pre>";



//pindah ke halaman cart
//echo "<script>location='cart.php'; </script>";
?>
