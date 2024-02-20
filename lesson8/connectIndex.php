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
            <?php
                if(isset($_SESSION['nameUser'])) {
                    echo '<h1>Привет, '.$_SESSION['nameUser'].'!</h1>';
                    echo '<a class="glow-on-hover" href="exit.php">Выйти из пользователя</a>';
                } else {
                    echo '<h1>Заполните пользователя</h1>';
                    echo '<input name="nameUser" class="inputText" type="text">';
                    echo '<button class="glow-on-hover" type="submit">Сохранить пользователя</button>';
                }
            ?>
        </form>
    </div>
</body>
</html>