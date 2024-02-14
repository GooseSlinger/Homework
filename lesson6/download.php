<?php

    $getParam = $_GET["greetings"];

    header('Content-Type: text/plain');

    header('Content-Disposition: attachment; filename="downloadFile.txt"');

    echo $getParam;