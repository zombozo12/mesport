<?php
require "vendor/autoload.php";
session_start();

$connect = mysqli_connect("localhost", "root", '', "db_mesport");
if (!$connect) {
    die('Connection Failed');
}

$order_id = $_SESSION['order_id'];
$id_booking = $_SESSION['id_booking'];
$id_pengguna = $_SESSION['id_pengguna'];

if($order_id == null || $order_id == ""){
    header("Location: /home");
}

$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $order_id . '/status',
    ['headers' => [
        'Authorization' => 'Basic U0ItTWlkLXNlcnZlci0zS0JkYXlUbTRaRlp2SVdHdDZ5YkFxWnA6',
        'Content-Type' => 'application/json',
        'Connection' => 'keep-alive'
    ]]
);

$add = $connect->prepare("INSERT INTO tbl_pembayaran(id_pengguna, id_booking, metode) VALUES(?,?,?)");
$add->bind_param("iis", $id_pengguna, $id_booking, json_decode($response->getBody())->payment_type);
$add->execute();
$add->store_result();

if($add->affected_rows == 0){
    echo "<script>alert('Gagal memasukkan Pembayaran ke database');window.location='/home';</script>";
    return;
}
echo "<script>alert('Berhasil memasukkan Pembayaran ke database');window.location='/home';</script>";
