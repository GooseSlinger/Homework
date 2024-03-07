<?php 
include 'vendor/autoload.php';

$ipRequest = $_POST['ipClient'];

$token = "9627bfb17321710ef6d28ad4da089c68aad10068";
$secret = "0fc2cf93683c7b3e7d569f853dbad010da87c8ae";
$dadata = new \Dadata\DadataClient($token, null);
$result = $dadata->iplocate($ipRequest);

echo json_encode($result);