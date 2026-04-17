<?php
require_once 'config.php';

$json = file_get_contents('php://input');
$signature = hash_hmac('sha256', $json, TRIPAY_PRIVATE_KEY);
$callbackSignature = $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] ?? '';

if ($callbackSignature !== $signature) {
    exit('Unauthorized Access');
}

$data = json_decode($json);
if ($_SERVER['HTTP_X_CALLBACK_EVENT'] == 'payment_status' && $data->status == 'PAID') {
    
    $pesan = "🔥 *ADA DUIT MASUK! (SPY-E)*\n\n";
    $pesan .= "ID: `{$data->merchant_ref}`\n";
    $pesan .= "Metode: {$data->payment_name}\n";
    $pesan .= "Total: Rp " . number_format($data->amount) . "\n";
    $pesan .= "Status: *LUNAS (SUCCESS)* ✅";

    // Kirim Ke Telegram
    file_get_contents("https://api.telegram.org/bot".TELE_TOKEN."/sendMessage?chat_id=".TELE_CHAT_ID."&text=".urlencode($pesan)."&parse_mode=Markdown");
    
    echo json_encode(['success' => true]);
}
?>
