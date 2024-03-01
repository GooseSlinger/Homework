<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя работа</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="mainContainer">
        <form class="mainForm" action="post.php" method="post" >
            <h1>Введите данные пользователя</h1>
            <input name="user_firstname" class="inputText" type="text" placeholder="Введите фамилию">
            <input name="user_name" class="inputText" type="text" placeholder="Введите имя">
            <input name="user_secondName" class="inputText" type="text" placeholder="Введите отчество">
            <button class="glow-on-hover" type="submit">Проверить данные</button>
        </form>
    </div>
</body>
</html>