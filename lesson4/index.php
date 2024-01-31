<?php
    declare(strict_types=1);

    const OPERATION_EXIT = 0;
    const OPERATION_ADD = 1;
    const OPERATION_DELETE = 2;
    const OPERATION_PRINT = 3;

    $operations = [
        OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
        OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
        OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
        OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
    ];

    $items = [];

    function entrance(int $operations) 
    {
        global $items;
        global $operations;

        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }


        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('clear');

            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }
    } 

    function addProduct()
    {
        global $items;
        echo "Введение название товара для добавления в список: \n> ";
        $itemName = trim(fgets(STDIN));
        $items[] = $itemName;
    }

    // function deleteProduct()
    // {
    //     global $items;
    //     echo 'Текущий список покупок:' . PHP_EOL;
    //     echo 'Список покупок: ' . PHP_EOL;
    //     echo implode("\n", $items) . "\n";

    //     echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    //     $itemName = trim(fgets(STDIN));

    //     if (in_array($itemName, $items, true) !== false) {
    //         while (($key = array_search($itemName, $items, true)) !== false) {
    //             unset($items[$key]);
    //         }
    //     }
    // }

    // function printBasket()
    // {
    //     global $items;
    //     echo 'Ваш список покупок: ' . PHP_EOL;
    //     echo implode(PHP_EOL, $items) . PHP_EOL;
    //     echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    //     echo 'Нажмите enter для продолжения';
    //     fgets(STDIN);
    // }

    do {
        $operationNumber = entrance($operations);
    
        // echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
    
        switch ($operationNumber) {
            case OPERATION_ADD:
                addProduct(trim(fgets(STDIN)));
                break;
    
            case OPERATION_DELETE:
                // deleteProduct(readline());
                echo 'ты удалил';
                break;
    
            case OPERATION_PRINT:
                // printBasket(readline());
                echo 'ты распечатал';
                break;
        }
    
        echo "\n ----- \n";
    } while ($operationNumber > 0);
    
    echo 'Программа завершена' . PHP_EOL;

?>