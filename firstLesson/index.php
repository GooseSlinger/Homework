<?php
    // задание №1

    $a='Рыба';
    $b='человек';

    $text = '' . $a . ' рыбою сыта, а ' . $b . ' человеком';

    echo $text;

    // Задание №2

    echo '<br><br><br>';

    $variable = 'one';

    if (is_bool($variable)) {
        echo 'Это булевая переменная';
    } elseif (is_float($variable)) {
        echo 'Это переменная является числом с плавающей точкой';
    } elseif (is_int($variable)) {
        echo 'Это переменная является целым числом';
    } elseif (is_string($variable)) {
        echo 'Это переменная является строкой';
    } elseif (is_null($variable)) {
        echo 'Это null';
    } else {
        echo 'Что-то неопознаное';
    }