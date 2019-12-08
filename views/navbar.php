<?php

if (!isset($_SESSION)) session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="Assets/css/modal.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/app.css">
    <script src="Assets/js/modal.js"></script>
    <title>MeSport</title>
</head>


<body>
<!-- belum login -->
<?php if (!isset($_SESSION['id'])) { ?>
    <nav class=" navbar navbar-expand-md navbar-light bg-white fixed-nav-bar ">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <img src="Assets/logo MeSport!.png" alt="Logo" style="width: 100px;">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="login">
                            <a class="nav-link" data-toggle="modal" data-target="#0" href="">Login</a>
                        </div>
                    </li>
                </ul>

                <div class="user-modal">
                    <div class="user-modal-container" id="mymodal">
                        <ul class="switcher">
                            <li><a href="#0">Sebagai Pengguna Lapangan</a></li>
                            <li><a href="#0">Sebagai Pemilik Lapangan</a></li>
                        </ul>
                        <!-- LOGIN USER -->
                        <div id="login">
                            <form class="form" action="loginUser" method="post">
                                <div class="row">
                                    <div class="col-sm">
                                        <center>
                                            <img class="img-fluid" src="Assets/player.svg" alt=""
                                                 style="width: 50%; transform: scaleX(-1);">

                                            <h3 style="margin-top: 8%;"> Cari dan booking lapangan sesuai dengan
                                                olahraga anda </h3>
                                        </center>
                                    </div>
                                    <div class="col-sm">
                                        <p class="fieldset">
                                            <label class="image-replace email" for="signin-email">E-mail</label>
                                            <input class="full-width has-padding has-border" id="signin-email"
                                                   type="email" placeholder="E-mail" name="email">
                                            <span class="error-message">An account with this email address does not exist!</span>
                                        </p>

                                        <p class="fieldset">
                                            <label class="image-replace password"
                                                   for="signin-password">Password</label>
                                            <input class="full-width has-padding has-border" id="signin-password"
                                                   type="password" placeholder="Password" name="password">
                                            <a href="#0" class="hide-password">Show</a>
                                            <span class="error-message">Wrong password! Try again.</span>
                                        </p>


                                        Belum Memiliki akun?
                                        <a class="text-link" href="registbook">DAFTAR</a>
                                        <p class="fieldset">
                                            <input class="full-width" type="submit"
                                                   value="Login Sebagai Pengguna Lapangan">
                                        </p>
                            </form>


                            <!-- <a href="#0" class="close-form">Close</a> -->
                        </div>
                    </div>

                </div>
                <!-- LOGIN LAPANGAN -->
                <div id="signup">
                    <form class="form" action="loginPemilik" method="post">
                        <div class="row">
                            <div class="col-sm">
                                <center>
                                    <img class="img-fluid" src="Assets/owner.svg" alt="" style="width: 70%;">

                                    <h3 style="margin-top: 8%;"> Bergabung bersama kami untuk memasarkan lapangan anda! </h3>
                                </center>

                                <!-- <a href="#0" class="close-form">Close</a> -->
                            </div>
                            <div class="col-sm">
                                <p class="fieldset">
                                    <label class="image-replace email" for="signin-email">E-mail</label>
                                    <input class="full-width has-padding has-border" id="signin-emaillap"
                                           type="email" placeholder="E-mail" name="email">
                                    <span class="error-message">An account with this email address does not exist!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace password" for="signin-password">Password</label>
                                    <input class="full-width has-padding has-border" id="signin-passwordlap"
                                           type="password" placeholder="Password" name="password">
                                    <a href="#0" class="hide-password">Show</a>
                                    <span class="error-message">Wrong password! Try again.</span>
                                </p>

                                Ingin gabung bersama kami?
                                <a class="text-link" href="registpemilik">DAFTAR</a>

                                <p class="fieldset">
                                    <input class="full-width" type="submit" value="Login Sebagai Pemilik Lapangan">
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- LOGIN LAPANGAN -->
        <div id="signup">
            <form class="form" action="ayeaye" method="post">
                <div class="row">
                    <div class="col-sm">
                        <p class="fieldset">
                            <label class="image-replace email" for="signin-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="signin-emaillap" type="email"
                                   placeholder="E-mail">
                            <span class="error-message">An account with this email address does not exist!</span>
                        </p>

                        <p class="fieldset">
                            <label class="image-replace password" for="signin-password">Password</label>
                            <input class="full-width has-padding has-border" id="signin-passwordlap" type="password"
                                   placeholder="Password">
                            <a href="#0" class="hide-password">Show</a>
                            <span class="error-message">Wrong password! Try again.</span>
                        </p>

                        Ingin gabung bersama kami?
                        <a class="text-link" href="registpemilik">DAFTAR</a>

                        <p class="fieldset">
                            <input class="full-width" type="submit" value="Login Sebagai Pemilik Lapangan">
                        </p>
                    </div>
                </div>
            </form>
            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div>
        <!-- End Modal Section -->
    </nav>
    <!-- belum login  end -->

    <!-- udah login -->

<?php } else { ?>
    <nav class=" navbar navbar-expand-md navbar-light bg-white fixed-nav-bar ">
        <div class="container-fluid">
            <a class="navbar-brand" href="home">
                <img src="Assets/logo MeSport!.png" alt="Logo" style="width: 100px;">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <div class="dropdown">
                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['nama']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        if($_SESSION['role'] === 'user'){
                            ?>
                            <a class="dropdown-item" href="profileUser">Profile</a>
                            <a class="dropdown-item" href="historyUser">History</a>
                            <a class="dropdown-item" href="logout">Logout</a>
                            <?php
                        }else{
                            ?>
                            <a class="dropdown-item" href="profilePemilik">Profile</a>
                            <a class="dropdown-item" href="historyPemilik">History</a>
                            <a class="dropdown-item" href="logout">Logout</a>
                            <?php
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
<?php } ?>
<!-- udah login end -->
</body>
</html>