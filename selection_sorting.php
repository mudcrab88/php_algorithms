<?php
//функция нахождения минимального элемента в массиве
function find_min(array $array): int
{
	$min_index = 0;
	$min = $array[$min_index];
	for ($i = 0; $i < count($array); $i++) {
		if ($array[$i] < $min) {
			$min_index = $i;
			$min = $array[$i];
		}
	}
	
	return $min_index;
}

//функция сортировки выбором
function selection_sorting(array $array): array
{
	$newArray = [];
	$len = count($array);
	for ($j = 0; $j < $len; $j++) {
		//$min_index = find_min($array);
		$min_index = array_keys($array, min($array))[0];
		$newArray[] = $array[$min_index];
		unset($array[$min_index]);
		//$array = array_values($array);		
	}
	
	return $newArray;
}

//формирование массива для проверки
$array = [];
for ($i = 0; $i < 20000; $i++) {
	$array[$i] = 20000 - $i;
}
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;
$beginTime = microtime(true);
$array = selection_sorting($array);
$endTime = microtime(true);

echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;
$selectionTime = $endTime - $beginTime;
echo 'Время работы сортировки выбором: '.$selectionTime.PHP_EOL;