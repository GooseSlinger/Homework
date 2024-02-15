<?php

    if(isset($_GET["greetings"])) {
        $getParam = $_GET["greetings"];
    } else {
        $getParam = 'Пустой гет параметр';
    };

    header('Content-Type: text/plain');

    header('Content-Disposition: attachment; filename="downloadFile.txt"');

    echo $getParam;