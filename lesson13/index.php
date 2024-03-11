<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

</head>
<body>
<?php
    // выводим запрос построчно
    echo "<pre>";
    var_dump($_REQUEST);
    echo "</pre>";

    // формируем массив по ключам
    $arUserInfo = array("name"=>$_REQUEST['user_name'], 
    "secondName"=>$_REQUEST['user_second_name'],
    "lastName"=>$_REQUEST['user_last_name'], 
    "сity"=>$_REQUEST['user_city'], 
    "street"=>$_REQUEST['user_street'], 
    "home"=>$_REQUEST['user_home'], 
    "apartments"=>$_REQUEST['user_apartment']);

    // кодируем в json
    $strUserInfo = json_encode($arUserInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>

<form action="index.php" method="post">
		<strong>Ваше имя<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_name" id="user_name" value=""><br>

		<strong>Ваше отчество<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_second_name" id="user_second_name" value=""><br>

		<strong>Ваша фамилия<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_last_name" id="user_last_name" value=""><br>

		<strong>Ваш город<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_city" id="user_address" value=""><br>

		<strong>Ваша улица<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_street" id="user_address" value=""><br>

		<strong>Ваш дом<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_home" id="user_address" value=""><br>

		<strong>Ваша квартира<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_apartment" id="user_address" value=""><br>

		<input type="submit" name="submit" id="submit" value="Отправить">
	</form>
    <!-- выводим резулитат -->
    <div id="result">
        <?php
            echo '<pre>';
            var_dump($strUserInfo);
            echo '</pre>';
        ?>
    </div>
</body>
</html>