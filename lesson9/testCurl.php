<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://cleaner.dadata.ru/api/v1/clean/name');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization: Token 4816d32581c10dbb73f99ec07447534b259d358a',
    'X-Secret: c52f80b5f694ccb525aad1bef066121751d5d611',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['Срегей владимерович иванов']));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

curl_close($ch);