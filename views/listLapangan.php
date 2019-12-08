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
<?php include_once('navbar.php') ?>

<?php
if (!isset($_SESSION['lapangan'])) {
    header('Location: home');
    return;
}

foreach($_SESSION['lapangan'] as $data) {
    ?>
    <div class="row row-cols-1" style="margin-top: 5%; margin-bottom: 5%;">
        <div class="card mb-3" style="width: 60%; margin: auto; background-color: #F4BA10;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="Assets/img/<?= $data['foto'] ?>"
                         class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="DetLap.html" style="text-decoration: none;">
                            <h5 class="card-title" style="font-weight: bold; color: whitesmoke;"><?= $data['nama']?></h5>
                            <p class="card-text" style="color: whitesmoke;"><?= $data['jenis'] ?></p>
                            <p class="card-text" style="color: whitesmoke;">
                                <small class="text-muted"><?= $data['lokasi'] ?></small>
                            </p>
                            <p class="card-text" style="color: whitesmoke;">Rp <?= $data['harga'] ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
include_once('footer.php') ?>
</body>
</html>