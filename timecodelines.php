<?php

$counter = 1;
$format = 'EP %1$03d ';

for ($counter=1;$counter<151;$counter++) {
	echo sprintf($format, $counter) . "H\n";
	echo sprintf($format, $counter) . "Y\n";
	echo "\n";
}

?>
