<?php
    // Параметри для Monopay
    $token = 'uM68R2IhFy9lkq9WwBk2VFSsvrNR1IWwaJVwnyJEZXf8'; // API-токен Monobank
    $order_id = uniqid(); // Унікальний ідентифікатор замовлення

    // Дані з форми
    $amount = $_POST['amount'] ?? 0; // Сума замовлення

    // Перевірка коректності суми
    if ($amount <= 0) {
        echo 'Некоректна сума оплати';
        exit();
    }

    // Підключення до Monobank API для створення платіжного інвойсу
    $ch = curl_init('https://api.monobank.ua/api/merchant/invoice/create');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'X-Token: ' . $token,
        'Content-Type: application/json'
    ]);

    // Дані для створення інвойсу
    $invoice_data = json_encode([
        'amount'       => $amount * 100, // Сума у копійках (для 100 грн = 10000)
        'redirect_url' => 'http://localhost/sneakers/', // Куди перенаправити після оплати
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $invoice_data);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_data = json_decode($response, true);
    var_dump($response_data);

    // Перевіряємо, чи вдалося створити інвойс
    if (isset($response_data['page_url'])) {
        // Перенаправляємо користувача на сторінку оплати
        header('Location: ' . $response_data['page_url']);
        exit();
    } else {
        echo 'Помилка при створенні платіжного інвойсу. Спробуйте пізніше.';
    }
?>