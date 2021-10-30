<?php
//функция сортировки слиянием
function merge_sorting(array $arr)
{
    $n = count($arr);
    if ($n == 1) {
        return $arr;
    }

    $left = merge_sorting(array_slice($arr, 0, intdiv($n, 2)));
    $right = merge_sorting(array_slice($arr, intdiv($n, 2)));

    return merge($left, $right);
}

function merge(array $a, array $b)
{
    $i = 0;
    $j = 0;
    $n = count($a);
    $m = count($b);
    $c = [];

    while ($i < $n || $j < $m) {
        if ($j == $m || ($i < $n && $a[$i] <= $b[$j])) {
            $c[] = $a[$i];
            $i += 1;
        } else {
            $c[] = $b[$j];
            $j += 1;
        }
    }

    return $c;
}

//формирование массива для проверки
$array = [];
for ($i = 0; $i < 20000; $i++) {
	$array[$i] = 20000 - $i;
}
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;

$beginTime = microtime(true);
$array = merge_sorting($array);
$endTime = microtime(true);
$selectionTime = $endTime - $beginTime;
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;
echo 'Время работы сортировки слиянием: '.$selectionTime.PHP_EOL;