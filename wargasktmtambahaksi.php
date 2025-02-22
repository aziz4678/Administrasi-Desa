<?php
include "koneksi2.php";
$id_skck = $_POST['id_sktm'];
$id_data = $_POST['id_data'];
$nm = $_POST['namaa'];
$nis = $_POST['nis'];
$se = $_POST['sekolah'];


$sql = "INSERT into sktm (id_sktm,id_data,namaa,nis,sekolah) 
values ('$id_skck','$id_data','$nm','$nis','$se')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargasktm.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargasktm.php');
    </script>";
}