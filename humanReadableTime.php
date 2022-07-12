<?php

/*
    Write a function, which takes a non-negative integer (seconds) as input and returns the time in a human-readable format (HH:MM:SS)

    HH = hours, padded to 2 digits, range: 00 - 99
    MM = minutes, padded to 2 digits, range: 00 - 59
    SS = seconds, padded to 2 digits, range: 00 - 59
    The maximum time never exceeds 359999 (99:59:59)
*/

function human_readable($seconds) {
    if ($seconds >= 3600) {
        $hours = intdiv($seconds, 3600);
        $remainderSeconds = $seconds % 3600;
    } else {
        $hours = 0;
        $remainderSeconds = $seconds;
    }

    if ($remainderSeconds >= 60) {
        $minutes = intdiv($remainderSeconds, 60);
        $remainderSeconds = $remainderSeconds % 60;
    } else {
        $minutes = 0;
    }

    if ($hours < 10) {
        $hours = "0" . $hours;
    }
    if ($minutes < 10) {
        $minutes = "0" . $minutes;
    }
    if ($remainderSeconds < 10) {
        $remainderSeconds = "0" . $remainderSeconds;
    }
    
    echo $hours . ":" . $minutes . ":" . $remainderSeconds;
    return $hours . ":" . $minutes . ":" . $remainderSeconds;
}



function human_readable2(int $seconds): string {
    return sprintf('%02d:%02d:%02d', $seconds / 3600, ($seconds % 3600) / 60, $seconds % 60);
}



human_readable(60);