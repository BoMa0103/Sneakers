<?php
    $token = 'uM68R2IhFy9lkq9WwBk2VFSsvrNR1IWwaJVwnyJEZXf8';
    $ccyUAH = 980;

    $amount = $_POST['amount'] ?? 0;

    if ($amount <= 0) {
        echo 'Некоректна сума оплати';
        exit();
    }

    $ch = curl_init('https://api.monobank.ua/api/merchant/invoice/create');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'X-Token: ' . $token,
        'Content-Type: application/json'
    ]);

    // Дані для створення інвойсу
    $invoice_data = json_encode([
        'amount' => $amount * 100,
        'ccy' => $ccyUAH,
        'redirectUrl' => 'http://localhost/sneakers/',
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $invoice_data);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_data = json_decode($response, true);

    if (isset($response_data['pageUrl'])) {
        header('Location: ' . $response_data['pageUrl']);
        exit();
    } else {
        echo 'Помилка при створенні платіжного інвойсу. Спробуйте пізніше.';
    }
?>