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
<?php include('views/pemilik/sidebar.php'); ?>
<div class="page">
    <!-- navbar-->
    <?php include('views/pemilik/navbar.php'); ?>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Profil <?= $_SESSION['nama']; ?></h1>
                <p align="right">

                </p>
            </header>

            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Edit Profil</h4>
                </div>
                <div class="card-body">
                    <form action="uProfilePemilik" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama Pemilik" value="<?= $_SESSION['nama']; ?>"
                                   class="form-control" name="nama">
                        </div>

                        <div class="form-group">
                            <label>Kontak</label>
                            <input type="text" placeholder="Kontak Pemilik" value="<?= $_SESSION['kontak']; ?>"
                                   class="form-control" name="nohp">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Email Pemilik" value="<?= $_SESSION['email']; ?>"
                                   class="form-control" name="email">
                        </div>


                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="Password Pemilik" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Re-type Password</label>
                            <input type="password" placeholder="Re-type Password" class="form-control" name="password2">
                        </div>

                        <label for="ControlSelect1">Pilih Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                        </div>

                        <div class="form-group" style="margin-top: 8px;">
                            <input type="submit" class="btn btn-warning btn-block" value="Simpan">
                        </div>
                    </form>
                </div>
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