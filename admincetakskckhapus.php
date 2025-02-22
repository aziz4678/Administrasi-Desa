<?php
session_start();

include "koneksi.php";


if (isset($_POST['hapus'])) {
    $data = $_POST['id_skck'];
    $query_l = "DELETE FROM skck WHERE id_skck='$data'";
    if ($h_l = $conn->query($query_l)) {
        echo "<script> 
        alert('Data berhasil dihapus!');        
     </script>";
        header("Location:admincetakskck.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:admincetakskck.php");
    }
}
