<?php

function narcissistic(int $value): bool {
    $arrayOfDigits = str_split($value); // digits are strings here
    $numberOfDigits = count($arrayOfDigits);

    $sum = 0;

    foreach($arrayOfDigits as $digit) {
        $sum += $digit ** $numberOfDigits;
    }

    return $sum === $value;
}

echo(narcissistic(15));