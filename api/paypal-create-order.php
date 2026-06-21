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

$serviceName = trim($input['service_name'] ?? '');
$amount = $input['amount'] ?? 0;

$allowedServices = [
        'Custom Consultation Deposit' => 100.00,
    '3-Page Website Development' => 1000.00,
    'Website Optimization' => 1500.00,
    'Local SEO Monthly Package' => 500.00,
    'PPC Online Advertising' => 450.00
    'SAP Consultation Deposit' => 100.00,
    'SAP Reporting Support Deposit' => 250.00,
    'SAP Analytics Dashboard Deposit' => 300.00,
    'Business Intelligence Consulting Deposit' => 250.00,
    'Data Validation Support Deposit' => 200.00

];

if (!isset($allowedServices[$serviceName])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid service selected.'
    ]);
    exit;
}

$expectedAmount = $allowedServices[$serviceName];

if ((float) $amount !== (float) $expectedAmount) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid payment amount.'
    ]);
    exit;
}

try {
    $accessToken = getPayPalAccessToken();

    $orderPayload = [
        'intent' => 'CAPTURE',
        'purchase_units' => [
            [
                'description' => $serviceName,
                'amount' => [
                    'currency_code' => PAYPAL_CURRENCY,
                    'value' => number_format($expectedAmount, 2, '.', '')
                ]
            ]
        ],
        'application_context' => [
            'brand_name' => 'Jhon Arzu-Gil Portfolio',
            'shipping_preference' => 'NO_SHIPPING',
            'user_action' => 'PAY_NOW'
        ]
    ];

    $ch = curl_init(PAYPAL_BASE_URL . '/v2/checkout/orders');

    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ],
        CURLOPT_POSTFIELDS => json_encode($orderPayload)
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error || $httpCode < 200 || $httpCode >= 300) {
        throw new Exception('Could not create PayPal order.');
    }

    $data = json_decode($response, true);

    $stmt = $pdo->prepare("
        INSERT INTO paypal_orders 
        (paypal_order_id, service_name, amount, currency, payment_status, raw_response)
        VALUES 
        (:paypal_order_id, :service_name, :amount, :currency, :payment_status, :raw_response)
    ");

    $stmt->execute([
        ':paypal_order_id' => $data['id'],
        ':service_name' => $serviceName,
        ':amount' => $expectedAmount,
        ':currency' => PAYPAL_CURRENCY,
        ':payment_status' => $data['status'] ?? 'CREATED',
        ':raw_response' => json_encode($data)
    ]);

    echo json_encode([
        'success' => true,
        'id' => $data['id']
    ]);
} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'error' => APP_DEBUG ? $e->getMessage() : 'PayPal order creation failed.'
    ]);
}