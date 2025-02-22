<?php

include "koneksi.php";
 
$jum = $_POST['jum'];  

$id = $_POST['id'];
$kode_barang = $_POST['acara'];
$nama_barang = $_POST['tgll'];
$harga = $_POST['tempp'];

for ($i=0; $i<$jum; $i++)
{
    mysqli_query($conn,"update sik set
    acara = '$kode_barang[$i]',
    tgll = '$nama_barang[$i]',
    tempp = '$harga[$i]' 
    where id_sik='$id[$i]'") 
    or die(mysqli_error($conn));
}
    echo "<script>alert('Data berhasil diupdate');
    document.location='admincetaksik.php'</script>";
 
?>