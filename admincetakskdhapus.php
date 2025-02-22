<?php
session_start();

include "koneksi.php";


if (isset($_POST['hapus'])) {
    $data = $_POST['id_skd'];
    $query_l = "DELETE FROM skd WHERE id_skd='$data'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Data berhasil dihapus!');        
     </script>";
        header("Location:admincetakskd.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:admincetakskd.php");
    }
}
