<?php

/* 
If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.

Finish the solution so that it returns the sum of all the multiples of 3 or 5 below the number passed in. Additionally, if the number is negative, return 0 (for languages that do have them).

Note: If the number is a multiple of both 3 and 5, only count it once.
*/

function solution($number) {
    if($number <= 0) {
        return 0;
    }

    $arrayOfValidNumbers = array();

    for($i = 1; $i < $number; $i++) {
        if($i % 3 === 0) {
            array_push($arrayOfValidNumbers, $i);
        } 

        if($i % 5 === 0) {
            array_push($arrayOfValidNumbers, $i);
        }
    }

    $arrayOfValidNumbers = array_unique($arrayOfValidNumbers, SORT_NUMERIC);

    return array_sum($arrayOfValidNumbers);
}

function solution2($number) {
    $sum = 0;
    for ($i = 3; $i < $number; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sum += $i;
        }
    }
    return $sum;
}

function solution3($number){
    return array_sum(array_filter(range(1, $number-1), function ($item) {
        return $item % 3 == 0 || $item % 5 == 0;
    }));
}