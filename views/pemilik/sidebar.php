<?php session_start(); ?>
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->

            <h2 class="h5">Hi, <?= $_SESSION['nama']; ?></h2>

        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="pesananPemilik">Pesanan Masuk</a></li>
                <li><a href="historyPemilik">Histori Pesanan</a></li>
                <li><a href="listPemilik">List Lapangan</a></li>
                <li class="active"><a href="profilePemilik">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>