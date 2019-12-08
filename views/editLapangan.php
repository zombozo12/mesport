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
            <li ><a href="pesanan.html">Pesanan Masuk                             </a></li>
            <li ><a href="historypemilik.html">Histori Pesanan                             </a></li>
            <li class="active"><a href="listPemilik.php">List Lapangan                             </a></li>
            <li ><a href="profilePemilik.php"> Profile                             </a></li>
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
                  <div class="brand-text d-none d-md-inline-block"><img src="../Assets/logo white.png" alt="" style="width: 120px;"></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <!-- Log out-->
                <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
           <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">List Lapangan Nama Pemilik Lapangan         </h1>
            <p align="right">
      
        </p>
          </header>
                  
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4>Edit Lapangan</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" value="Lapangan A" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Lapangan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>Lapangan Futsal</option>
                      <option>Lapangan Basket</option>
                      <option>Lapangan Tenis</option>
                    </select>
                  </div>

                <div class="form-group">       
                  <label>Lokasi</label>
                  <input type="text" value="Bandung" class="form-control">
                </div>
                <div class="form-group">       
                    <label>Deskripsi</label>
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3"> lorem ipsum</textarea>
                  </div>
                  <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Lapangan</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="number" class="form-control" id="inlineFormInputGroupUsername2" value="100000" placeholder="ex : 50000">
                  </div>
                  <div class="form-group">
                    <label for="ControlSelect1">Kategori Lapangan</label>
                    <select class="form-control" id="ControlSelect1">
                      <option>Lapangan Indoor</option>
                      <option>Lapangan Outdoor</option>
                    </select>
                  </div>
                  <label for="ControlSelect1">Pilih Gambar</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                  </div>

                <div class="form-group" style="margin-top: 8px;">       
                  <input type="submit" class="btn btn-warning" value="Simpan" class="btn btn-primary">
                  <button class="btn btn-secondary">Kembali</button>
                </div>
              </form>
            </div>
          </div>
        </div>
           
      </section>
      </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Main File-->
    
  </body>
</html>