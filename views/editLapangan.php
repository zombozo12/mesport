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
include('pemilik/sidebar.php');
include '../conn/database.php';
include "../modal/authbookModel.php";
$model = new authbookModel();
?>
<div class="page">
    <!-- navbar-->
    <?php include('pemilik/navbar.php'); ?>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">List Lapangan Nama Pemilik Lapangan </h1>
                <p align="right">

                </p>
            </header>

            <div class="card">
                <?php
                foreach ($model->getLapangan($_GET['id']) as $data) {
                    ?>
                    <div class="card-header d-flex align-items-center">
                        <h4>Edit Lapangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="../uLapangan" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="idLapangan" value="<?= $data['id'] ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="<?= $data['nama'] ?>" class="form-control" name="nama">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Lapangan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                                    <option value="1">Lapangan Futsal</option>
                                    <option value="2">Lapangan Basket</option>
                                    <option value="3">Lapangan Tenis</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" value="<?= $data['lokasi'] ?>" class="form-control" name="lokasi">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                          rows="3" name="deskripsi"><?= $data['deskripsi'] ?></textarea>
                            </div>
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Lapangan</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="number" class="form-control" id="inlineFormInputGroupUsername2"
                                       value="<?= $data['harga'] ?>"
                                       placeholder="ex : 50000" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="ControlSelect1">Kategori Lapangan</label>
                                <select class="form-control" id="ControlSelect1" name="kategori">
                                    <option value="1">Indoor</option>
                                    <option value="2">Outdoor</option>
                                </select>
                            </div>
                            <label for="ControlSelect1">Pilih Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                            </div>

                            <div class="form-group" style="margin-top: 8px;">
                                <input type="submit" class="btn btn-warning" value="Simpan">
                                <a href="listPemilik" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                ?>
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