<?php

// function format_duration($seconds) {
//     // years, days, hours, minutes, seconds

//     $totalMinutes = $seconds / 60;
//     $totalHours = $totalMinutes / 60;
//     $totalDays = $totalHours / 24;
//     $totalYears = $totalDays / 365;

//     if ($seconds < 60) return $seconds . " seconds";

//     $actualSeconds = $seconds % 60;
//     $actualMinutes = floor($seconds / 60);

//     if ($seconds < 3600) return $actualMinutes . " minutes and " . $actualSeconds . " seconds";

//     $actualHours = floor($seconds / 60 / 60);


// }

// function format_duration($seconds) {
//     $totalSeconds = $seconds;

//     if ($totalSeconds === 1) return "1 second";
//     if ($totalSeconds < 60) return $totalSeconds . " seconds";
//     if ($totalSeconds === 60) return "1 minute and 0 seconds";
//     if ($totalSeconds === 3600) return "1 hour, 0 minutes and 0 seconds";
//     if ($totalSeconds === 3600 * 24) return "1 day, 0 hours, 0 minutes, and 0 seconds";
//     if ($totalSeconds ===  3600 * 24 * 365) return "1 year, 0 days, 0 minutes and 0 seconds";

//     if ($totalSeconds < 3600) {
//         $minutes = floor($totalSeconds / 60);
//         $seconds = $totalSeconds % 60;

//         if ($seconds !== 1) {
//             return $minutes . " minutes and " . $seconds . " seconds";
//         } else {
//             return $minutes . " minutes and " . $seconds . " second";
//         }
//     }

//     if ($totalSeconds < 3600 * 24) {
//         $hours = floor($totalSeconds / 3600);
//         $minutes = floor($totalSeconds / 60);
//         $seconds = $totalSeconds % 60;

//         if ($minutes === 1 && $seconds === 1 && $hours === 1) {
//             return $
//         }
//     }

//     $seconds = $totalSeconds % 60;
// }

function format_duration($seconds) {

    $years = floor($seconds / 60 / 60 / 24 / 365);

    if ($years) {
        $years = $years . " year" . numberEnding($years);    
    } else { 
        $years = "";
    }

    $days = floor(($seconds %= 31536000) / 86400);
    
    if ($days) {
        $days = $days . " day" . numberEnding($days);
    } else {
        $days = "";
    }

    $hours = floor(($seconds %= 86400) / 3600);

    if ($hours) {
        $hours = $hours . " day" . numberEnding($hours);
    } else {
        $hours = "";
    }

    $minutes = floor(($seconds %= 3600) / 60);

    if ($minutes) {
        $minutes = $minutes . " minute" . numberEnding($minutes);
    } else {
        $hours = "";
    }

    $seconds = $seconds % 60;

    if ($seconds) {
        $seconds = $seconds . " second" . numberEnding($seconds);
    } else {
        $seconds = 0;
    }

    return $years . $days . $hours . $minutes . $seconds;
}

function numberEnding($number) {
    return ($number > 1 || $number == 0) ? 's ' : ' ';
}


echo format_duration(62);