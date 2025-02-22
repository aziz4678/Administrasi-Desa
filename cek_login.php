<?php 
// mengaktifkan session pada phAp
session_start();
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$query = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($query);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($query);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin.php");

	// cek jika user login sebagai warga
	}else if($data['level']=="warga"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $nama;
		$_SESSION['level'] = "warga";
		// alihkan ke halaman dashboard warga
		header("location:warga.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>