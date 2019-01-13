<?php

function getCientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function updateLog($msg, $user) {
    $fileName = __DIR__ . '/../log/' . date('d-m-Y') . '.log';
    $sep = ' - ';
    $data = date('H:i:s') . $sep . getCientIp() . $sep . $user . $sep . $msg . PHP_EOL;
    file_put_contents($fileName, $data,FILE_APPEND);
}

function sortDateLog($a, $b) {
    return (implode(array_reverse(explode('-', $a))) > implode(array_reverse(explode('-', $b)))) ? -1 : 1;
}