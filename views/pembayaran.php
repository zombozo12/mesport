<?php
require "vendor/autoload.php";
session_start();

$connect = mysqli_connect("localhost", "root", '', "db_mesport");
if (!$connect) {
    die('Connection Failed');
}

if (!isset($_POST['id'])) {
    die('Kode Booking tidak ditemukan, harap kembali ke halaman sebelumnya');
}

$id_booking = mysqli_real_escape_string($connect, $_POST['id']);

$get_all = $connect->prepare("SELECT tbl_booking.id_lapangan, 
tbl_booking.id_pengguna, tbl_booking.start, tbl_booking.end, tbl_lapangan.harga, tbl_lapangan.nama,
tbl_user.nama, tbl_user.kontak, tbl_user.email FROM tbl_booking
INNER JOIN tbl_lapangan ON tbl_lapangan.id = tbl_booking.id_lapangan
INNER JOIN tbl_user ON tbl_user.id = tbl_booking.id_pengguna
WHERE tbl_booking.id = ?");

$get_all->bind_param("i", $id_booking);
$get_all->execute();
$get_all->store_result();

if ($get_all->num_rows == 0) {
    die('Kode Booking tidak ditemukan, harap kembali ke halaman sebelumnya');
}

$get_all->bind_result($id_lapangan, $id_pengguna, $book_start, $book_end, $harga, $nama_lapangan, $nama_pengguna, $kontak_pengguna, $email_pengguna);
while ($get_all->fetch()) {
    $start = explode(":", $book_start);
    $end = explode(":", $book_end);

    $durasi = $end[0] - $start[0];
    $total_harga = $durasi * $harga;


//Set Your server key
    Veritrans_Config::$serverKey = "SB-Mid-server-3KBdayTm4ZFZvIWGt6ybAqZp";

// Enable sanitization
    Veritrans_Config::$isSanitized = true;

// Enable 3D-Secure
    Veritrans_Config::$is3ds = true;


// Required
    $order_id = rand();
    $transaction_details = array(
        'order_id' => $order_id,
        'gross_amount' => $total_harga, // no decimal allowed for creditcard
    );

// Optional
    $item1_details = array(
        'id' => 'lapangan',
        'price' => $total_harga,
        'quantity' => 1,
        'name' => "Lapangan " . $nama_lapangan
    );

// Optional
    $item_details = array($item1_details);

// Optional
    $billing_address = array(
        'first_name' => $nama_pengguna,
        'phone' => $kontak_pengguna,
        'country_code' => 'IDN'
    );

// Optional
    $customer_details = array(
        'first_name' => $nama_pengguna,
        'email' => $email_pengguna,
        'phone' => $kontak_pengguna,
        'billing_address' => $billing_address,
    );

// Optional, remove this to display all available payment methods
    $enable_payments = array('credit_card', 'mandiri_clickpay', 'echannel', 'gopay');

// Fill transaction details
    $transaction = array(
        'enabled_payments' => $enable_payments,
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    $snapToken = Veritrans_Snap::getSnapToken($transaction);

    $_SESSION['order_id'] = $order_id;
    $_SESSION['id_booking'] = $id_booking;
    $_SESSION['id_pengguna'] = $id_pengguna;
    ?>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-S2yxX3FmwhSqwHBK"></script>
    <script type="text/javascript">
        snap.pay('<?=$snapToken?>', {
            // Optional
            onSuccess: function (result) {
                /* You may add your own js here, this is just example */
                //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function (result) {

                //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                window.location = "/finishingPembayaran";
            },
            // Optional
            onError: function (result) {
                /* You may add your own js here, this is just example */
                //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    </script>

    <a href="../">< Back</a>
    <?php


} ?>