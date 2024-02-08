<?php

function workDays(int $years, int $month): array
{
    $finalResult = [];
    $prevWorkDay = 0;
    $countDays = cal_days_in_month(CAL_GREGORIAN, $month, $years);
    $works = '(Работа зовет)';
    $chill = '(чилл)';

    for ($i = 1; $i <= $countDays; $i++) {
        $needDaysOfWeek = date('l', mktime(0, 0, 0, $month, $i, $years));
        $needDate = date("d-M-Y", mktime(0, 0, 0, $month, $i, $years));

        if (in_array($needDaysOfWeek, ['Saturday', 'Sunday'])) {
            $workDate = "$needDaysOfWeek $needDate $chill";
            $prevWorkDay = 0;
            $finalResult[] = $workDate;
            continue;
        }

        switch ($prevWorkDay) {
            case 0:
                $workDate = "$needDaysOfWeek $needDate $works";
                $prevWorkDay++;
                break;
            case 1:
                $workDate = "$needDaysOfWeek $needDate $chill";
                $prevWorkDay++;
                break;
            case 2:
                $workDate = "$needDaysOfWeek $needDate $chill";
                $prevWorkDay = 0;
                break;
        }

        $finalResult[] = $workDate;
    }

    return $finalResult;
}

echo 'Введите год в котором вы хотите пойти на работу: ' . PHP_EOL;
$years = readline();
echo 'Введите месяц в году в котором вы хотите пойти на работу: ' . PHP_EOL;
$month = readline();

var_dump(workDays($years, $month));
