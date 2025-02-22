<?php
include "koneksi2.php";
$id_skck = $_POST['id_skck'];
$id_data = $_POST['id_data'];


$sql = "INSERT into skck (id_skck,id_data) 
values ('$id_skck','$id_data')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargaskck.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargaskck.php');
    </script>";
}