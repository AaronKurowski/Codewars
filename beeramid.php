<?php

function beeramid(int $bonus, int $price): int {
    $cans = $bonus / $price; // 750
    $levels = 1;

    while (($cans - POW($levels, 2)) >= 0) {
        $cans = $cans - POW($levels, 2);

        $levels++;
    }
    
    return $levels - 1;
}

echo beeramid(9, 2);

/**
 * $bonus / $price = $numberOfCans
 * 1500 / 2 = 750
 * 
 * 750 = 1 + 4 + 9 + 16 + 25...
 * 750 = SUM(n^2) where n = 1, 2, 3, 4, 5, 6,... Where does N stop?
 */