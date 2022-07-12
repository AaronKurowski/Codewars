<?php

// function sumStrings(string $a, string $b): string {
//     $tempString = "";

//     if (strlen($a) > strlen($b)) {
//         $tempString = str_pad($tempString, strlen($a) + 1, "0");
//         $b = str_pad($b, strlen($a), "0", STR_PAD_LEFT);

//         for ($i = strlen($a) - 1; $i >= 0; $i--) {
//             $tempAddedNumber = $a[$i] + $b[$i];

//             if (strlen($tempAddedNumber) > 1) {
//                 // 16
//                 // $tempString[$i] = $tempAddedNumber[1] + $tempString[$i];
//                 if ($tempAddedNumber[1] + $tempString[$i] > 1) {
//                     $tempAddedNumber2 = $tempAddedNumber[1] + $tempString[$i];

//                     $tempString[$i] = $tempAddedNumber2[1];
//                     $tempString[$i - 1] = $tempAddedNumber2[0];
//                 } else {
//                     $tempString[$i] = $tempAddedNumber;

//                 }
//                 $tempString[$i - 1] = $tempAddedNumber[0];
//                 return $tempString;
//             } else {
//                 $tempString[$i] = $tempAddedNumber[0] + $tempString[$i];
//             }
//         }
//     }
//     return "";
// }

function sumStrings(string $a, string $b) {
    $tempString = "";

    $padLength = max(strlen($a), strlen($b));

    $tempString = str_pad($tempString, $padLength + 1, "0");

    if (strlen($a) > strlen($b)) {
        $b = str_pad($b, strlen($a), "0", STR_PAD_LEFT);
    } else {
        $a = str_pad($a, strlen($b), "0", STR_PAD_LEFT);
    }

    for ($i = strlen($a) - 1; $i >= 0; $i--) {
        $value = strval($tempString[$i + 1] + $a[$i] + $b[$i]);

        if (strlen($value) > 1) {
            $tempString[$i + 1] = $value[1];
            $tempString[$i] = $value[0];
        } else {
            $tempString[$i + 1] = $value[0];
        }
    }

    for ($i = 0; $i < strlen($tempString); $i++) {
        if ($tempString[0] == "0") {
            $tempString = substr($tempString, 1);
        }
    }

    return $tempString;
}

// echo sumStrings('1239', '567');

// echo sumStrings('1239', '567');

// 00106
//  1239
//  0567