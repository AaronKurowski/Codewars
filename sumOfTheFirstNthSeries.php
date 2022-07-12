<?php

// Series: 1 + 1/4 + 1/7 + 1/10 + 1/13 + 1/16 +...

function series_sum($n) {
    $sum = 0;
    $divisor = 1.00;
    
    for ($x = 1; $x <= $n; $x++) {
        if($x > 1) {
            $divisor = $divisor + 3;
        }

        $sum += (1.00 / $divisor);
    }

    return number_format(round($sum, 2), 2);
}

function series_sum2($n) {
    $sum = 0;
    
    for ($i = 0; $i <= ($n - 1); $i++) {
        $sum += (1 / (1 + (3*$i)));
    }
    
    return number_format($sum, 2, '.', '');
}

series_sum(5);