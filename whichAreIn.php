<?php

function inArray($array1, $array2) {
    $returnArray = array();

    $array2Count = count($array2); // 5

    foreach ($array1 as $value1) {
        for ($x = 0; $x <= $array2Count - 1; $x++) {
            if(strpos($array2[$x], $value1) === false) {
                continue;
            }

            if(strpos($array2[$x], $value1) >= 0) {
                array_push($returnArray, $value1);
            }
        }
    }

    sort($returnArray);

    $returnArray2 = array();

    for ($y = 0; $y < count($returnArray); $y++) {
        array_push($returnArray2, $returnArray[$y]);
    }
    
    return array_values(array_unique($returnArray2));
}

function inArray2($a1, $a2) {
    $r = array_filter($a1, function($v) use ($a2) {
        foreach ($a2 as $v2) {
            if (strpos($v2, $v) !== false) return true;
        }
        return false;
    });
    sort($r);
    return $r;
}

inArray(["xyz", "live", "strong"], ["lively", "alive", "harp", "sharp", "armstrong"]);