<?php

// function smallestSum(array $numberArray) {
//     /* Original but tooooo slow */
//     rsort($numberArray, SORT_NUMERIC);

//     for ($j = 1; $j < count($numberArray); $j++) {
//         if ($numberArray[$j - 1] > $numberArray[$j]) {
//             while ($numberArray[$j - 1] > $numberArray[$j]) {
//                 $numberArray[$j - 1] = $numberArray[$j - 1] - $numberArray[$j];
//             }
//             rsort($numberArray, SORT_NUMERIC);
//             $j = 0;
//         }
//     }

//     print_r($numberArray);
//     return array_sum($numberArray);
// }

function gcd($a, $b) {
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function findArrayGCD($array) {
    $result = $array[0];

    for ($i = 1; $i < count($array); $i++) {
        $result = gcd($array[$i], $result);

        if ($result === 1) {
            return 1;
        }
    }
    return $result;
}

function smallestSum(array $numbers) {
    $arrayGCD = findArrayGCD($numbers);

    return $arrayGCD * count($numbers);
}

// echo findArrayGCD([14, 21, 28]);

echo smallestSum([6, 9, 21]);