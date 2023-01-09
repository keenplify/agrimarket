<?php

function clamp($current, $min, $max) {
    return max((int)$min, min((int)$max, (int)$current));
}

function asterisks($toConvert) {
    $astNumber = strlen($toConvert) - 2;
    return substr($toConvert, 0, 1) . str_repeat("*", $astNumber) . substr($toConvert, -1);
}