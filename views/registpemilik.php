<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .note {
            text-align: center;
            height: 80px;
            background: #F4BA10;
            ;
            color: #fff;
            font-weight: bold;
            line-height: 80px;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 1.5rem;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #F4BA10;
            color: #fff;
        }
    </style>

</head>

<body>
    <?php include_once('navbar.php') ?>

    <div class="container register-form" style="margin-top: 5%;">
        <div class="form">
            <div class="note">
                <p>Mendaftar Sebagai Pemilik Lapangan</p>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="Assets/owner.svg" alt="" style=" margin-right: 30%; width: 80%; transform: scaleX(-1);">
                   
        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama anda" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="No telephonr " value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Lapangan " value="" />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Password " value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Confirm Password " value="" />
                        </div>

                    </div>
                </div>

               
                <center>
                <button type="button" class="btnSubmit" style="margin-top: 10px;">Submit</button>
                </center>
            </div>
        </div>
        
          
        </div>
        <div class="footer" style="margin-top: 5%">
        <?php include_once('footer.php') ?>
        </div>
</body>

</html>