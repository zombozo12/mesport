<?php
session_start();
?>
<?php include_once('navbar.php') ?>

<div class="header" style="text-align: center; margin-top: 5%;">
    <h1><b>Selamat Datang di MeSport</b></h1>
    <h1>Pesan lapangan disekitar anda</h1>
    <div class="row d-flex justify-content-center" style="margin-top: 1%;">
        <div class="col-md-4 ">
            <form action="cariLapangan" method="post">
                <div class="input-group-prepend mb-3 stroke">
                    <input type="text" class="form-control" placeholder="Cari lapangan" id="search"
                           aria-describedby="basic-addon2" name="cari">
                    <div class="input-group-append">
                        <button class="btn warnabtn " type="submit" name="cari">Cari</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<br>


<img src="Assets/homepage.png" class="img-fluid" style="margin-top: 5%; width: 100%;">


<div class="jumbotron jumbotron-fluid warnabtn" style="margin-top: -1%;display: block;  height: 700px;">
    <div class="container" style="margin-top: 4%;">
        <h2><b>Tersedia Lapangan </b></h2>
        <div class="gambar" style="margin-top: 8%;">

            <img src="Assets/Asset 1.png" alt="">
            <img src="Assets/Asset 2.png" style="margin-left: 24px; margin-right: 24px;" alt="">
            <img src="Assets/Asset 3.png" alt="">

        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid "
     style="margin-top: -5%;display: block;  height: 500px; background-color: #FFFFFF;">
    <div class="container">
        <h1>3 Langkah mudah untuk melakukan booking</h1>

        <div class="card-deck" style="margin-top: 12px;;">

            <div class="card" style="border: none;">
                <center>
                    <img src="Assets/search.png" style="width: 60%;" class="card-img-top" alt="...">
                </center>
                <div class="card-body">
                    <h5 class="card-title">Cari</h5>
                </div>
            </div>
            <div class="card" style="border: none;">
                <center>
                    <img src="Assets/click.png" style="width: 60%;" class="card-img-top" alt="...">
                </center>
                <div class="card-body">
                    <h5 class="card-title">Klik</h5>
                </div>
            </div>
            <div class="card" style="border: none;">
                <center>
                    <img src="Assets/book.png" style="width: 60%;" class="card-img-top" alt="...">
                </center>
                <div class="card-body">
                    <h5 class="card-title">Booking</h5>
                </div>
            </div>


        </div>

    </div>
</div>


<?php include_once('footer.php') ?>

</body>

</html>