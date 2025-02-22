<?php
session_start();
include "koneksi.php";

if(isset($_POST))
{
    $nik = mysqli_real_escape_string($conn, $_POST['id_admin']);
    $nama = mysqli_real_escape_string($conn, $_POST['id']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $usia = mysqli_real_escape_string($conn, $_POST['usia']);
    
    $jeniss = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenisss = mysqli_real_escape_string($conn, $_POST['id_jadwal']);

    $query = "INSERT INTO adminprofil (id_admin,id,jenis,usia,alamat,id_jadwal) VALUES ('$nik','$nama','$jenis','$usia','$jeniss','$jenisss')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        echo "<script> 
    alert('Profil Admin berhasil ditambah!'); 
    window.location.href = ('adminprofil.php');  
    </script>";
    }
    else
    {
        echo "<script> 
        alert('Profil Admin gagal ditambah!');        
        window.location.href = ('adminprofil.php');
        </script>";
    }
}
