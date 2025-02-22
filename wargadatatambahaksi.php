<?php
include "koneksi2.php";
$id_data = $_POST['id_data'];
$id = $_POST['nama'];
$nik = $_POST['nik'];
$jenis = $_POST['jenis'];
$temp = $_POST['temp'];
$tgl = $_POST['tgl'];
$status = $_POST['status'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$agama = $_POST['agama'];
$pekerjaan = $_POST['pekerjaan'];
$alamat = $_POST['alamat'];

$sql = "INSERT into data (id_data,nama,nik,jenis,temp,tgl,status,kewarganegaraan,agama,pekerjaan,alamat) 
values ('$id_data','$id','$nik','$jenis','$temp','$tgl','$status','$kewarganegaraan','$agama','$pekerjaan','$alamat')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargadata.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargadata.php');
    </script>";
}