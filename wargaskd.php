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
	<title>SKD | SI Administrasi Desa</title>
	    <link rel="icon" href="logo.png">
</head>

<body>
    <?php
    session_start();
    include "koneksi.php";
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
                <a href="warga.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="wargadata.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Data Warga</a>
                <a href="wargaskck.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan SKCK</a>
                <a href="wargasktm.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan SKTM Sekolah</a>
                <a href="wargasik.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan Surat Izin Keramaian</a>
                <a href="wargausaha.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-envelope me-2"></i>Permohonan Surat Keterangan Usaha</a>
                <a href="wargaskd.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-envelope me-2"></i>Permohonan Surat Keterangan Domisili</a>
                <a href="download.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-download me-2"></i>Cetak Surat Permohonan</a>
                
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
       
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Permohonan Surat Keterangan Domisili</h2>
                    <?php include('pesan.php'); ?>
                </div>
                
            </nav>

            <div class="container-sm">
                <hr class="border-light border-2 opacity-75">
                <a class="btn btn-primary mb-2 btn-sm" href="wargaskdtambah.php" role="button">Tambah</a>
                <table class="table table-light table-striped rounded table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">NIK</th> 
                            <th scope="col">Jenis Kelamin</th>  
                            <th scope="col">Alamat</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Status</th> 
                            <th scope="col">Kewarganegaraan</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col" width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM skd INNER JOIN data ON skd.id_data=data.id_data";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $admin)
                        {?>
                            <tr>
                                <td><?php echo $admin['id_skd'] ?></td>
                                <td><?php echo $admin['nama'] ?></td>
                                <td><?php echo $admin['nik'] ?></td>
                                <td><?php echo $admin['jenis'] ?></td>
                                <td><?php echo $admin['alamat'] ?></td>
                                <td><?php echo $admin['temp'] ?></td>
                                <td><?php echo $admin['tgl'] ?></td>
                                <td><?php echo $admin['status'] ?></td>
                                <td><?php echo $admin['kewarganegaraan'] ?></td>
                                <td><?php echo $admin['agama'] ?></td>
                                <td><?php echo $admin['pekerjaan'] ?></td>
                                <td>
                                    <form action="wargaskdread.php?id_skd= <?php echo $admin['id_skd'] ?>" method="post">
                                        <input type="hidden" name="id_skd">
                                        <input class="btn btn-warning btn-sm"  type="submit" value="Read">
                                    </form>
                                    <p></p>
                                    <form action="wargaskdupdate.php?id_skd= <?php echo $admin['id_skd'] ?>" method="post">
                                        <input type="hidden" name="id_skd">
                                        <input class="btn btn-success btn-sm"  type="submit" value="Update">
                                    </form>
                                    <p></p>
                                    <form action="wargaskdhapus.php" method="post">
                                        <input type="hidden" name="id_skd" value="<?php echo $admin['id_skd'] ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" name="hapus" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data?')">
                                    </form>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- <footer class="bg-dark pb-3 pt-4">
        <p class="text-center text-white bg-dark">Created with love by Ilham Shodiq</p>
    </footer> -->

    <footer class="text-center text-white p-4" style="background-color: #22333E;">
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
