<?php

function justify($str, $len) {
    $strArray = explode(" ", $str);

    $stringChunks = [];
    $subArray = [];
    $count = 0;

    for ($i = 0; $i < count($strArray); $i++) {
        $count += strlen($strArray[$i]);

        array_push($subArray, $strArray[$i]);

        if ($count + strlen($strArray[$i + 1]) >= ($len - (count($subArray) - 1))) {
            array_push($subArray, $count);
            array_push($stringChunks, $subArray);
            $subArray = [];
            $count = 0;
        }
    }
    
    $string = "";

    for ($i = 0; $i < count($stringChunks); $i++) {
        $count = array_pop($stringChunks[$i][count($stringChunks[$i]) - 1]);

        return $count;
        // while ($count < $len) {

        // }
    }

    print_r($stringChunks);
}

echo justify("This is an example row", 7);