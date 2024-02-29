<?php
header('Content-type: text/plain');
function getSecondLargest($array) {
    rsort($array);
    $uniqueValues = array_unique($array);
    if (count($uniqueValues) < 2) {
        return $uniqueValues[0];
    }
    return $uniqueValues[1];
}

$array = [5, 3, 9, 7, 7];
echo getSecondLargest($array);



?>