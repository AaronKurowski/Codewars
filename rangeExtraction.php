<?php

function extractRange(array $array): string {    
    $string = "";

    $chunks = [];
    
    $size = 1;

    $j = 0;
    for ($i = 1, $size = 2, $j = 0; $i < count($array) + 1; $i++) {
        if (!isset($array[$i])) {
            array_push($chunks, array_slice($array, $j));
        } else {
            if ($array[$i] - $array[$i - 1] === 1) {
                $size++;
            } else {
                array_push($chunks, array_slice($array, $j, $size));
                $j = $i;
                $size = 1;
            }
        }
    }

    foreach ($chunks as $chunk) {
        if ($chunk == $chunks[0]) {
            if (count($chunk) == 1) {
                $string .= strval($chunk[0]); 
            } else if (count($chunk) == 2) {
                $string .= strval($chunk[0]) . "," . strval($chunk[1]);
            } else {
                $string .= strval($chunk[0]) . "-" . strval($chunk[count($chunk) - 1]);
            }
        } else {
            if (count($chunk) == 1) {
                $string .= "," . strval($chunk[0]); 
            } else if (count($chunk) == 2) {
                $string .= "," . strval($chunk[0]) . "," . strval($chunk[1]);
            } else {
                $string .= "," . strval($chunk[0]) . "-" . strval($chunk[count($chunk) - 1]);
            }
        }
    }

    return $string;
}

echo extractRange([29, 31, 33, 34, 37, 39, 40, 42, 44, 47, 50, 51, 53, 54, 56, 57, 58, 59, 60, 61, 62, 64, 67, 69, 72, 74]);

// echo([-10, -9, -8, -6, -3, -2, -1, 0, 1, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 17, 18, 19, 20][22]);

// [-22, -21, -20, -19, -17, -16, -14, -13, -10, -8, -5];

// [29, 31, 33, 34, 37, 39, 40, 42, 44, 47, 50, 51, 53, 54, 56, 57, 58, 59, 60, 61, 62, 64, 67, 69, 72, 74];