<?php

include_once('navbar.php');
$model = new authbookModel();
?>
<header>
    <center><h1 class="h3 display" style="margin-top: 5%;">Histori Pesanan</h1></center>
</header>

<hr style="border-color: lightblue; width: 70%;">
<!-- tabel histori -->
<div class="container" style="width: 60%;margin:auto;">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr style="background-color: #F4BA10; color: white; font: bold;">
                <th>#</th>
                <th>Nama Lapangan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody style="color: gray;">
            <?php
            $no = 1;
            foreach ($model->historyUser() as $data) {
                ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $data['nama_lapangan'] ?></td>
                    <td><?= $data['book_start'] . ' - ' . $data['book_end'] ?></td>
                    <td><?= $data['acc_status'] ?></td>

                    <?php
                    if ($data['acc_status'] === 'Pending') {
                        ?>
                        <td>
                            <form action="../pembayaran" method="post">
                                <input type="hidden" name="id" value="<?= $data['id_booking'];?>"/>
                                <button type="submit" class="btn btn-primary"
                                        style="background-color: #F4BA10; border-color: #F4BA10;">
                                    Bayar
                                </button>
                            </form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


