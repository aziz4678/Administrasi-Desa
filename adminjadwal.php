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
	<title>Jadwal | SI Administrasi Desa</title>
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
                <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="adminprofil.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Profil</a>
                <a href="adminjadwal.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-clock me-2"></i>Jadwal</a>
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
                    <h2 class="fs-2 m-0">Jadwal Admin, <?php echo $_SESSION['username']; ?>!</h2>
                    <?php include('pesan.php'); ?>
                </div>
                
            </nav>
            <div class="container-sm">
    <hr class="border-light border-2 opacity-75">
    <form method="post" action="adminjadwaltambah.php">
        <h6>Tambah Data
            <input type="text" name="jum" size="1"> 
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary mb-2 btn-sm">
        </h6>
    </form>
    <form action="" method="post">
        <table class="table table-light table-striped rounded table-hover">
            <thead>
                <tr>
                    <th scope="col">Id Jadwal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Berakhir</th>
                    <th></th>
                    <th scope="col" width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM jadwal";
                $query = $conn->query($sql);
                while ($data = $query->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $data['id_jadwal'] ?></td>
                        <td><?php echo $data['waktu_mulai'] ?></td>
                        <td><?php echo $data['waktu_akhir'] ?></td>
                        <td align="center">
                            <input type="checkbox" name="deleteId[]" value="<?php echo $data['id_jadwal']; ?>">
                        </td>
                        <td>
                           
                            <form action="adminjadwalread.php?id_jadwal=<?php echo $data['id_jadwal'] ?>" method="post">
                                <input type="hidden" name="id_jadwal">
                                <input class="btn btn-warning btn-sm" type="submit" value="Read">
                            </form>
                                    <p></p>
                            <form action="adminjadwaledit.php?id_jadwal=<?php echo $data['id_jadwal'] ?>" method="post">
                                <input type="hidden" name="id_jadwal">
                                <input class="btn btn-success btn-sm" type="submit" value="Update">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Move the delete button form outside the while loop -->
        <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete Selected</button>
    </form>
</div>

<?php
include "koneksi.php";

if (isset($_POST['delete'])) {
    if (!empty($_POST['deleteId'])) {
        $deleteIds = $_POST['deleteId'];
        foreach ($deleteIds as $deleteId) {
            $deleteId = intval($deleteId);
            $deleteQuery = "DELETE FROM jadwal WHERE id_jadwal = $deleteId";
            $conn->query($deleteQuery);
        }
    }
}
?>
        </div>
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