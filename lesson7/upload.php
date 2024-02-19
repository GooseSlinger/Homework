<?php
    $fileName = $_POST['text'];
    $mediaContent = $_FILES['content'];
    $extension = pathinfo($mediaContent['name'], PATHINFO_EXTENSION);

    if (empty($fileName) || (isset($mediaContent) && $mediaContent['error'] !== UPLOAD_ERR_OK)) {
        header('Location: index.php');
        exit;
    } else {
        $fileSize = $mediaContent['size'];
        $folderSave = 'upload/';
        $createFolderForFile = $fileName . '/';
        $finalPath = $folderSave . $createFolderForFile;

        if (!file_exists($finalPath)) {
            mkdir($finalPath, 0777, true);
        }

        move_uploaded_file($mediaContent['tmp_name'], $finalPath . '/' . $fileName . '.png');

        echo "Файл успешно загружен и находится в директории \"$finalPath\" и весит $fileSize байт. <br>";
    }