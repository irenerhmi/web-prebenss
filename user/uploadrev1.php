<?php
session_start();
require "../koneksidb.php";
$idpro = $_GET['id'];

if (isset(($_POST['review']))) 
{
  $rating = $_POST['rating'];
  $review = $_POST['isirev'];
  $idpro = $produk['id_produk'];
  $sql = "INSERT INTO merating (nilai, isi, id_produk, id_pelanggan) VALUES ($rating, '".$review."', '" . $idpro . "', '" . $_SESSION['id_pelanggan'] . "')";

  $resultrt = mysqli_query($conn,$sql);
  if ($resultrt === TRUE) {
    echo "<script>
            window.alert('Review telah diupload');
          </script>";
                                                
                                                // $sql2 = "INSERT INTO mereview (isi, id_produk, id_pelanggan) VALUES ('".$review."', '" . $idpro . "', '" . $_SESSION['id_pelanggan'] . "')";

                                                // $resultrv = mysqli_query($conn,$sql2);

                                                // if ($resultrv === TRUE) {
                                                //     echo "<script>
                                                //             window.alert('Review telah diupload');
                                                //          </script>";
                                                // }
                                                // else {

                                                //     echo $sql2;

                                                // }
  }
    else {

      echo $sql;
  }

                                            // echo "<script>
                                            //         window.alert('Review telah diupload');
                                            //         window.location ='riwayat.php'; 
                                            //       </script>";
}

// echo "<script>
//         window.location('riwayat.php');
//       </script>";
?>