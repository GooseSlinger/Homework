<?php
    declare(strict_types=1);

    const OPERATION_EXIT = 0;
    const OPERATION_ADD = 1;
    const OPERATION_DELETE = 2;
    const OPERATION_PRINT = 3;
    const CHANGE_NAME_PRODUCT = 4;

    $operations = [
        OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
        OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
        OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
        OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
        CHANGE_NAME_PRODUCT => CHANGE_NAME_PRODUCT . '. Изменить название продукта.',
    ];

    $items = [];

    function entrance(array $operations): int
    {
        global $items;

        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }

        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = (int)trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('cls');
            echo 'Неизвестный номер операции, повторите попытку.' . PHP_EOL;
            return entrance($operations);
        }

        return $operationNumber;
    }

    function addProduct()
    {
        global $items;
        echo "Введение название товара для добавления в список: \n> ";
        $itemName = trim(fgets(STDIN));
        echo "Введите количество товаров которые хотите добавить: \n> ";
        $countProductName = trim(fgets(STDIN));
        $items[] = $itemName . '(' . $countProductName . ')';
    }

    function deleteProduct()
    {
        global $items;

        $countItem = count($items);

        if ($countItem == 0) {
            echo 'Ваша корзина пуста';
        } else {
            echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            foreach ($items as $key => $value) {
                echo ($key + 1) . '. ' . $value . "\n";
            }

            echo 'Введите порядковый номер товара для удаления его из списка:' . PHP_EOL . '> ';

            $input = trim(fgets(STDIN));

            if (is_numeric($input)) {
                $itemKey = (int) $input - 1;
                unset($items[$itemKey]);
            } else {
                echo "Ошибка: Введенное значение не является числом.";
            }

            $items = array_values($items);
        };

    }

    function printBasket()
    {
        global $items;
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode(PHP_EOL, $items) . PHP_EOL;
        echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
        echo 'Нажмите enter для продолжения';
        fgets(STDIN);
    }

    function changeNameProduct()
    {
        global $items;

        $countItem = count($items);

        if ($countItem == 0) {
            echo 'Ваша корзина пуста';
        } else {
            echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            foreach ($items as $key => $value) {
                $newValue = preg_replace('/\([^)]+\)/', '', $value);
                echo ($key + 1) . '. ' . $newValue . "\n";
            }

            $processedItems = $items;

            foreach ($processedItems as $key => $value) {
                $processedValue = preg_replace('/\([^)]+\)/', '', $value);
                $processedItems[$key] = $processedValue; // заменяем значение в копии массива
            }

            echo 'Введите порядковый номер товара который хотите перемеиновать:' . PHP_EOL . '> ';

            $rawInputNumber = trim(fgets(STDIN));
            $inputNumberProduct = $rawInputNumber - 1;

            echo 'Как вы хотите перемеиновать этот товар: ' . $processedItems[$inputNumberProduct] . PHP_EOL;

            $newNameElementMassive = trim(fgets(STDIN));

            echo 'Какое количество переименнованого товара вы хотите взять: ' . $newNameElementMassive . PHP_EOL;

            $newCountElementMassive = trim(fgets(STDIN));

            $items[$inputNumberProduct] = $newNameElementMassive . '('. $newCountElementMassive .')';
        };
    }

    do {
        $operationNumber = entrance($operations);
    
        echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
    
        switch ($operationNumber) {
            case OPERATION_ADD:
                addProduct();
                break;
    
            case OPERATION_DELETE:
                deleteProduct();
                break;
    
            case OPERATION_PRINT:
                printBasket();
                break;

            case CHANGE_NAME_PRODUCT:
                changeNameProduct();
                break;
        }
    
        echo "\n ----- \n";
    } while ($operationNumber > 0);
    
    echo 'Программа завершена' . PHP_EOL;

?>