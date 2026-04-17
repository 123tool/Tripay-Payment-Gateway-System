<?php
require_once 'config.php';

$merchantRef = 'SPYE-' . time();
$amount      = 50000;

$data = [
    'method'         => 'BRIVA',
    'merchant_ref'   => $merchantRef,
    'amount'         => $amount,
    'customer_name'  => 'Pelanggan SPY E',
    'customer_email' => 'customer@gmail.com',
    'customer_phone' => '08123456789',
    'order_items'    => [
        ['sku' => 'PROD-01', 'name' => 'Top Up Saldo', 'price' => 50000, 'quantity' => 1]
    ],
    'return_url'   => 'https://domain.com/status',
    'expired_time' => (time() + (24 * 60 * 60)),
    'signature'    => hash_hmac('sha256', TRIPAY_MERCHANT_CODE.$merchantRef.$amount, TRIPAY_PRIVATE_KEY)
];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL            => 'https://tripay.co.id/api/transaction/create',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.TRIPAY_API_KEY],
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data)
]);

$response = curl_exec($curl);
$result = json_decode($response, true);

if ($result['success']) {
    header("Location: " . $result['data']['checkout_url']);
} else {
    echo "Gagal: " . $result['message'];
}
?>
