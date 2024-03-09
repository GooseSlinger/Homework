<?php

$getDate = $_POST;

// формируем масив с нужными нам ключами
$arUserInfo = array("name"=>$getDate['user_name'], 
"secondName"=>$getDate['user_second_name'],
"lastName"=>$getDate['user_last_name'], 
"сity"=>$getDate['user_city'], 
"street"=>$getDate['user_street'], 
"home"=>$getDate['user_home'], 
"apartments"=>$getDate['user_apartment']);

// кодируем наш массив в json
$result = json_encode($arUserInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $result;