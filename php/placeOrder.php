<?php 
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-_L195VVpepb_e8ubVPgy6FA8';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

session_start();
if (!isset($_SESSION['SESSION_EMAIL']) || !isset($_SESSION['SESSION_NAME'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$userName = $_SESSION['SESSION_NAME'];
$userEmail = $_SESSION['SESSION_EMAIL'];

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST['total'],
    ),
    'item_details' => json_decode($_POST['items'], true),
    'customer_details' => array(
        'first_name' => $userName,
        'email' => $userEmail,
    ),
);

foreach ($params['item_details'] as &$item) {
    if (!isset($item['quantity'])) {
        $item['quantity'] = 1;
    }
}
$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
?>