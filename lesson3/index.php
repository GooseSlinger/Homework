<?php
    echo 'Введите вашу фамилию: ';
    $firstName = trim(readline());
    echo 'Введите ваше имя: ';
    $name = readline();
    echo 'Введите ваше отчество: ';
    $lastName = readline();

    // Редактор фамилии
    $firstEditLetter = mb_substr($firstName, 0, 1);
    $firstLetterUp = mb_strtoupper($firstEditLetter);
    $remainsFirstName = mb_substr($firstName, 1);
    $newFirstName = $firstLetterUp . $remainsFirstName;

    // Редактор имени
    $firstLetterName = mb_substr($name, 0, 1);
    $firstLetterUpName = mb_strtoupper($firstLetterName);
    $remainsName = mb_substr($name, 1);
    $newName = $firstLetterUpName . $remainsName;

    // Редактор Отчества
    $firstLetterLastName = mb_substr($lastName, 0, 1);
    $firstLetterUpLastName = mb_strtoupper($firstLetterLastName);
    $remainsLastName = mb_substr($lastName, 1);
    $newLastName = $firstLetterUpLastName . $remainsLastName;

    $fullName = $newFirstName . ' ' . $newName . ' ' . $newLastName . PHP_EOL;
    $fio = $firstLetterUp . $firstLetterUpName . $firstLetterUpLastName . PHP_EOL;
    $surnameAndInitials = $newFirstName . ' ' . $firstLetterUpName . '.' . $firstLetterUpLastName . '.' . PHP_EOL;

    print_r($fullName);
    print_r($fio);
    print_r($surnameAndInitials);

?>