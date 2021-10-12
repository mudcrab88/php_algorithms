<?php

//рекурсивная функция суммы элементов массива
function sum_recursive(array $array): int
{
	if (count($array) == 0) {
		return 0;
	} 
	
	return array_shift($array) + sum_recursive($array);
}

//рекурсивная функция подсчета элементов массива
function count_recursive(array $array): int
{
	if (count($array) == 0) {
		return 0;
	} 
	array_shift($array);
		
	return 1 + count_recursive($array);
}

function max_recursive(array $array): int
{
	if (count($array) == 1) {
		return $array[0];
	}
	if (count($array) == 2) {
		return $array[0] > $array[1] ? $array[0] : $array[1];
	}
	
	$sub_max = array_shift($array);
	$sub_max = max_recursive($array);	
		
	return $array[0] > $sub_max ? $array[0] : $sub_max;
}

echo sum_recursive([1, 2, 3, 4, 5]).PHP_EOL;

echo count_recursive([1, 2, 3, 4, 5, 6]).PHP_EOL;

echo max_recursive([8, 2, 3, 4]).PHP_EOL;