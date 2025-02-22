<?php
session_start();
include "koneksi.php";

if(isset($_POST['hapus']))
{
    $skck = mysqli_real_escape_string($conn, $_POST['hapus']);

    $query = "DELETE FROM adminprofil WHERE id_admin='$skck' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: adminprofil.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Deleted";
        header("Location: adminprofil.php");
        exit(0);
    }
}