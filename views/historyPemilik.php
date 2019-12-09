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
                <h1 class="h3 display">Histori Pesanan </h1>
            </header>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr style="background-color: #F4BA10; color: white; font: bold;">
                        <th>#</th>
                        <th>Nama Lapangan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($model->historyPesanan() as $data) {
                        ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $data['nama_lapangan'] ?></td>
                            <td><?= $data['book_start'] . ' - ' . $data['book_end']?></td>
                            <td><?= $data['acc_status'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
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