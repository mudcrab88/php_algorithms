<?php
//функция быстрой сортировки
function quick_sort(array $array): array
{
	if (count($array) < 2) {
		return $array;
	} else {
		$less = [];
		$greater = [];
		$pivot = $array[rand(0, count($array) - 1)];
		
		foreach ($array as $item) {
			if ($item < $pivot) {
				$less[] = $item;
			}
			if ($item > $pivot) {
				$greater[] = $item;
			}
		}
		
		return array_merge(quick_sort($less), [$pivot], quick_sort($greater));
	}
}

//формирование массива для проверки
$array = [];
for ($i = 0; $i < 20000; $i++) {
	$array[$i] = 20000 - $i;
}
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;

$beginTime = microtime(true);
$array = quick_sort($array);
$endTime = microtime(true);
$selectionTime = $endTime - $beginTime;
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;
echo 'Время работы быстрой сортировки: '.$selectionTime.PHP_EOL;