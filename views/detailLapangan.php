<?php
include_once('navbar.php');
error_reporting(1);
include '../conn/database.php';
include "../modal/authbookModel.php";
$model = new authbookModel();

$idPemilik = '';
foreach ($model->getLapanganUser($_GET['id']) as $data) {
    $idPemilik = $data['id_pemilik'];
    ?>
    <div class="card" style="width: 50%; margin:auto; margin-top: 5%; margin-bottom: 5%; border-color: #F4BA10;">
        <img src="../Assets/img/<?= $data['foto'] ?>"
             height="300" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title"><?= $data['nama'] ?></h5>
            <hr>
            <p class="font-weight-light"><?= $data['deskripsi'] ?></p>
            <p class="font-weight-light"><?= $data['jenis'] ?></p>
            <p class="font-weight-light"><?= $data['kategori'] ?></p>
            <hr>
            <p class="card-text"><?= $data['lokasi'] ?></p>
            <hr>
            <p class="card-text">Rp <?= $data['harga'] ?></p>
            <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        style="background-color: #F4BA10; border-color: #F4BA10;">- B O O K I N G -
                </button>
            </center>
        </div>
    </div>
    <?php
}
?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Lapangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../bookLapangan" method="post">
                    <div class="modal-body" style="background-color: #F4BA10;">
                        <input type="hidden" name="idLapangan" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="idPemilik" value="<?= $idPemilik ?>">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Start Booking</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="start">
                                <?php
                                    for($i = 10; $i <= 19; $i++){
                                        ?>
                                        <option value="<?= $i .':00'  ?>"><?= $i .':00' ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">End Lapangan</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="end">
                                <?php
                                for($i = 10; $i <= 19; $i++){
                                    ?>
                                    <option value="<?= $i .':00'  ?>"><?= $i .':00' ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"
                                style="background-color: #F4BA10; border-color: #F4BA10;">
                            Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('footer.php') ?>