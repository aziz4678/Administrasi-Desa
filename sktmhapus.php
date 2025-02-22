<?php
session_start();

include "koneksi.php";


if (isset($_POST['hapus'])) {
    $data = $_POST['id_data'];
    $query_l = "DELETE FROM data WHERE id_data='$data'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Data berhasil dihapus!');        
     </script>";
        header("Location:admincetaksktm.php");
    } else {
        echo "<script> 
        alert('Data gagal dihapus!');        
     </script>";
        header("Location:admincetaksktm.php");
    }
}
