<?php
$graph = [];
$graph["you"] = ["alice", "bob", "claire"];
$graph["bob"] = ["anuj", "peggy"];
$graph["alice"] = ["peggy"];
$graph["claire"] = ["thom", "jonny"];
$graph["anuj"] = [];
$graph["peggy"] = [];
$graph["thom"] = [];
$graph["jonny"] = [];

function findMangoSeller(string $name, array $graph): bool
{
	$queue = new SplQueue();
	$queue->enqueue($name);
	$searched = [];

	while (!$queue->isEmpty()) {
		$person = $queue->dequeue();
		if (!in_array($person, $searched)) {
			$searched[] = $person;
			if (person_is_seller($person)) {
				echo $person." is a mango seller!".PHP_EOL;
				return true;
			} else {
				echo $person.PHP_EOL;
				foreach ($graph[$person] as $item) {
					$queue->enqueue($item);
				}
			}
		}
	}
	
	return false;
}

function person_is_seller(string $person): bool 
{
	return $person[-1] == "m";
}

$result = findMangoSeller("you", $graph);