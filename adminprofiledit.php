<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css buatan sendiri -->
    <link rel="stylesheet" href="css/style_dashboard.css">
    <title>Profil | SI Administrasi Desa</title>
	    <link rel="icon" href="logo.png">
</head>

<body>
<?php
    session_start();
    include "koneksi.php";
    $admin = $_GET['id_admin'];
    $sql = "SELECT * FROM adminprofil WHERE id_admin = '$admin'";
    $query = $conn->query($sql);
    ?>

    <nav class="navbar navbar-dark bg-dark" >
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Layanan Administrasi Desa</a>
            <a href="../logout.php" class="btn btn-outline-danger btn-sm" role="button">LOG OUT</a>
        </div>
    </nav>

    <div class="d-flex bg-dark text-white" id="wrapper">
        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper" style="background-color: #5a636b;">
            <div class="list-group list-group-flush my-3">
                <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="adminprofil.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Profil</a>
                <a href="adminjadwal.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-clock me-2"></i>Jadwal</a>
                <a href="admincetakskck.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Cetak SKCK</a>
                <a href="admincetaksktm.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Cetak SKTM Sekolah</a>
                <a href="admincetaksik.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Cetak Surat Izin Keramaian</a>
                <a href="admincetakusaha.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Cetak Surat Keterangan Usaha</a>
                <a href="admincetakskd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Cetak Surat Keterangan Domisili</a>
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Ubah Data</h2>
                </div>
            </nav>
            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <?php
                if ($query) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                        <form action="" method="post">
                        <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis" name="jenis">

                            <option value="<?php echo $data['usia'] ?>">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                            </div>
                            <div class="mb-3">
                                <label for="usia" class="form-label">Usia Admin</label>
                                <input type="text" class="form-control" id="usia" name="usia" value="<?php echo $data['usia'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Admin</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>">
                            </div>
                            <input class="btn btn-primary" type="submit" name="edit" value="Update">
                            <a class="btn btn-danger" href="adminprofil.php" role="button">Cancel</a>
                        </form>
                <?php
                    }
                }  
                if(isset($_POST['edit'])){
                    $admin = $_GET['id_admin'];
                    $nama = $_POST['jenis'];
                    $usia = $_POST['usia'];
                    $alamat = $_POST['alamat'];
                    $sql = "UPDATE adminprofil SET jenis = '$nama', usia = '$usia', alamat = '$alamat' WHERE id_admin = '$admin'";
                    $query = $conn->query($sql);
                    if ($query) {
                        echo "<script>alert('Data berhasil diupdte');
                        window.location.href = 'adminprofil.php';
                        </script>";
                    } else {
                        echo "<script>alert('Data gagal diupdate');</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- <footer class="bg-dark pb-3 pt-4">
        <p class="text-center text-white bg-dark">Created with love by Ilham Shodiq</p>
    </footer> -->

    <footer class="bg-dark text-center text-white p-4">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
            <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="mailto:muhamadaziz564@gmail.com">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/az_muhamad07/">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/aziz4678">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="small text-center">Created by Muhamad Aziz</div>
            </div>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>