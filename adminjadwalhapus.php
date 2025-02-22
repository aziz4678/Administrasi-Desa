<?php
session_start();
include "koneksi.php";


if (isset($_POST['hapus'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $query_l = "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Jadwal berhasil dihapus!');        
     </script>";
        header("Location:adminjadwal.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:adminjadwal.php");
    }
}
