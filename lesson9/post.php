<?php 

$request = 'Антон';

$url = 'https://cleaner.dadata.ru/api/v1/clean/name';

$token = "0c8b7d7788ff4d71d12e08ba8ea0dc772a065907";
$secret = "940a6eb08da1765d18a14f478840eac34cbb771d";

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POST => true,
    CURLOPT_HEADER => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $url,
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Token ' . $token . '',
        'X-Secret: '. $secret .''
    ]
));