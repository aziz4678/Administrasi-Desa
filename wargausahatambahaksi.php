<?php
include "koneksi2.php";
$id_skck = $_POST['id_usaha'];
$id_data = $_POST['id_data'];
$a = $_POST['usaha'];
$b = $_POST['deskripsi'];
$c = $_POST['sejak'];
$d = $_POST['al'];


$sql = "INSERT into usaha (id_usaha,id_data,usaha,deskripsi,sejak,al) 
values ('$id_skck','$id_data','$a','$b','$c','$d')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargausaha.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargausaha.php');
    </script>";
}