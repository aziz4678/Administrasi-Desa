<?php
include "koneksi2.php";
$id_skd = $_POST['id_skd'];
$id_data = $_POST['id_data'];


$sql = "INSERT into skd (id_skd,id_data) 
values ('$id_skd','$id_data')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargaskd.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargaskd.php');
    </script>";
}