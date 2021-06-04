<?php

const API_LOGIN_URL = 'https://sandbox-cm.paynet.net.br/login';
const API_CARD_URL = 'https://sandbox-cm.paynet.net.br/card';
const API_FINANCIAL_URL = 'https://sandbox-cm.paynet.net.br/financial';
$res = apiFinancial(
    "76600763000135",
    1000,
    ["76600763000135", "DANIEL BRUNO", "10", "24", "413", 1],
    ["0000000018", "PAG*TESTE"],
    ["05002827063", "JOAO", "PAULO", "joaopaulo@teste.com.br", "11999995555", "Nome da Rua", "Complemento", "São Paulo", "SP", "02471220", "127.0.0.1", "BRA"]
);
print_r($res);

/**
 * run the api login and get the api key
 * @return false
 */
function apiLogin($email = "sysop@azev.in", $password = "tr1kAl1WQhDC")
{
    $response = apiCurl(API_LOGIN_URL, json_encode(["email" => $email, "password" => $password]));
    $json = json_decode($response);
    return $json->api_key ?? null;
}

/**
 * Api Financial call
 * @param $documentNumber
 * @param $amount
 * @param $card
 * @param $seller
 * @param $customer
 * @return mixed
 */
function apiFinancial($documentNumber, $amount, $card, $seller, $customer)
{
    list($cardNumber, $cardHolder, $expMonth, $expYear, $securityCode, $brand) = $card;
    list($orderNumber, $softDescription) = $seller;
    list($documentNumberCDH, $fistName, $lastName, $email, $phoneNumber, $address, $complement, $city, $state, $zip, $ip, $country) = $customer;
    $customerName = $fistName . ' ' . $lastName;
    $authorization = apiLogin();
    if(!empty($authorization)){
        $token = apiEncryptCard($cardNumber, $cardHolder, $expMonth, $expYear, $customerName, $authorization);
        $postData = [
            "payment" => [
                "documentNumber" => $documentNumber,
                "transactionType" => 1,
                "amount" => $amount,
                "currencyCode" => "brl",
                "productType" => 1,
                "installments" => 1,
                "captureType" => 1,
                "recurrent" => false,
            ],
            "cardInfo" => [
                "numberToken" => "{{$token}}",
                "cardholderName" => $cardHolder,
                "securityCode" => $securityCode,
                "brand" => $brand,
                "expirationMonth" => $expMonth,
                "expirationYear" => $expYear,
            ],
            "sellerInfo" => [
                "orderNumber" => $orderNumber,
                "softDescriptor" => $softDescription,
            ],
            "customer" => [
                "documentType" => 1,
                "documentNumberCDH" => $documentNumberCDH,
                "firstName" => $fistName,
                "lastName" => $lastName,
                "email" => $email,
                "phoneNumber" => $phoneNumber,
                "address" => $address,
                "complement" => $complement,
                "city" => $city,
                "state" => $state,
                "zipCode" => $zip,
                "ipAddress" => $ip,
                "country" => $country,
            ],
            "transactionSimple" => "1"
        ];

        $res = apiCurl(API_FINANCIAL_URL, json_encode($postData), $authorization);
        return json_decode($res);
    } else {
        return ['error' => 'no authorization code'];
    }

}

/** Encrypt card
 * @param $cardNumber
 * @param $cardHolder
 * @param $expMonth
 * @param $expYear
 * @param $customerName
 * @return false
 */
function apiEncryptCard($cardNumber, $cardHolder, $expMonth, $expYear, $customerName, $authorization)
{
    $postData = array();
    if ($authorization) {
        $postData = array(
            "cardNumber" => $cardNumber,
            "cardHolder" => $cardHolder,
            "expirationMonth" => $expMonth,
            "expirationYear" => $expYear,
            "customerName" => $customerName,
        );
    }
    $json = apiCurl(API_CARD_URL, json_encode($postData), $authorization);
    print_r($json);
    return $json->numberToken ?? false;
}

/**
 * make the api call
 * @param $url
 * @param $postData
 * @param  null  $authorization
 * @return bool|string
 */
function apiCurl($url, $postData, $authorization = null)
{
    $header = array(
        'Content-Type: application/json',
        'Route: 1',
        'Version: v2'
    );

    if (!empty($authorization)) {
        array_push($header, 'Authorization: ' . $authorization);
    }

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => $header,
        )
    );

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
