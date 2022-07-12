<?php


$matrix = [[1, 1, 1], [2, 2, 2], [3, 3, 3]];

// 1 1 1    1 1 1           1 3 0
// 2 2 2    0 0 0 => 0      2 2 4
// 3 3 3    0 0 0           0 1 1

// 1 * x = -3;

// function determinant(array $arrayOfRows): int {
//     // 2x2 = ad - bc
//     // 3x3 = 
    
// }

function twoByTwoDeterminant(array $array1, array $array2): int {
    return $array1[0] * $array2[1] - $array1[1] * $array2[0];
}

function determinant(array $array) {
    if (count($array) === 2) {
        return twoByTwoDeterminant($array[0], $array[1]);
    }

    $topRow = array_shift($array);
    
    
    $j = 0;
    $sum = 0;
    
    foreach ($array as $row) {
        $tempArray = [];
        $tempSubArray = [];
        foreach ($row as $key => $element) {
            if ($key != $j) {
                array_push($tempSubArray, $element);
            }
        }
        
        array_push($tempArray, $tempSubArray);
        $j++;

        for ($i = 0; $i < count($topRow); $i++) {
            if ($i % 2 == 1) {
                $sum += -1 * $topRow[$i] * determinant($tempArray);
            } else {
                $sum += $topRow[$i] * determinant($tempArray);
            }
        }
    }


    return $sum;
}

echo determinant([[33, 4, 1], [41, 6, 7], [12, 21, 1]]);

// a b c
// d e f
// h i j

// a b c d
// e f g h
// i j k l
// m n o p

// a b c d e
// f g h i j
// k l m n o
// p q r s t
// u v w x y