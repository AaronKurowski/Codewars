<?php

function moveZeros(array $items): array
{    
    $zeroCount = 0;
    foreach ($items as $value) {
        if ($value === 0 || $value === 0.0) {
            $zeroCount++;
        }
    }

    $array = array_filter($items, function($e) {
        return $e !== 0 and $e !== 0.0;
    });

    for ($i = 0; $i < $zeroCount; $i++) {
        array_push($array, 0);
    }

    return array_values($array);
}


function moveZeros2(array $items): array {
    return array_pad(array_filter($items, function($x){return $x !== 0 and $x !== 0.0;}), count($items), 0);
}

moveZeros([1,2,null,null,0,1,0,1,0,3,0,1]);