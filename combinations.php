<?php

function combinations(array $nums, int $number): void
{
	$count = count($nums);
	for ($i = 0; $i < pow(2, $count); $i++) {
		$item = str_pad((string)decbin($i), $count, "0", STR_PAD_LEFT);
		if (substr_count($item, '1') === $number) {
			$closestSum = null;
			$sum = 0;
			for ($j = 0; $j < $count; $j++) {
				if ($item[$j] === '1') {
					echo $nums[$j].' ';
				}
			}
			echo PHP_EOL;
		}
	}
}

$number = 4;
$nums = [1, 2, 3, 4, 5];
combinations($nums, $number);