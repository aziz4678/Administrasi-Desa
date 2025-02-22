<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $jum = $_POST['jum'];
    $id_jadwal = $_POST['id_jadwal'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_akhir = $_POST['waktu_akhir'];

    for ($i = 0; $i < $jum; $i++) {
        $id = $id_jadwal[$i];
        $mulai = $waktu_mulai[$i];
        $akhir = $waktu_akhir[$i];

        mysqli_query($conn, "INSERT INTO jadwal (id_jadwal, waktu_mulai, waktu_akhir) VALUES ('$id', '$mulai', '$akhir')") or die(mysqli_error($conn));
    }

    echo "<script> 
    alert('Jadwal berhasil ditambahkan!'); 
    window.location.href = 'adminjadwal.php';  
    </script>";
}
?>
