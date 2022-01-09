<?php
session_start();
require "../koneksidb.php";

if (isset(($_POST['review']))) 
{
  $rating = $_POST['rating'];
  $review = $_POST['isirev'];

  $sql = "INSERT INTO merating (nilai, isi, id_produk, id_pelanggan) VALUES ($rating, '".$review."', '" . $_SESSION['idrevs'] . "', '" . $_SESSION['id_pelanggan'] . "')";

  $resultrt = mysqli_query($conn,$sql);


  if ($resultrt === TRUE) {

    echo "<script>
            window.alert('Review telah diupload');
          </script>";
?>
      <button class="text-center" onclick="history.back()">Go Back</button>

<?php
    
  } else {

      echo $sql;
  }
  
} else {

  echo "tidak ada data";
}



?>