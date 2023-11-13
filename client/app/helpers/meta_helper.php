<?php

function readingTime($length){
    $total = $length / 200;
    $mins = floor($total);
    $secs = ($total - $mins) * 0.60;
    $integerValue = floor($secs * 100); // Multiply by 100 and round down
    $formattedSecs = str_pad($integerValue, 2, '0', STR_PAD_LEFT); // Pad with leading zeros if necessary

    return $mins > 0 ? $mins . ' mins ' . $formattedSecs . ' secs' : '0 min ' . $formattedSecs . ' secs';
}

function limitString($str='', $limit=80, $suffix='...'){
    return strlen($str) > $limit ? $str = substr($str, 0, $limit-strlen($suffix)) . $suffix : $str;
}