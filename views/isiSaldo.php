<?php
require "vendor/autoload.php";
session_start();
$saldo = $_POST['jumlahSaldo'];

//Set Your server key
Veritrans_Config::$serverKey = "SB-Mid-server-3KBdayTm4ZFZvIWGt6ybAqZp";

// Enable sanitization
Veritrans_Config::$isSanitized = true;

// Enable 3D-Secure
Veritrans_Config::$is3ds = true;


// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $saldo, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'saldo',
    'price' => $saldo,
    'quantity' => 1,
    'name' => "Saldo"
);

// Optional
$item_details = array($item1_details);

// Optional
$billing_address = array(
    'first_name' => $_SESSION['nama'],
    'phone' => $_SESSION['kontak'],
    'country_code' => 'IDN'
);

// Optional
$customer_details = array(
    'first_name' => $_SESSION['nama'],
    'email' => $_SESSION['email'],
    'phone' => $_SESSION['kontak'],
    'billing_address' => $billing_address,
);

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel', 'gopay');

// Fill transaction details
$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Veritrans_Snap::getSnapToken($transaction);

?>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-S2yxX3FmwhSqwHBK"></script>
<script type="text/javascript">
    snap.pay('<?=$snapToken?>', {
        // Optional
        onSuccess: function (result) {
            /* You may add your own js here, this is just example */
            <?php
                $auth->isiSaldo($saldo);
            ?>
            //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onPending: function (result) {

            //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function (result) {
            /* You may add your own js here, this is just example */
            //document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
    });
</script>

<a href="../">< Back</a>