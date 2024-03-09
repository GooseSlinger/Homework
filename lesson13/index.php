<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Домашка</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
	<form method="POST">
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
    <div id="result">
        <!-- выводим json -->
    </div>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    type: "POST",
                    url: "sentDate.php",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false
                }).done(function(result) {
                    $("#result").html(
                        '<p>Полученные данные json: ' + '<pre>' + JSON.stringify(result, null, 2) + '</pre>' + '</p>'
                    );

                });
            });
        });
    </script>
</body>
</html>
