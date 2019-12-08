<?php
include '../conn/database.php';
include "../modal/authbookModel.php";
$model = new authbookModel();

$id = $_GET['id'];
$status = 2;

if($model->ubahStatusPesanan($id, $status)){
    header('Location: /pesananPemilik');
    return;
}

echo "<script>alert('". $_SESSION['message'] ."')</script>";