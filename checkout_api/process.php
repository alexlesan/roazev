<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    $expirationDate = explode('/', $_POST['expiration_date']);
    $documentNumber = $_POST['document_number'] ?? "";
    $amount = $_POST['amount'] ?? 0;
    $card = [
        $_POST['card_number'] ?? "",
        $_POST['card_holder'] ?? "",
        $expirationDate[0] ?? "",
        $expirationDate[1] ?? "",
        $_POST['security_code'] ?? "",
        $_POST['card_type'] ?? 1
    ];
    $seller = [
        $_POST['order_number'] ?? "",
        $_POST['order_description'] ?? "",
    ];

    $customer = [
        $_POST['customer_cdh'] ?? "",
        $_POST['customer_first_name'] ?? "",
        $_POST['customer_last_name'] ?? "",
        $_POST['customer_email'] ?? "",
        $_POST['customer_phone'] ?? "",
        $_POST['customer_address'] ?? "",
        $_POST['customer_complement'] ?? "",
        $_POST['customer_city'] ?? "",
        $_POST['customer_state'] ?? "",
        $_POST['customer_zip'] ?? "",
        $_POST['customer_ip'] ?? "",
        $_POST['customer_country'] ?? "BRA",

    ];
}