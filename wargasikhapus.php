<?php
session_start();

include "koneksi.php";


if (isset($_POST['hapus'])) {
    $data = $_POST['id_sik'];
    $query_l = "DELETE FROM sik WHERE id_sik='$data'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Data berhasil dihapus!');        
     </script>";
        header("Location:wargasik.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:wargasik.php");
    }
}
