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
    <title>SKU Edit | SI Administrasi Desa</title>
	    <link rel="icon" href="logo.png">
</head>

<body>
    <?php
    session_start();
    include "koneksi.php";
    $dataa = $_GET['id_usaha'];
    $sql = "SELECT * FROM usaha INNER JOIN data ON usaha.id_data=data.id_data WHERE id_usaha = '$dataa'";
    $query = $conn->query($sql);
    ?>

    <nav class="navbar navbar-dark" style="background-color: #22333E;">
        <div class="container-fluid">
            <a class="navbar-brand">Sistem Layanan Administrasi Desa</a>
            <form class="d-flex" role="search">
                <a href="logout.php" class="btn btn-outline-danger btn-sm" role="button">LOG OUT</a>
            </form>
        </div>
    </nav>

    <div class="d-flex bg-secondary text-white" id="wrapper">
        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper" style="background-color: #5a636b;">
            <div class="list-group list-group-flush my-3">
                <a href="warga.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="wargadata.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Data Warga</a>
                <a href="wargaskck.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan SKCK</a>
                <a href="wargasktm.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan SKTM Sekolah</a>
                <a href="wargasik.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan Surat Izin Keramaian</a>
                <a href="wargausaha.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan Surat Keterangan Usaha</a>
                <a href="wargaskd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan Surat Keterangan Domisili</a>
                <a href="download.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-download me-2"></i>Cetak Surat Permohonan</a>
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Edit Data</h2>
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
                        <label for="id_data" class="form-label">ID Data</label>
                        <input type="text" class="form-control" id="id_data" name="id_data" value="<?php echo $data['id_data'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="usaha" class="form-label">Nama Usaha</label>
                        <input class="form-control" id="usaha" name="usaha" value="<?php echo $data['usaha'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Usaha</label>
                        <input class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sejak" class="form-label">Usia Usaha</label>
                        <input class="form-control" id="sejak" name="sejak" value="<?php echo $data['sejak'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="al" class="form-label">Alamat Usaha</label>
                        <input class="form-control" id="al" name="al" value="<?php echo $data['al'] ?>">
                    </div>
                    
                    <input class="btn btn-primary" type="submit" name="edit" value="Update">
                    <a class="btn btn-danger" href="wargausaha.php" role="button">Cancel</a>
                    
                </form>
                <?php
                    }
                }  
                if(isset($_POST['edit'])){
                    $dataa = $_GET['id_usaha'];
                    $nama = $_POST['id_data'];
                    $nik = $_POST['usaha'];
                    $jenis = $_POST['deskripsi'];
                    $temp = $_POST['sejak'];
                    $al = $_POST['al'];
                    $sql = "UPDATE usaha SET id_data = '$nama', usaha = '$nik', deskripsi = '$jenis', sejak = '$temp', al = '$al'";
                    $query = $conn->query($sql);
                    if ($query) {
                        echo "<script>alert('Data berhasil diupdte');
                        window.location.href = 'wargausaha.php';
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