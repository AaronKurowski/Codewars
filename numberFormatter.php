<?php

// callded "Write out numbers" on codewars
function numberFormatter($n) {
    $words1 = array("", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");

    $numString = strval($n);

    if (strlen($numString) === 6) {
        $first = $words1[$numString[0]] . " hundred ";
        $secondAndThird = format2(substr($numString, 1, 2)) . " thousand ";
        if ($numString[3] != 0) {
            $forth = $words1[$numString[3]] . " hundred ";
        } else {
            $forth = "";
        }
        $fifthAndSixth = format2(substr($numString, 4, 2));

        return rtrim(preg_replace('!\s+!', ' ', $first . $secondAndThird . $forth . $fifthAndSixth));
    } else if (strlen($numString) === 5) {
        $firstTwo = format2(substr($numString, 0, 2)) . " thousand ";
        $fourthAndFifth = format2(substr($numString, 3, 2));

        if ($numString[2] != 0) {
            $third = $words1[$numString[2]] . " hundred";
        } else {
            $third = "";
        }

        return rtrim(preg_replace('!\s+!', ' ', $firstTwo . $third . $fourthAndFifth));
    } else if (strlen($numString) === 4) {
        $first = $words1[$numString[0]] . " thousand ";
        $thirdAndForth = format2(substr($numString, 2, 2));

        if ($numString[1] != 0) {
            $second = $words1[$numString[1]] . " hundred";
        } else {
            $second = "";
        }

        return rtrim(preg_replace('!\s+!', ' ', $first . $second . $thirdAndForth));
    } else if (strlen($numString) === 3) {
        $first = $words1[$numString[0]] . " hundred";

        $secondAndThird = format2(substr($numString, 1, 2));

        return rtrim(preg_replace('!\s+!', ' ', $first . $secondAndThird));
    } else if (strlen($numString) == 2) {
        return format2($numString);
    } else {
        if ($numString === "0") {
            return "zero";
        } else {
            return $words1[$n];
        }
    }
}

function format2(string $numString): string {
    $words1 = array("", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen");
    $words2 = array("", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety");

    if ($numString[0] == 0) {
        return $words1[$numString[1]];
    }

    if (intval($numString) < 20) {
        return $words1[$numString];
    }

    if ($numString[1] == 0) {
        return $words2[$numString[0]];
    } else {
        return $words2[$numString[0]] . "-" . $words1[$numString[1]];
    }
}

// echo numberFormatter(45);
// echo format2("");
// 852,722

for ($i = 0; $i < 250001; $i++) {
    echo numberFormatter($i) . "<br>";
}

// 411967