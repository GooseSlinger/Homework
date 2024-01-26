<?php
    echo 'Введите число, которое хотите разделить: ';
    $firstNumber = readline();
    echo 'Введите число, на которое хотите разделить: ';
    $secondNumber = readline();

    if (is_numeric($firstNumber) && is_numeric($secondNumber)) {
        if ($secondNumber != 0) {
            echo 'Результат деления: ' . $firstNumber / $secondNumber . PHP_EOL;
        } else {
            echo 'На ноль делить нельзя!';
        }
    } else {
        echo 'Введите, пожалуйста, число';
    }
?>