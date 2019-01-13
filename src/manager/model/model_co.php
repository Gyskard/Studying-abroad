<?php

require __DIR__ . '/../infos/bdd_connect.php';

function login($user, $password) {
    $row = bddVerif('login', $user);
    if ($user === $row['login'] && $password === $row['password']) {
        return true;
    }
    return false;
}

function status($user) {
    $row = bddVerif('status', $user);
    if ($row['status'] === 1 || $row['status'] === "1") {
        return true;
    }
    return false;
}