<?php

require __DIR__ . '/../infos/bdd_connect.php';

function login($user, $password) {
    $row = bddVerif('login', $user);
    if ($user === $row['login'] && $password === $row['password']) {
        return true;
    }
    else {
        return false;
    }
}