<?php

function comp($a1, $a2) {
    if ($a1 === null || $a1 === null) return false; 

    $a1 = array_map(function($el) {
        return $el**2;
    }, $a1);

    $intersection = array_intersect($a1, $a2);
    
    if ($intersection !== $a2) return false;

    return true;
}

comp([2, 3, 4], [4, 9, 16]);