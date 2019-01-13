<?php

function bddVerif($request, $user) {

        $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');

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

    else if ($request === 'users') {
        $query = "SELECT login, role, status, lastCo FROM users ORDER BY role DESC";
    }

    else if ($request === 'allInfoUser') {
        $query = "SELECT login, password, role, status, lastCo FROM users WHERE login = :login";
    }

    else if ($request === 'status') {
        $query = "SELECT status FROM users WHERE login = :login";
    }

    $sth = $dbh->prepare($query);
    $sth->bindParam(':login', $user, PDO::PARAM_STR, 15);
    $sth->execute();

    if ($request === 'users') {
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    else {
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

}

function newDate($user) {

    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "UPDATE `users` SET `lastCo` = CURRENT_TIMESTAMP WHERE login = '" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':user', $user, PDO::PARAM_STR, 100);
    $sth->execute();

}

function addUser() {

    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "INSERT INTO `users` (`login`, `password`, `role`, `status`, `lastCo`) VALUES ('NewUser - " . substr(random_str('unique') , 0 , 9) . "', '" . substr(random_str('unique') , 0 , 25) . "', '0', '0', CURRENT_TIMESTAMP)";
    $sth = $dbh->prepare($query);
    $sth->execute();

}

function deleteUser($user) {

    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "DELETE FROM `users` WHERE `login` = '" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->execute();

}

function newLogin($user, $newLogin) {
    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "UPDATE `users` SET `login`='" . $newLogin . "' WHERE `login`='" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->execute();
}

function newMDP($user, $mdp) {
    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "UPDATE `users` SET `password`='" . $mdp . "' WHERE `login`='" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->execute();
}

function newStatus($user, $status) {
    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "UPDATE `users` SET `status`='" . $status . "' WHERE `login`='" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->execute();
}

function newRole($user, $role) {
    $dbh = new PDO('mysql:host=mysql-gyskard.alwaysdata.net;dbname=gyskard_users', 'gyskard_root', '5a4zd!caz21');
    $query = "UPDATE `users` SET `role`='" . $role . "' WHERE `login`='" . $user . "'";
    $sth = $dbh->prepare($query);
    $sth->execute();
}