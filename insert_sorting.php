<?php
//функция сортировки вставками
function insert_sorting(array $nums): array
{
	$num = count($nums);
	for ($i = 1; $i < $num; $i++) {
		$item = $nums[$i];
		
		for ($j = 0; $j < $i; $j++) {
			if ($nums[$i] < $nums[$j]) {
				$tmp = 	$nums[$i];
				$nums[$i] = $nums[$j];
				$nums[$j] = $tmp;
			}
		}
	}
	
	return $nums;
}


//формирование массива для проверки
$array = [];
for ($i = 0; $i < 20000; $i++) {
	$array[$i] = 20000 - $i;
}
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;

$beginTime = microtime(true);
$array = insert_sorting($array);
$endTime = microtime(true);
$selectionTime = $endTime - $beginTime;
echo $array[0].' '.$array[5000].' '.$array[9999].PHP_EOL;
echo 'Время работы сортировки вставками: '.$selectionTime.PHP_EOL;