<?php

function bddVerif($request, $user) {

    $dsn = 'mysql:host=127.0.0.1;dbname=manager;charset=utf8';
    $sql_login = 'root';
    $sql_password = '';
    $dbh = new PDO($dsn, $sql_login, $sql_password);

    if ($request === 'login') {
        $query = "SELECT login, password FROM users WHERE login = :login";
    }

    else if ($request === 'role') {
        $query = "SELECT role FROM users WHERE login = :login";
    }

    else if ($request === 'numberAdmin') {
        $query = "SELECT COUNT(*) FROM users WHERE role = 2";
    }

    else if ($request === 'numberUser') {
        $query = "SELECT COUNT(*) FROM users WHERE role = 1";
    }

    else if ($request === 'numberVisitor') {
        $query = "SELECT COUNT(*) FROM users WHERE role = 0";
    }

    $sth = $dbh->prepare($query);
    $sth->bindParam(':login', $user, PDO::PARAM_STR, 15);
    $sth->execute();
    return $sth->fetch(PDO::FETCH_ASSOC);

}