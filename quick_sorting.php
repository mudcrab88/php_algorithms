<?php
//функция быстрой сортировки
function quick_sort(array $array): array
{
	if (count($array) < 2) {
		return $array;
	} else {
		$less = [];
		$greater = [];
		$pivot = $array[0];
		
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
for ($i = 0; $i < 10000; $i++) {
	$array[$i] = 10000 - $i;
}

$beginTime = microtime(true);
$array = quick_sort($array);
$endTime = microtime(true);
$selectionTime = $endTime - $beginTime;
echo 'Время работы быстрой сортировки - '.$selectionTime.PHP_EOL;