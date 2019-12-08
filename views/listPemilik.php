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
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->

            <h2 class="h5">Hi, Nama Pemilik Lapangan</h2>


        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="pesanan.html">Pesanan Masuk </a></li>
                <li><a href="historypemilik.html">Histori Pesanan </a></li>
                <li class="active"><a href="listPemilik.php">List Lapangan </a></li>
                <li><a href="profilePemilik.php"> Profile </a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <!-- logo disini -->
                        <div class="brand-text d-none d-md-inline-block"><img src="../Assets/logo white.png" alt=""
                                                                              style="width: 120px;"></div>
                        </a></div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Notifications dropdown-->
                        <!-- Log out-->
                        <li class="nav-item"><a href="login.html" class="nav-link logout"> <span
                                        class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">List Lapangan Nama Pemilik Lapangan </h1>
                <p align="right">
                    <a href="tambahLapangan.php">
                        <button class="btn btn-warning"> + Tambah Lapangan</button>
                    </a>
                </p>
            </header>

            <div class="card-deck">
                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan A</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>

                    </div>
                </div>
                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan B</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>

                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan C</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>


            <div class="card-deck">
                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan D</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>

                    </div>
                </div>
                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan E</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </div>

                <div class="card">
                    <img src="../Assets/lapangan.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lapangan F</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                        <a href="editlapangan.html">
                            <button class="btn btn-warning"> Edit</button>
                        </a>
                        <button class="btn btn-danger">Delete</button>
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