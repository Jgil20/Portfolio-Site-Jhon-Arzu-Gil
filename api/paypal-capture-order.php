<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/config.php';

function getPayPalAccessToken()
{
    $ch = curl_init(PAYPAL_BASE_URL . '/v1/oauth2/token');

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_USERPWD => PAYPAL_CLIENT_ID . ':' . PAYPAL_CLIENT_SECRET,
        CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Accept-Language: en_US'
        ]
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error || $httpCode < 200 || $httpCode >= 300) {
        throw new Exception('Could not get PayPal access token.');
    }

    $data = json_decode($response, true);

    if (empty($data['access_token'])) {
        throw new Exception('PayPal access token missing.');
    }

    return $data['access_token'];
}

$input = json_decode(file_get_contents('php://input'), true);
$orderId = trim($input['orderID'] ?? '');

if ($orderId === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Missing PayPal order ID.'
    ]);
    exit;
}

try {
    $accessToken = getPayPalAccessToken();

    $ch = curl_init(PAYPAL_BASE_URL . '/v2/checkout/orders/' . urlencode($orderId) . '/capture');

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ]
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error || $httpCode < 200 || $httpCode >= 300) {
        throw new Exception('Could not capture PayPal payment.');
    }

    $data = json_decode($response, true);

    $capture = $data['purchase_units'][0]['payments']['captures'][0] ?? [];
    $payer = $data['payer'] ?? [];

    $captureId = $capture['id'] ?? null;
    $status = $data['status'] ?? 'UNKNOWN';

    $payerName = trim(
        ($payer['name']['given_name'] ?? '') . ' ' .
        ($payer['name']['surname'] ?? '')
    );

    $payerEmail = $payer['email_address'] ?? null;

    $stmt = $pdo->prepare("
        UPDATE paypal_orders
        SET 
            paypal_capture_id = :paypal_capture_id,
            payer_name = :payer_name,
            payer_email = :payer_email,
            payment_status = :payment_status,
            raw_response = :raw_response
        WHERE paypal_order_id = :paypal_order_id
    ");

    $stmt->execute([
        ':paypal_capture_id' => $captureId,
        ':payer_name' => $payerName,
        ':payer_email' => $payerEmail,
        ':payment_status' => $status,
        ':raw_response' => json_encode($data),
        ':paypal_order_id' => $orderId
    ]);

    echo json_encode([
        'success' => true,
        'status' => $status,
        'capture_id' => $captureId,
        'payer_name' => $payerName,
        'payer_email' => $payerEmail
    ]);
} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'error' => APP_DEBUG ? $e->getMessage() : 'PayPal capture failed.'
    ]);
}