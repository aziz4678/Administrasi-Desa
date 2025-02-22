<?php
include "koneksi2.php";
$id_skck = $_POST['id_sik'];
$id_data = $_POST['id_data'];
$acara = $_POST['acara'];
$tgl = $_POST['tgll'];
$temp = $_POST['tempp'];



$sql = "INSERT into sik (id_sik,id_data,acara,tgll,tempp) 
values ('$id_skck','$id_data','$acara','$tgl','$temp')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil dibuat!!'); 
    window.location.href = ('wargasik.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('wargasik.php');
    </script>";
}