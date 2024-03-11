<?php
if(isset($_POST)){
    $getDate = $_POST;
	//подключаемся к БД
	$DB_HOST='localhost:3306'; 
	$DB_USER='artem'; 
	$DB_PASS='netHomework2024';
	$DB_NAME='homework';
	$link = mysqli_connect( $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME );
	if (!$link) {
 		echo "Ошибка: Невозможно установить соединение с MySQL.";
 		echo "Код ошибки errno: ".mysqli_connect_errno( );
 		echo "Текст ошибки error: ".mysqli_connect_error( );
	} else {

	$sql_contact = "INSERT INTO userInfo (Name, SecondName, LastName) VALUES ('".$getDate['user_name']."', '".$getDate['user_second_name']."', '".$getDate['user_last_name']."')";
	$result = mysqli_query($link, $sql_contact);
	$contact_id= mysqli_insert_id($link);

	$sql_order = "INSERT INTO orders (ContactId, City, Street, House, Flat) VALUES ($contact_id, '".$getDate['user_address_city']."', '".$getDate['user_address_street']."', '".$getDate['user_address_house']."', '".$getDate['user_address_flat']."')";
	$result2 = mysqli_query($link, $sql_order);
	$order_id= mysqli_insert_id($link);

	if ($result == false) {
        $mainResult = "Произошла ошибка при выполнении запроса";
        echo json_encode($mainResult);
    }else{
        $mainResult = "Спасибо за ваш заказ принят в работу! Ему присвоен номер $order_id";
        echo json_encode($mainResult);
    }
}
}
