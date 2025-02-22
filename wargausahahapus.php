<?php
session_start();

include "koneksi.php";


if (isset($_POST['hapus'])) {
    $data = $_POST['id_usaha'];
    $query_l = "DELETE FROM usaha WHERE id_usaha='$data'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Data berhasil dihapus!');        
     </script>";
        header("Location:wargausaha.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:wargausaha.php");
    }
}
