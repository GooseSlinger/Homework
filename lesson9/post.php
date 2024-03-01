<?php 
include 'vendor/autoload.php';

$name = $_POST['user_name'];
$firstName = $_POST['user_firstname'];
$secondName = $_POST['user_secondName'];

$request = $name . ' ' . $secondName . ' ' . $firstName;

$token = "4816d32581c10dbb73f99ec07447534b259d358a";
$secret = "c52f80b5f694ccb525aad1bef066121751d5d611";
$dadata = new \Dadata\DadataClient($token, $secret);
$result = $dadata->clean("name", $request);

echo '<pre>';
var_dump($result);
echo '</pre>';