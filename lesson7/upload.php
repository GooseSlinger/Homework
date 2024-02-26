<?php
    if(isset($_POST['text']) && isset($_FILES['content'])) {
        $fileName = $_POST['text'];
        $mediaContent = $_FILES['content'];
    
        if (empty($fileName) || $mediaContent['error'] !== UPLOAD_ERR_OK) {
            header('Location: index.php');
            exit;
        } else {
            $fileSize = $mediaContent['size'];
            $finalPath = 'upload/' . $fileName . '/';
            
            if (!file_exists($finalPath)) {
                mkdir($finalPath, 0777, true);
            }
            
            move_uploaded_file($mediaContent['tmp_name'], $finalPath . $fileName . '.png');
            
            echo "Файл успешно загружен и находится в директории \"$finalPath\" и весит $fileSize байт. <br>";
        }
    } else {
        header('Location: index.php');
        exit;
    } 