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
        <form class="mainForm" enctype="multipart/form-data" action="upload.php" method="post" >
            <h1>Форма для данных</h1>
            <input name="text" class="inputText" type="text">
            <input name="content" class="inputFile" type="file">
            <button class="glow-on-hover" type="submit">Сохранить картинку</button>
        </form>
    </div>
</body>
</html>