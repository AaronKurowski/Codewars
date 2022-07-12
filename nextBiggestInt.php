<?php

function nextBigger(string $num) {
    for ($i = strlen($num) - 1; $i > 0; $i--) {
        if ($num[$i] > $num[$i - 1]) {
            $firstHalf = substr($num, 0, $i);
            $secondHalf = substr($num, $i);

            $secondHalfArray = str_split($secondHalf, 1);
            sort($secondHalfArray);

            $leftSwapNum = $num[$i - 1];
            $rightSwapNum = null;

            foreach ($secondHalfArray as $element) {
                if ($element > $leftSwapNum) {
                    $rightSwapNum = $element;
                    break;
                }
            }
            
            $secondHalfArray = array_filter($secondHalfArray, function($el) use ($rightSwapNum) {
                return $el != $rightSwapNum;
            });

            array_push($secondHalfArray, $leftSwapNum);
            sort($secondHalfArray);
            $firstHalf[strlen($firstHalf) - 1] = $rightSwapNum;

            $num = $firstHalf . implode("", $secondHalfArray);

            return strval($num);
        }
    }
    return -1;
}

// echo nextBigger("125132017414144");

// 59,884,848,483,559 => 59,884,848,459,853
//                                   ^^ ^ ^

function nextBig(string $n) {
    if (order($n) === "DESC") {
        return -1;
    } else if (order($n) === "ASC") {
        $lastDigit = $n[strlen($n) - 1];
        $secondLastDigit = $n[strlen($n) - 2];
        
        $n[strlen($n) - 1] = $secondLastDigit;
        $n[strlen($n) - 2] = $lastDigit;

        return $n;
    } else {
        for ($i = strlen($n) - 1; $i > 0; $i--) {
            if ($n[$i] > $n[$i - 1]) {
                $firstHalf = substr($n, 0, $i);
                $leftSwapNum = $firstHalf[strlen($firstHalf) - 1];

                $secondHalf = substr($n, $i);
                $rightSwapNum = null;
                $secondHalfAsArray = str_split($secondHalf, 1);
                sort($secondHalfAsArray);
                
                foreach ($secondHalfAsArray as $secondHalfElement) {
                    if ($secondHalfElement > $leftSwapNum) {
                        $rightSwapNum = $secondHalfElement;
                        break;
                    }
                }
                
                unset($secondHalfAsArray[array_search($rightSwapNum, $secondHalfAsArray)]);
                
                array_push($secondHalfAsArray, $leftSwapNum);

                $firstHalf[strlen($firstHalf) - 1] = $rightSwapNum;
                sort($secondHalfAsArray);

                return $firstHalf . implode("", $secondHalfAsArray);
            }
        }
    }
}

function order(string $numString) {
    $numArray = str_split($numString, 1);
    $descNums = str_split($numString, 1);
    $ascNums = str_split($numString, 1);

    rsort($descNums);
    sort($ascNums);

    if ($numArray == $descNums && !consecutiveNums($descNums)) {
        return "DESC";
    } else if ($numArray == $ascNums && !consecutiveNums($ascNums)) {
        return "ASC";
    } else {
        return "false";
    }
}

function consecutiveNums($numArray) {
    for ($i = count($numArray) - 1; $i > 0; $i--) {
        if ($numArray[$i] === $numArray[$i - 1]) {
            return true;
        } else {
            return false;
        }
    }
}

echo nextBig("12");
// echo order("125132017414144123456789123456789098765432109999999999");
