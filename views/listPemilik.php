<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MeSport</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../Assets/css/style.default.css" id="theme-stylesheet">

</head>
<body>
<!-- Side Navbar -->
<?php
error_reporting(0);
include('views/pemilik/sidebar.php');
$model = new authbookModel();
?>
<div class="page">
    <!-- navbar-->
    <?php include('views/pemilik/navbar.php'); ?>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">List Lapangan <?= $_SESSION['nama']; ?></h1>
                <p align="right">
                    <a href="tambahLapangan">
                        <button class="btn btn-warning"> + Tambah Lapangan</button>
                    </a>
                </p>
            </header>

            <div class="card-deck">
                <?php
                foreach ($model->getAllLapangan() as $data) {
                    ?>
                    <div class="card">
                        <img src="Assets/img/<?= $data['foto'] ?>" class="card-img-top" alt="<?= $data['nama']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama'] ?></h5>
                            <p class="card-text"><?= $data['deskripsi'] ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="views/editLapangan.php?id=<?= $data['id']; ?>">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <a href="deleteLapangan?id=<?= $data['id']; ?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>


    </section>
</div>
<!-- JavaScript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Main File-->

</body>
</html>