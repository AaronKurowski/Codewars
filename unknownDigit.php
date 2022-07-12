<?php

function solve_expression2(string $expression): int {
    // echo $expression;
    if (is_numeric(strpos($expression, "+"))) {
        for ($i = 0; $i <= 9; $i++) {
            $replacedExpression = str_replace("?", $i, $expression);
            $arrayOfElements = preg_split('/[+=]/', $replacedExpression);

            if (($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1)) {
                // then a num with more than one digit can't start with 0
                continue;
            }
            
            if ($arrayOfElements[0] + $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        }
        return -1;
    } else if (is_numeric(strpos($expression, "*"))) {
        for ($i = 0; $i <= 9; $i++) {
            $replacedExpression = str_replace("?", $i, $expression);
            $arrayOfElements = preg_split('/[*=]/', $replacedExpression);

            if (($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1)) {
                // then a num with more than one digit can't start with 0
                // didn't account for negatives before all the bullshit
                continue;
            }

            if ($arrayOfElements[0] * $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        }
        return -1;
    } else {
        for ($i = 0; $i <= 9; $i++) {
            $replacedExpression = str_replace("?", $i, $expression);
            $firstNum = substr($replacedExpression, 0, strpos($replacedExpression, "-", 1));
            $expressionAfterOperator = substr(substr($replacedExpression, strpos($replacedExpression, "-", 1)), 1);
            $arrayOfElements = [$firstNum, ...explode("=", $expressionAfterOperator)];

            if (($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1)) {
                // then a num with more than one digit can't start with 0
                continue;
            }

            if ($arrayOfElements[0] - $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        }
        return -1;
    }
    return -1;
}

// echo solve_expression('??+??=??');

function solve_expression(string $expression) {
    for ($i = 0; $i <= 9; $i++) {
        $replacedExpression = str_replace("?", $i, $expression);

        if (is_numeric(strpos($replacedExpression, "+"))) {
            $arrayOfElements = preg_split('/[+=]/', $replacedExpression);

            if (
                ($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[0][0] === "-" && $arrayOfElements[0][1] === "0") ||
                ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[1][0] === "-" && $arrayOfElements[1][1] === "0") ||
                ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1) || ($arrayOfElements[2][0] === "-" && $arrayOfElements[2][1] === "0")
                ) { 
                    continue;
                }

            if ($arrayOfElements[0] + $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        } else if (is_numeric(strpos($replacedExpression, "*"))) {
            $arrayOfElements = preg_split('/[*=]/', $replacedExpression);

            if (
                ($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[0][0] === "-" && $arrayOfElements[0][1] === "0") ||
                ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[1][0] === "-" && $arrayOfElements[1][1] === "0") ||
                ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1) || ($arrayOfElements[2][0] === "-" && $arrayOfElements[2][1] === "0")
                ) { 
                    continue;
                }

            if ($arrayOfElements[0] * $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        } else {
            $firstNum = substr($replacedExpression, 0, strpos($replacedExpression, "-", 1));
            $expressionAfterOperator = substr(substr($replacedExpression, strpos($replacedExpression, "-", 1)), 1);
            $arrayOfElements = [$firstNum, ...explode("=", $expressionAfterOperator)];

            if (
                ($arrayOfElements[0][0] === "0" && strlen($arrayOfElements[0]) > 1) || ($arrayOfElements[0][0] === "-" && $arrayOfElements[0][1] === "0") ||
                ($arrayOfElements[1][0] === "0" && strlen($arrayOfElements[1]) > 1) || ($arrayOfElements[1][0] === "-" && $arrayOfElements[1][1] === "0") ||
                ($arrayOfElements[2][0] === "0" && strlen($arrayOfElements[2]) > 1) || ($arrayOfElements[2][0] === "-" && $arrayOfElements[2][1] === "0")
                ) { 
                    continue;
                }
                
            if ($arrayOfElements[0] - $arrayOfElements[1] === intval($arrayOfElements[2])) {
                if (is_numeric(strpos($expression, strval($i)))) {
                    continue;
                }
                return $i;
            }
        }
    }
    return -1;
}

echo solve_expression('1+1=?');