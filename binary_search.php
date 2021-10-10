<?php
//функция бинарного поиска
function binary_search(array $array, int $item): ?int
{
	$low = 0;
	$high = count($array) - 1;
	while ($low <= $high) {
		$mid = intdiv($low + $high, 2);
		$guess = $array[$mid];
		
		if ($guess === $item) {
		    return $mid;
		}
		
		if ($guess > $item) {
			$high = $mid - 1;
		} else {
			$low = $mid + 1;
		}
	}
	
	return null;
}

//функция линейного поиска
function linear_search(array $array, int $item): ?int
{
	for ($i = 0; $i < count($array); $i++) {
		if ($array[$i] == $item) {
			return $i;
		}
	}
	
	return null;
}

//формируем массив на 100000000 элементов
$item = 99999099;
$array = [];
for ($i = 0; $i < 100000000; $i++) {
	$array[$i] = $i;
}
$beginTime = microtime(true);
echo linear_search($array, $item).PHP_EOL;
$endTime = microtime(true);
$linearTime = $endTime - $beginTime;
echo 'Время работы линейного поиска - '.$linearTime.PHP_EOL;

$beginTime = microtime(true);
echo binary_search($array, $item).PHP_EOL;
$endTime = microtime(true);
$binaryTime = $endTime - $beginTime;
echo 'Время работы бинарного поиска - '.$binaryTime.PHP_EOL;
echo 'Отношение времени линейного поиска ко времени бинарного поиска - '.($linearTime/$binaryTime).PHP_EOL;