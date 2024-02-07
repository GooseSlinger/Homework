<?php

    echo 'Введите год в котором вы хотите пойти на работу: ' . PHP_EOL;
    $years = readline();
    echo 'Введите месяц в году в котором вы хотите пойти на работу: ' . PHP_EOL;
    $month = readline();
    function workDays(int $years, int $month)
    {
        return date("d-M-Y", mktime(0, 0, 0, $month, 1, $years));
         
    };

    echo workDays($years, $month);
?>