<!doctype html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>MeSport</title>

</head>

<body>

<!-- tambahin navbar -->

<!--Profil User-->
<div class="container">
    <div class="card" style="width: 70%;margin:auto; margin-top: 5%; margin-bottom: 5%;">
        <div class="card-header">
            <center>
                <h4>Edit Profil Pengguna</h4>
                <?php
                    if(!empty($_SESSION['foto'])){
                        ?><img src="Assets/img/<?= $_SESSION['foto']; ?>" alt="" style="width:100px"><?php
                    }else{
                        ?><img src="Assets/logo MeSport!.png" alt="" style="width:100px"><?php
                    }
                ?>
            </center>
        </div>
        <div class="card-body">
            <form action="uProfileUser" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" placeholder="Nama Pemilik" value="<?= $_SESSION['nama']; ?>" class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label>Kontak</label>
                    <input type="text" placeholder="Kontak Pemilik" value="<?= $_SESSION['kontak']; ?>" class="form-control" name="nohp">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email Pemilik" value="<?= $_SESSION['email']; ?>" class="form-control" name="email">
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
                    <input type="submit" class="btn btn-warning btn-block" value="Simpan" >

                </div>
            </form>
        </div>
    </div>
</div>

<!-- tambahin footer -->
</body>
</html>