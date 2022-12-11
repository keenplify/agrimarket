<?php

function clamp($current, $min, $max) {
    return max((int)$min, min((int)$max, (int)$current));
}